<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Fasilitasi | Dashboard',
        ]);
    }

    public function addEvents()
    {
        $users = User::all();
        return view('dashboard.events.create.index', [
            'title' => 'Fasilitasi | Create Events',
            'users' => $users,
        ]);
    }

    public function list()
    {
        $events = Event::all();
        return view('dashboard.events.index', [
            'title' => 'Fasilitasi | Schedule Events',
            'events' => $events,
        ]);
    }

    public function getevents()
    {
        $user = Auth::user();
        $events = $user->events;

        return response()->json($events);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'location' => 'required',
            'maps' => 'required|url',
            'user_id' => 'required|array',
            'notes' => 'required',
            'documentation' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Remove user_id from validatedData
        $userIds = $validatedData['user_id'];
        unset($validatedData['user_id']);

        // Handle file upload
        if ($request->hasFile('documentation')) {
            $file = $request->file('documentation');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documentation', $fileName);
            $validatedData['documentation'] = $fileName;
        }

        $event = Event::create($validatedData);

        // Attach users to the event
        $event->users()->attach($userIds);

        return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.events.index')->with('success', 'Event successfully deleted!');
    }

    public function listed()
    {
        return view('dashboard.scheduled.index', [
            'title' => 'Fasilitasi | Scheduled Events',
        ]);
    }

    public function setting()
    {
        $user = Auth::user();

        return view('dashboard.setting.index', [
            'title' => 'Fasilitasi | Setting',
            'users' => $user,
        ]);
    }

    // app/Http/Controllers/DashboardController.php

    public function upcomingEvents()
    {
        $currentDateTime = now();
        $user = Auth::user();

        $events = $user->events()->where('start', '>=', $currentDateTime)->orderBy('start', 'asc')->get();

        return view('dashboard.events.scheduled.index', [
            'title' => 'Fasilitasi | Upcoming Events',
            'events' => $events,
        ]);
    }

    public function previousEvents()
    {
        $currentDateTime = now();
        $user = Auth::user();

        $events = $user->events()->where('start', '<=', $currentDateTime)->orderBy('start', 'asc')->get();

        return view('dashboard.events.previous.index', [
            'title' => 'Fasilitasi | Previous Events',
            'events' => $events,
        ]);
    }

    public function showEvents(Event $events)
    {
        return view('dashboard.events.details.index', [
            'title' => 'Fasilitasi | Details Events',
            'events' => $events,
        ]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();

        return view('dashboard.events.edit.index', [
            'title' => 'Fasilitasi | Edit Event',
            'event' => $event,
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'location' => 'required',
            'maps' => 'required|url',
            'user_id' => 'required|array',
            'notes' => 'required',
            'documentation' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $event = Event::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('documentation')) {
            // Delete old file if exists
            if ($event->documentation) {
                Storage::delete('public/documentation/' . $event->documentation);
            }

            $file = $request->file('documentation');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documentation', $fileName);
            $validatedData['documentation'] = $fileName;
        }

        $event->update($validatedData);

        $event->users()->sync($validatedData['user_id']);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil diperbarui!');
    }
}
