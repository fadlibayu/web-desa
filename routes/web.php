<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [PublicController::class, 'beritaShow'])->name('berita.show');
Route::get('/album', [PublicController::class, 'album'])->name('album');
Route::get('/album/{slug}', [PublicController::class, 'albumShow'])->name('album.show');
Route::get('/infografis', [PublicController::class, 'infografis'])->name('infografis');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');

// Admin Dashboard Route
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin CMS Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Berita
    Route::get('/berita', [AdminController::class, 'beritaIndex'])->name('berita.index');
    Route::get('/berita/create', [AdminController::class, 'beritaCreate'])->name('berita.create');
    Route::post('/berita', [AdminController::class, 'beritaStore'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [AdminController::class, 'beritaEdit'])->name('berita.edit');
    Route::put('/berita/{berita}', [AdminController::class, 'beritaUpdate'])->name('berita.update');
    Route::delete('/berita/{berita}', [AdminController::class, 'beritaDestroy'])->name('berita.destroy');

    // Album Desa
    Route::get('/album', [AdminController::class, 'albumIndex'])->name('album.index');
    Route::get('/album/create', [AdminController::class, 'albumCreate'])->name('album.create');
    Route::post('/album', [AdminController::class, 'albumStore'])->name('album.store');
    Route::get('/album/{album}/edit', [AdminController::class, 'albumEdit'])->name('album.edit');
    Route::put('/album/{album}', [AdminController::class, 'albumUpdate'])->name('album.update');
    Route::delete('/album/{album}', [AdminController::class, 'albumDestroy'])->name('album.destroy');

    // Demografi
    Route::get('/demografi', [AdminController::class, 'demografiIndex'])->name('demografi.index');
    Route::post('/demografi', [AdminController::class, 'demografiStore'])->name('demografi.store');
    Route::delete('/demografi/{demografi}', [AdminController::class, 'demografiDestroy'])->name('demografi.destroy');

    // Profil & Statistik Penduduk
    Route::get('/profil', [AdminController::class, 'profilIndex'])->name('profil.index');
    Route::post('/profil', [AdminController::class, 'profilUpdate'])->name('profil.update');

    // Perangkat Desa
    Route::post('/perangkat', [AdminController::class, 'perangkatStore'])->name('perangkat.store');
    Route::delete('/perangkat/{perangkat}', [AdminController::class, 'perangkatDestroy'])->name('perangkat.destroy');
});

// Auth Profile Routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
