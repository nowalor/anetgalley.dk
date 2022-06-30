<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventPageController extends Controller
{
    public function __invoke(): View
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }
}
