<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    // Tampilkan semua data peserta
    public function index()
    {
        $peserta = Peserta::latest()->get();
        return view('panitia.peserta.index', compact('peserta'));
    }

    // Form tambah peserta baru
    public function create()
    {
        return view('panitia.peserta.create');
    }

    // Simpan peserta baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:100',
            'ttl' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:10',
            'kecamatan' => 'nullable|string|max:100',
            'agama' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'pendidikan' => 'nullable|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'hobi' => 'nullable|string|max:255',
            'keterampilan' => 'nullable|string|max:255',
            'organisasi' => 'nullable|string',
            'alasan' => 'nullable|string',
            'harapan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'identitas' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_peserta', 'public');
        }

        // Upload identitas jika ada
        if ($request->hasFile('identitas')) {
            $data['identitas'] = $request->file('identitas')->store('identitas_peserta', 'public');
        }

        Peserta::create($data);

        return redirect()->route('panitia.peserta.index')->with('success', 'Data peserta berhasil ditambahkan!');
    }

    // Detail peserta
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('panitia.peserta.show', compact('peserta'));
    }

    // Form edit peserta
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('panitia.peserta.edit', compact('peserta'));
    }

    // Simpan hasil edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:20',
            'kecamatan' => 'required|string|max:100',
            'instansi' => 'required|string|max:100',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect()->route('panitia.peserta.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    // ✅ Method untuk menghapus data peserta
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        // Jika ada file foto / identitas dihapus juga dari storage
        if ($peserta->foto && \Storage::disk('public')->exists($peserta->foto)) {
            \Storage::disk('public')->delete($peserta->foto);
        }
        if ($peserta->identitas && \Storage::disk('public')->exists($peserta->identitas)) {
            \Storage::disk('public')->delete($peserta->identitas);
        }

        // Hapus data peserta
        $peserta->delete();

        return redirect()->route('panitia.peserta.index')->with('success', 'Data peserta berhasil dihapus!');
    }
    
}
