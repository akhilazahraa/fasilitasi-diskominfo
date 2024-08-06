<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;

class TimController extends Controller
{
    public function index()
    {
        $teams = Tim::all();
        return view('dashboard.teams.index', [
            'title' => 'Fasilitasi | Acara',
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        $teams = Tim::all(); // Ambil semua data instansi
        return view('dashboard.teams.create.index', [
            'title' => 'Fasilitasi | Tambah Acara',
            'teams' => $teams,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Tim::create($validatedData);

        return redirect()->route('dashboard.teams.index')->with('success', 'Anggota Tim berhasil ditambahkan!');
    }
}
