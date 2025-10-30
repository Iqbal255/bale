<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('jadwal.index');
});

// Public route: lihat jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

// Protect sensitive routes (create/edit/delete) in auth group
Route::middleware(['auth'])->group(function () {
    Route::resource('jadwal', JadwalController::class)->except(['index', 'show']);
    // if you want to allow show publicly, keep show; otherwise move into middleware
});
