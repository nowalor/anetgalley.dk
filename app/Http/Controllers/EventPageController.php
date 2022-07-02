<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class EventPageController extends Controller
{
    public function __invoke(Request $request): View
    {

        if($request->query('filter')) {
            if($request->query('filter') === 'all') {
                $events = Event::all();
            }
        } else {
            $events = Event::whereDate('ends_at', '>', Carbon::now())->get();
        }

        return view('events.index', compact('events'));
    }
}
