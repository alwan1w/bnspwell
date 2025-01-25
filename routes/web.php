<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Penulis Routes
    Route::resource('penulis', PenulisController::class);

    // Buku Routes
    Route::resource('buku', BukuController::class);

    // Peminjam Routes
    Route::resource('peminjam', PeminjamController::class);
});

require __DIR__.'/auth.php';
