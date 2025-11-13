<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Penilaian;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function dashboard()
    {
        $totalPeserta = Peserta::count();

        $sudahDinilai = Penilaian::where('juri_id', Auth::id())
            ->select('peserta_id')
            ->distinct()
            ->count();

        return view('juri.dashboard', compact('totalPeserta', 'sudahDinilai'));
    }

    public function index()
    {
        $peserta = Peserta::all();
        
        // Ambil ID peserta yang sudah dinilai oleh juri ini
        $pesertaDinilai = Penilaian::where('juri_id', Auth::id())
            ->pluck('peserta_id')
            ->toArray();
        
        return view('juri.daftarpeserta', compact('peserta', 'pesertaDinilai'));
    }

    public function nilai($id)
    {
        $peserta = Peserta::findOrFail($id);
        $kriteria = Kriteria::all();
        
        // Cek apakah sudah dinilai
        $sudahDinilai = Penilaian::where('juri_id', Auth::id())
            ->where('peserta_id', $id)
            ->exists();

        return view('juri.form_penilaian', compact('peserta', 'kriteria', 'sudahDinilai'));
    }

    public function store(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $kriteria = Kriteria::all();

        // Validasi
        $rules = [];
        foreach ($kriteria as $krit) {
            $rules['nilai_'.$krit->id] = 'required|numeric|min:0|max:100';
        }
        $request->validate($rules);

        // Simpan penilaian
        foreach ($kriteria as $krit) {
            Penilaian::updateOrCreate(
                [
                    'juri_id' => Auth::id(),
                    'peserta_id' => $id,
                    'kriteria_id' => $krit->id,
                ],
                [
                    'nilai' => $request->input('nilai_'.$krit->id),
                ]
            );
        }

        return redirect()->route('juri.daftar_peserta')
            ->with('success', 'Penilaian untuk peserta '.$peserta->nama.' berhasil disimpan!');
    }

    public function riwayat()
    {
        $penilaian = Penilaian::where('juri_id', Auth::id())
            ->with(['peserta', 'kriteria'])
            ->get()
            ->groupBy('peserta_id');

        return view('juri.riwayat', compact('penilaian'));
    }
}