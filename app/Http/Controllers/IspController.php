<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class IspController extends Controller
{
    public function index()
    {
        $isp = Provider::paginate(10);
        return view('dashboard.isp.index', [
            'title' => 'Fasilitasi | ISP',
            'isp' => $isp,
        ]);
    }

    public function create()
    {
        $isp = Provider::all(); 
        return view('dashboard.isp.create.index', [
            'title' => 'Fasilitasi | Tambah Acara',
            'isp' => $isp,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Provider::create($validatedData);

        return redirect()->route('dashboard.isp.index')->with('success', 'ISP berhasil ditambahkan!');
    }

    public function edit(Provider $isp)
    {
        return view('dashboard.isp.edit.index', [
            'title' => 'Fasilitasi | Edit ISP',
            'isp' => $isp,
        ]);
    }

    public function update(Request $request, Provider $isp)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $isp->update($validatedData);

        return redirect()->route('dashboard.isp.index')->with('success', 'ISP berhasil diupdate!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Provider::whereIn('id', $ids)->delete();
            return redirect()->route('dashboard.isp.index')->with('success', 'Acara berhasil dihapus!');
        }

        return redirect()->route('dashboard.isp.index')->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
    }
}
