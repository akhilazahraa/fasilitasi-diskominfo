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
        $currentDate = now();

        $events = Event::with('instansi')->get();

        $ispCounts = Event::select('isp')->selectRaw('COUNT(*) as count')->groupBy('isp')->get();

        $ongoing = $events
            ->filter(function ($event) use ($currentDate) {
                return $event->start <= $currentDate && $currentDate <= $event->end;
            })
            ->count();

        $notstarted = $events
            ->filter(function ($event) use ($currentDate) {
                return $event->start > $currentDate;
            })
            ->count();

        $end = $events
            ->filter(function ($event) use ($currentDate) {
                return $event->end < $currentDate;
            })
            ->count();

        return view('dashboard.index', [
            'title' => 'Fasilitasi | Dashboard',
            'ongoing' => $ongoing,
            'notstarted' => $notstarted,
            'end' => $end,
            'ispCounts' => $ispCounts,
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

    public function showUser(User $user)
    {
        $user = User::all();

        return view('dashboard.user.index', [
            'title' => 'Fasilitasi | User',
            'user' => $user,
        ]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.edit.index', [
            'title' => 'Fasilitasi | Edit Event',
            'user' => $user,
        ]);
    }
}
