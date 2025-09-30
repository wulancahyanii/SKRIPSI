<?php

namespace App\Http\Controllers;
use App\Models\Peserta;

class DashboardController extends Controller {
    public function index() {
        $totalPeserta = Peserta::count();
        return view('dashboard', compact('totalPeserta'));
    }
}

