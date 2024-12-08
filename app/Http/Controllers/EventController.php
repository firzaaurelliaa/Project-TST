<?php

namespace App\Http\Controllers;

use App\Models\Event; 
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', 
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $fileName);
            $validated['image'] = $fileName;
        }

        Event::create($validated);
        return redirect()->route('events.list')->with('success', 'Event created successfully!');
    }

    public function show($id) 
    {
        return Event::findOrFail($id);
    }

    public function detailEvents($id)
    {
        $event = Event::findOrFail($id);
        return view('events.detail', compact('event'));
    }

    public function dashboard()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('events.dashboard', compact('events'));
    }

    public function showEvents()
    {
        $events = Event::all(); 
        return view('events.index', compact('events'));
    }

    public function listEvents()
    {
        $events = Event::all();
        return view('events.list', compact('events'));
    }
}
