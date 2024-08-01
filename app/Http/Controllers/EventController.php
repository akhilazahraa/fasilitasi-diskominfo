<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Instansi;
use App\Models\Tim;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('instansi')->get(); // Pastikan relasi instansi di-load
        return view('dashboard.events.index', [
            'title' => 'Fasilitasi | Acara',
            'events' => $events,
        ]);
    }

    public function getevents()
    {
        $events = Event::with('instansi')->get(); // Pastikan relasi instansi di-load
        return response()->json($events);
    }

    public function create()
    {
        $instansis = Instansi::all();
        $tims = Tim::all();
        return view('dashboard.events.create.index', [
            'title' => 'Fasilitasi | Tambah Acara',
            'instansis' => $instansis,
            'tims' => $tims,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'opd_id' => 'required|exists:instansis,id', // Pastikan opd_id valid dan ada di tabel instansis
            'location' => 'required',
            'isp' => 'required',
            'tim' => 'required|array', // Pastikan 'tim' adalah array
            'tim.*' => 'exists:tims,id', // Validasi setiap ID tim
        ]);

        $event = Event::create($validatedData);

        $event->tim()->attach($request->input('tim'));

        return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil ditambahkan!');
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil dihapus!');
    }
}
