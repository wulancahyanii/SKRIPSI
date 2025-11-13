<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class JuriAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('juri.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $juri = Juri::where('email', $request->email)->first();

        if ($juri && Hash::check($request->password, $juri->password)) {
            // Simpan sesi login juri
            session(['juri_id' => $juri->id, 'juri_nama' => $juri->nama]);
            return redirect('/penilaian'); // arahkan ke halaman penilaian
        }

        return back()->with('error', 'Email atau password salah, atau akun belum terdaftar.');
    }

    public function logout()
    {
        session()->forget(['juri_id', 'juri_nama']);
        return redirect('/login-juri');
    }
}
