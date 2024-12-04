<?php

namespace App\Http\Controllers;
use App\Models\Event; 
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        return Event::all();
    }

    public function store(Request $request)
{
    // Validasi data input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'event_date' => 'required|date|date_format:Y-m-d',
    ]);

    // Menyimpan data ke database
    $event = Event::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'event_date' => $validated['event_date'],
    ]);

    return response()->json(['message' => 'Event created successfully', 'event' => $event], 201);
}

    
    

    public function show($id) {
        return Event::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return response()->json($event, 200);
    }

    public function destroy($id) {
    $event = Event::findOrFail($id); // Mencari event berdasarkan ID
    $event->delete(); // Menghapus event
    return response()->json(null, 204); // Mengirim response tanpa isi, hanya status 204 (No Content)
    }

    // Method untuk menampilkan data event di halaman
    public function showEvents()
    {
        // Ambil semua data event dari database
        $events = Event::all();
        
        // Kirim data ke view blade
        return view('events.index', compact('events'));
    }

}
