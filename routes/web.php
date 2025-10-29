<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

// Rute utama (opsional, bisa arahkan ke halaman lain)
Route::get('/', function () {
    return redirect('/jadwal');
});

// Rute untuk halaman jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
