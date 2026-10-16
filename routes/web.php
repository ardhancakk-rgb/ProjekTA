<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\PengajuanAdopsiController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return redirect('/');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/help', function () {
    return redirect('/contact');
});

Route::get('/Hewan', function () {
    return redirect()->route('hewan.index');
});

Route::get('/PengajuanAdopsi', function () {
    return redirect()->route('pets.index');
});

Route::get('/Kategori', function () {
    return redirect()->route('kategori.index');
});

// Auth
Route::get('/admindash', function () {
    return view('admindash.dashboard');
})->name('admindash.dashboard');

Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admindash.dashboard')
        : view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/pets', [PetController::class, 'index'])
    ->name('pets.index');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::resource('hewan', HewanController::class);

Route::resource('kategori', KategoriController::class)->except(['show']);

Route::get('/kembali', function () {
    return redirect()->route('kategori.index');
})->name('kembali');

Route::middleware('auth')->group(function () {
    Route::get('/pengajuan', [PengajuanAdopsiController::class, 'index'])
        ->name('pengajuan.index');

    Route::get('/adopsi/{id_hewan}',
        [PengajuanAdopsiController::class, 'create']
    )->name('adopsi.create');

    Route::post('/adopsi/{id_hewan}',
        [PengajuanAdopsiController::class, 'store']
    )->name('adopsi.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/riwayat', [ProfileController::class, 'riwayat'])
        ->name('profile.riwayat');
});

