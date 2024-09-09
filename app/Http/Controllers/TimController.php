<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;

class TimController extends Controller
{
    public function index()
    {
        $teams = Tim::paginate(10);
        return view('dashboard.teams.index', [
            'title' => 'Fasilitasi | Acara',
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        $teams = Tim::all(); 
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

    public function edit(Tim $team)
    {
        return view('dashboard.teams.edit.index', [
            'title' => 'Fasilitasi | Edit Anggota Tim',
            'team' => $team,
        ]);
    }

    public function update(Request $request, Tim $team)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $team->update($validatedData);

        return redirect()->route('dashboard.teams.index')->with('success', 'Anggota Tim berhasil diupdate!');
    }

    public function bulkDelete(Request $request){
        $ids = $request->input('ids');

        if ($ids) {
            Tim::whereIn('id', $ids)->delete();
            return redirect()->route('dashboard.teams.index')->with('success', 'Anggota tim berhasil dihapus!');
        }

        return redirect()->route('dashboard.teams.index')->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
    }
}
