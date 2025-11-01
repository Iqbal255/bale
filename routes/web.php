<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalController;

/*
|--------------------------------------------------------------------------
| Rute Non-Sensitif (bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome'); // landing page bebas akses
})->name('welcome');

Route::get('/panduan', function () {
    return view('panduan'); // panduan aplikasi
})->name('panduan');

Route::get('/contact', function () {
    return view('contact'); // contact page bebas akses
})->name('contact');

/*
|--------------------------------------------------------------------------
| Rute Sensitif (hanya bisa diakses jika sudah login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard (halaman utama setelah login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Jadwal (data sensitif)
    Route::resource('jadwal', JadwalController::class);
});

require __DIR__.'/auth.php';
