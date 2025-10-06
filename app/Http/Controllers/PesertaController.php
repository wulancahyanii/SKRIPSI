<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        // Ambil semua data peserta
        $pesertas = Peserta::all();

        // Kirim ke view peserta.index
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        // Tampilkan form tambah peserta
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'asal_sekolah'  => 'required|string|max:255',
            'ttl'           => 'nullable|string|max:255',
            'kecamatan'     => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
            'no_hp'         => 'nullable|string|max:20',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pesertas', 'public');
        }

        Peserta::create($validated);

        return redirect()->route('peserta.index')
                         ->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'asal_sekolah'  => 'required|string|max:255',
            'ttl'           => 'nullable|string|max:255',
            'kecamatan'     => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
            'no_hp'         => 'nullable|string|max:20',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $peserta = Peserta::findOrFail($id);

        // Update foto jika ada file baru
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pesertas', 'public');
        }

        $peserta->update($validated);

        return redirect()->route('peserta.index')
                         ->with('success', 'Peserta berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        // Jika ingin sekalian hapus file foto lama dari storage
        // if ($peserta->foto && \Storage::disk('public')->exists($peserta->foto)) {
        //     \Storage::disk('public')->delete($peserta->foto);
        // }

        $peserta->delete();

        return redirect()->route('peserta.index')
                         ->with('success', 'Peserta berhasil dihapus!');
    }
}
