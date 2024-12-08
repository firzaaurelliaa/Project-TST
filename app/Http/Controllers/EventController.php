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



    // Menampilkan detail event berdasarkan ID
    public function show($id) {
        return Event::findOrFail($id);
    }

    // Mengupdate data event
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', // Gambar optional
        ]);

        // Temukan event berdasarkan ID
        $event = Event::findOrFail($id);

        // Proses gambar jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($event->image) {
                $imagePath = storage_path('app/public/images/' . $event->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Menghapus gambar lama
                }
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $imageResized = Image::make($image)->resize(360, 243); // Resize gambar jika diperlukan
            $fileName = time() . '_' . $image->getClientOriginalName();
            $imageResized->save(storage_path('app/public/images/' . $fileName)); // Menyimpan gambar

            // Simpan nama gambar ke dalam validated data
            $validated['image'] = $fileName;
        }

        $event->update($validated);
        return redirect()->route('events.list')->with('success', 'Event updated successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.update', compact('event')); 
    }




    // Menghapus event berdasarkan ID
    public function destroy($id) {
        $event = Event::findOrFail($id);

        if ($event->image) {
            $imagePath = storage_path('app/public/images/' . $event->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Menghapus gambar lama
            }
        }

        $event->delete();   
        return redirect()->route('events.list')->with('success', 'Event deleted successfully!');
    }

    // Menampilkan halaman daftar event
    public function showEvents()
    {
        $events = Event::all(); 
        return view('events.index', compact('events'));
    }

    // Menampilkan daftar event di halaman list
    public function listEvents()
    {
        $events = Event::all();
        return view('events.list', compact('events'));
    }


}
