<?php

namespace App\Http\Controllers;

use App\Models\modelbobot;
use Illuminate\Http\Request;

class bobotcontroller extends Controller
{
    //

    public function index()
    {
        $bobot = modelbobot::get();
        return view('user.rekomendasi', compact('bobot'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'users_id' => 'required',
            'w1' => 'required',
            'w2' => 'required',
            'w3' => 'required',
            'w4' => 'required',
            'w5' => 'required',
        ]);

        // Simpan data baru ke database
        modelbobot::create($request->all());

        // Redirect ke halaman yang sesuai
        return redirect()->route('user.rekomendasi')
            ->with('success', 'Data Kriteria berhasil ditambahkan.');
    }

    public function edit($id_bobot)
    {
        $bobot = modelbobot::findOrFail($id_bobot);
        return view('admin.edit', compact('bobot'));
    }

    public function update(Request $request, $id_bobot)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'users_id' => 'required',
            'w1' => 'required',
            'w2' => 'required',
            'w3' => 'required',
            'w4' => 'required',
            'w5' => 'required',
        ]);

        // Ambil data Chipset yang akan diupdate
        $bobot = modelbobot::findOrFail($id_bobot);

        // Update data Chipset
        $bobot->update($request->all());

        // Redirect ke halaman yang sesuai
        return redirect()->route('user.rekomendasi')
            ->with('success', 'Data bobot berhasil diperbarui.');
    }

    public function destroy($id_bobot)
    {
        // Cari data Chipset berdasarkan ID
        $bobot = modelbobot::findOrFail($id_bobot);

        // Hapus data Chipset
        $bobot->delete();

        // Redirect ke halaman yang sesuai
        return redirect()->route('user.rekomendasi')
            ->with('success', 'Data Bobot berhasil dihapus.');
    }
}


