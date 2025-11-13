<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class JuriController extends Controller
{
    // 🔹 Menampilkan semua juri (ambil dari tabel users)
    public function index()
    {
        $juri = User::where('role', 'juri')->get();
        return view('panitia.juri.index', compact('juri'));
    }

    // 🔹 Tampilkan form tambah juri
    public function create()
    {
        return view('panitia.juri.create');
    }

    // 🔹 Simpan data juri baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'juri', // default role untuk juri
        ]);

        return redirect()->route('juri.index')->with('success', 'Akun juri berhasil ditambahkan.');
    }

    // 🔹 Edit juri
    public function edit($id)
    {
        $user = User::where('role', 'juri')->findOrFail($id);
        return view('panitia.juri.edit', compact('user'));
    }

    // 🔹 Update data juri
    public function update(Request $request, $id)
    {
        $user = User::where('role', 'juri')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('juri.index')->with('success', 'Akun juri berhasil diperbarui.');
    }

    // 🔹 Hapus juri
    public function destroy($id)
    {
        $user = User::where('role', 'juri')->findOrFail($id);
        $user->delete();

        return redirect()->route('juri.index')->with('success', 'Akun juri berhasil dihapus.');
    }
}
