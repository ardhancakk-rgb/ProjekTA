<?php

use App\Http\Controllers\AdminPengajuanAdopsiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengajuanAdopsiController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/submission', '/pets')
    ->name('submission.index');

Route::get('/Kategori', function () {
    return redirect()->route('kategori.index');
});

Route::get('/admindash', function () {
    return view('admindash.dashboard');
})->middleware('auth')->name('admindash.dashboard');

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

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/pets', [PetController::class, 'index'])
    ->name('pets.index');

Route::resource('hewan', HewanController::class);

Route::resource('kategori', KategoriController::class)
    ->except(['show']);

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/submission/{id_hewan}', [
        PengajuanAdopsiController::class,
        'create',
    ])->name('adopsi.create');

    Route::post('/submission/{id_hewan}', [
        PengajuanAdopsiController::class,
        'store',
    ])->name('adopsi.store');

    Route::get('/profile/riwayat-adopsi', [
        PengajuanAdopsiController::class,
        'riwayat',
    ])->name('pengajuan.riwayat');

    Route::get('/admin/pengajuan-adopsi', [
        AdminPengajuanAdopsiController::class,
        'index',
    ])->name('admin.pengajuan.index');

    Route::patch('/admin/pengajuan-adopsi/{id_pengajuan}', [
        AdminPengajuanAdopsiController::class,
        'update',
    ])->name('admin.pengajuan.update');
});

Route::get('/kembali', function () {
    return redirect()->route('kategori.index');
})->name('kembali');
