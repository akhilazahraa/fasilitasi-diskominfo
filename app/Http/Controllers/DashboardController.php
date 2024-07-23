<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard.create.index', [
            'title' => 'Fasilitasi | Create Events',
            'users' => $users,
        ]);
    }

    public function list()
    {
        $user = Auth::user();

        $events = $user->events;
        return view('dashboard.schedule.index', [
            'title' => 'Fasilitasi | Schedule Events',
            'events' => $events,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'location' => 'required',
            'location_link' => 'required|url',
            'user_id' => 'required|array',
        ]);

        // Remove user_id from validatedData
        $userIds = $validatedData['user_id'];
        unset($validatedData['user_id']);

        $event = Event::create($validatedData);

        // Attach users to the event
        $event->users()->attach($userIds);

        return redirect()->route('dashboard.events.index')->with('success', 'Event created successfully');
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
}
