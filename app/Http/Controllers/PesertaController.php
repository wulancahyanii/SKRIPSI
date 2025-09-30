<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller {
    public function index() {
        $pesertas = Peserta::all();
        return view('peserta.index', compact('pesertas'));
    }

    public function create() {
        return view('peserta.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required|integer',
            'alamat' => 'required'
        ]);
        Peserta::create($request->all());
        return redirect()->route('peserta.index');
    }
}

