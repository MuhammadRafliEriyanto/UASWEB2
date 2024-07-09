<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria; // Change to the correct model
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function index()
    {
        $subkriteria = Kriteria::get(); // Correct model and variable name
         return view('admin.subkriteria', compact('subkriteria')); // Use 'subkriteria' to match the variable name
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'attribute' => 'required',
            'bobot' => 'required',
        ]);

        // Save the new subkriteria to the database
        Kriteria::create($request->all());

        // Redirect to the appropriate page with a success message
        return redirect()->route('admin.subkriteria')
            ->with('success', 'Data Kriteria berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $subkriteria = Kriteria::findOrFail($id); // Correct model and variable name
        return view('admin.edit', compact('subkriteria')); // Use 'subkriteria' to match the variable name
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'attribute' => 'required',
            'bobot' => 'required',
        ]);

        // Retrieve the subkriteria to update
        $subkriteria = Kriteria::findOrFail($id);

        // Update the subkriteria
        $subkriteria->update($request->all());

        // Redirect to the appropriate page with a success message
        return redirect()->route('admin.subkriteria')
            ->with('success', 'Data Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Retrieve the subkriteria by its ID
        $subkriteria = Kriteria::findOrFail($id); // Correct model and variable name

        // Delete the subkriteria
        $subkriteria->delete();

        // Redirect to the appropriate page with a success message
        return redirect()->route('admin.subkriteria')
            ->with('success', 'Data Kriteria berhasil dihapus.');
    }
}
