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

        $ispCounts = Event::select('isp_id', 'providers.name as isp_name')->join('providers', 'events.isp_id', '=', 'providers.id')->selectRaw('COUNT(*) as count')->groupBy('isp_id', 'isp_name')->get();

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

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update user dengan data yang telah divalidasi
        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profil Anda berhasil diperbarui!');
    }

    public function showUser(User $user)
    {
        $user = User::paginate(1);

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

    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'role' => 'required|in:ADMIN,USER',
        ]);

        $user = User::findOrFail($id);

        $user->update($validatedData);

        return redirect()->route('dashboard.user')->with('success', 'Profil pengguna berhasil diperbarui!');
    }

    public function createUser()
    {
        return view('dashboard.user.create.index', [
            'title' => 'Fasilitasi | Tambah User',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',
            'phonenumber' => 'nullable',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('dashboard.user')->with('success', 'User berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $title = 'Daftar Pengguna'; // Definisikan variabel title
    
        $user = User::query()
            ->when($search, function ($query, $search) {
                return $query
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phonenumber', 'like', '%' . $search . '%');
            })
            ->paginate(10);
    
        // Return HTML table directly if it's an AJAX request
        if ($request->ajax()) {
            return view('dashboard.user.table', compact('user'))->render(); // Kembalikan view isi tabel
        }
    
        // Sertakan variabel title saat mengirim data ke view
        return view('dashboard.user.index', compact('user', 'title'));
    }
    
}
