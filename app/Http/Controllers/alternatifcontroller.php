<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Chipset;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('admin.alternatif', compact('alternatif'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        // Simpan data baru ke database
        $alternatif = Alternatif::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        // Create a corresponding record in the Chipset table
        Chipset::create([
            'alternatif_id' => $alternatif->id,
            'jumlah_clock_prosesor' => 0, // Default values, update as necessary
            'jumlah_inti_cores' => 0,     // Default values, update as necessary
            'jumlah_thread' => 0,         // Default values, update as necessary
            'kinerja_grafis_cpu' => 0,    // Default values, update as necessary
            'harga' => 0                  // Default values, update as necessary
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->route('admin.alternatif')
            ->with('success', 'Data Alternatif berhasil ditambahkan.');
    }

    public function edit($id_alternatif)
    {
        $alternatif = Alternatif::findOrFail($id_alternatif);
        return view('admin.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        $alternatif = Alternatif::findOrFail($id);
        $alternatif->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.alternatif')
            ->with('success', 'Data Alternatif berhasil diperbarui.');
    }



    public function destroy($id)
    {
        // Cari data Alternatif berdasarkan ID
        $alternatif = Alternatif::findOrFail($id);

        // Hapus semua chipsets yang terkait dengan alternatif
        $alternatif->chipsets()->delete();

        // Hapus data Alternatif
        $alternatif->delete();

        // Redirect ke halaman yang sesuai
        return redirect()->route('admin.alternatif')
            ->with('success', 'Data Alternatif berhasil dihapus.');
    }
}
