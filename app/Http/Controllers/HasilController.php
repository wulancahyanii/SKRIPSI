<?php

namespace App\Http\Controllers;
use App\Models\{Peserta, Penilaian, Kriteria};

class HasilController extends Controller {
    public function index() {
        $pesertas = Peserta::all();
        $kriterias = Kriteria::all();

        $hasil = [];
        foreach ($pesertas as $peserta) {
            $total = 0;
            foreach ($kriterias as $kriteria) {
                $nilai = Penilaian::where('peserta_id', $peserta->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->value('nilai') ?? 0;
                $total += $nilai * $kriteria->bobot;
            }
            $hasil[] = [
                'peserta' => $peserta->nama,
                'skor' => $total
            ];
        }

        $hasil = collect($hasil)->sortByDesc('skor');
        return view('hasil.index', compact('hasil'));
    }
}
