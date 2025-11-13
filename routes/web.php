<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    PesertaController,
    KriteriaController,
    PenilaianController,
    HasilController,
    JuriController,
    LaporanController
};

// ==========================
// LOGIN & REGISTER
// ==========================
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// HALAMAN JURI
// ==========================
Route::middleware(['auth', 'juri'])->prefix('juri')->name('juri.')->group(function () {
    // Dashboard Juri
    Route::get('/dashboard', [PenilaianController::class, 'dashboard'])->name('dashboard');

    // Daftar Peserta
    Route::get('/peserta', [PenilaianController::class, 'index'])->name('daftar_peserta');

    // Form Penilaian
    Route::get('/nilai/{id}', [PenilaianController::class, 'nilai'])->name('nilai');
    Route::post('/nilai/{id}', [PenilaianController::class, 'store'])->name('store');

    // Riwayat Penilaian
    Route::get('/riwayat', [PenilaianController::class, 'riwayat'])->name('riwayat');
});

// ==========================
// HALAMAN UNTUK PANITIA / ADMIN
// ==========================
Route::middleware(['auth'])->group(function () {

    // Dashboard Panitia/Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Data
    Route::resource('peserta', PesertaController::class);
    Route::resource('kriteria', KriteriaController::class);
    
    // Resource penilaian hanya untuk panitia (lihat, hapus)
    // Tidak include create/edit karena penilaian dilakukan oleh juri
    Route::resource('penilaian', PenilaianController::class)->only(['index', 'show', 'destroy']);
    
    Route::resource('juri', JuriController::class);

    // Hasil Penilaian
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');

    // Laporan Penilaian
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
});