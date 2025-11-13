<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juri;
use App\Models\Penilaian;
use App\Models\Peserta;
use PDF; // dari barryvdh/laravel-dompdf

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil data penilaian dari semua juri dan peserta
        $penilaians = Penilaian::with(['juri', 'peserta'])->get();

        // Buat total rata-rata tiap peserta
        $rekap = $penilaians
            ->groupBy('peserta_id')
            ->map(function ($items) {
                $rata2 = $items->avg('nilai');
                return [
                    'peserta' => $items->first()->peserta->nama,
                    'total_nilai' => $items->sum('nilai'),
                    'rata_rata' => number_format($rata2, 2),
                ];
            });

        return view('panitia.laporan.index', compact('rekap'));
    }

    public function exportPdf()
    {
        $penilaians = Penilaian::with(['juri', 'peserta'])->get();

        $rekap = $penilaians
            ->groupBy('peserta_id')
            ->map(function ($items) {
                $rata2 = $items->avg('nilai');
                return [
                    'peserta' => $items->first()->peserta->nama,
                    'total_nilai' => $items->sum('nilai'),
                    'rata_rata' => number_format($rata2, 2),
                ];
            });

        $pdf = PDF::loadView('laporan.pdf', compact('rekap'));
        return $pdf->download('laporan-penilaian.pdf');
    }
}
