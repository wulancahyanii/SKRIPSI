<?php

use App\Http\Controllers\{
    DashboardController, PesertaController, 
    KriteriaController, PenilaianController, HasilController
};

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('peserta', PesertaController::class);
Route::resource('kriteria', KriteriaController::class);
Route::resource('penilaian', PenilaianController::class);
Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');
