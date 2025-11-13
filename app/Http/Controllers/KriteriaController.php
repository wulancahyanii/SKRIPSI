<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('panitia.kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('panitia.kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kriterias',
            'nama' => 'required',
            'bobot' => 'required|numeric'
        ]);

        Kriteria::create($request->all());

        return redirect()->route('panitia.kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // ✅ Perbaikan 1: ubah $kriterias jadi $kriteria
        $kriteria = Kriteria::findOrFail($id);
        return view('panitia.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric'
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());

        return redirect()->route('panitia.kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }
    public function destroy($id)
{
    $kriteria = Kriteria::findOrFail($id);
    $kriteria->delete();

    return redirect()->route('panitia.kriteria.index')
                     ->with('success', 'Data kriteria berhasil dihapus.');
}

}
