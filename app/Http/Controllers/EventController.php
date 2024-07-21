<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $events = session('events', []);
        $events[] = [
            'title' => $request->employeeName . ' (' . $request->location . ')',
            'start' => $request->startDate,
            'end' => $request->endDate
        ];
        session(['events' => $events]);

        return redirect()->route('schedules.index')->with('success', 'Event added successfully.');
    }

    public function create(){
        return view('event_form');
    }

    public function destroy($id)
    {
        Log::info("Deleting event with id: $id");
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['success' => true]);
    }
}
