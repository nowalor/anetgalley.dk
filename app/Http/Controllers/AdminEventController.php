<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
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

        return redirect()->back()->with('event-saved', 'Event has been saved');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
