<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('ends_at')->get();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();

        $startsAt = Carbon::parse(strtok($request->input('daterange'), '-'));
        $endsAt = Carbon::parse(substr($request->input('daterange'), strpos($request->input('daterange'), "-") + 1));

        $validated['starts_at'] = $startsAt;
        $validated['ends_at'] = $endsAt;

        $event = Event::create($validated);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();

            $image->storeAs("event-images/$event->id", $fileName, 'public');

            $event->update(['image_name' => $fileName]);
        }

        return redirect()->route('admin.events.index')->with('event-created', 'Event has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }


    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $validated = $request->validated();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();


            Storage::disk('public')->delete("event-images/$event->id/$event->image_name");
            $image->storeAs("event-images/$event->id", $fileName, 'public');

            $validated['image_name'] = $fileName;
        }

        $startsAt = Carbon::parse(strtok($request->input('daterange'), '-'));
        $endsAt = Carbon::parse(substr($request->input('daterange'), strpos($request->input('daterange'), "-") + 1));

        $validated['starts_at'] = $startsAt;
        $validated['ends_at'] = $endsAt;


        $event->update($validated);

        return redirect()->route('admin.events.index')->with('event-updated', 'Event has been updated');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->back()->with('event-deleted', 'Event has been deleted');
    }
}
