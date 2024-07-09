<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Chipset;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $chipsets = Chipset::with('alternatif')->get();
        return view('admin.kriteria', compact('chipsets'));
    }

    public function create()
    {
        $alternatifs = Alternatif::all();
        return view('admin.kriteria', compact('alternatifs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'jumlah_clock_prosesor' => 'required',
            'jumlah_inti_cores' => 'required',
            'jumlah_thread' => 'required',
            'kinerja_grafis_cpu' => 'required',
            'harga' => 'required',
        ]);

        Chipset::create([
            'alternatif_id' => $request->alternatif_id,
            'jumlah_clock_prosesor' => $request->jumlah_clock_prosesor,
            'jumlah_inti_cores' => $request->jumlah_inti_cores,
            'jumlah_thread' => $request->jumlah_thread,
            'kinerja_grafis_cpu' => $request->kinerja_grafis_cpu,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.kriteria')
            ->with('success', 'Data Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $chipset = Chipset::findOrFail($id);
        $alternatifs = Alternatif::all();

        return view('admin.kriteria', compact('chipset', 'alternatifs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'jumlah_clock_prosesor' => 'required',
            'jumlah_inti_cores' => 'required',
            'jumlah_thread' => 'required',
            'kinerja_grafis_cpu' => 'required',
            'harga' => 'required',
        ]);

        $chipset = Chipset::findOrFail($id);
        $chipset->update([
            'alternatif_id' => $request->alternatif_id,
            'jumlah_clock_prosesor' => $request->jumlah_clock_prosesor,
            'jumlah_inti_cores' => $request->jumlah_inti_cores,
            'jumlah_thread' => $request->jumlah_thread,
            'kinerja_grafis_cpu' => $request->kinerja_grafis_cpu,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.kriteria')
            ->with('success', 'Data Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $chipset = Chipset::findOrFail($id);
        $chipset->delete();

        return redirect()->route('admin.kriteria')
            ->with('success', 'Data Chipset berhasil dihapus.');
    }
}
