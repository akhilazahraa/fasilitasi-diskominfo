<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    public function index()
    {
        $opd = Instansi::all();
        return view('dashboard.opd.index', [
            'title' => 'Fasilitasi | OPD',
            'opd' => $opd,
        ]);
    }

    public function create()
    {
        return view('dashboard.opd.create.index', [
            'title' => 'Fasilitasi | Create OPD',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $opd = Instansi::create($validatedData);

        return redirect()->route('dashboard.opd')->with('success', 'OPD berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $opd = Instansi::findOrFail($id);
        $opd->delete();

        return redirect()->route('dashboard.opd')->with('success', 'OPD berhasil dihapus!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Instansi::whereIn('id', $ids)->delete();
            return redirect()->route('dashboard.opd')->with('success', 'Data OPD yang dipilih telah dihapus!');
        }

        return redirect()->route('dashboard.opd')->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
    }

    public function edit(Instansi $opd)
    {
        return view('dashboard.opd.edit.index', [
            'title' => 'Fasilitasi | Edit OPD',
            'opd' => $opd,
        ]);
    }

    public function update(Request $request, Instansi $opd)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $opd->update($validatedData);

        return redirect()->route('dashboard.opd')->with('success', 'OPD berhasil diupdate!');
    }
}
