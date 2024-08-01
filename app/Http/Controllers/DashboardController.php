<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Report;
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

    public function setting()
    {
        $user = Auth::user();

        return view('dashboard.setting.index', [
            'title' => 'Fasilitasi | Setting',
            'users' => $user,
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

    public function showUser(User $user){
        $user = User::all();

        return view('dashboard.user.index', [
            'title' => 'Fasilitasi | User',
            'user' => $user,
        ]);
    }

    public function editUser($id){
        $user = User::findOrFail($id);

        return view('dashboard.user.edit.index', [
            'title' => 'Fasilitasi | Edit Event',
            'user' => $user,
        ]);
    }
}
