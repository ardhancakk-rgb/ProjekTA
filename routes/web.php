<?php

use App\Http\Controllers\AdminPengajuanAdopsiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengajuanAdopsiController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Models\Hewan;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    $hewans = Hewan::latest('id_hewan')
        ->limit(4)
        ->get();

    return view('home', compact('hewans'));
});

// Halaman contact
Route::get('/contact', function () {
    return view('contact');
});

// Halaman bantuan
Route::get('/help', function () {
    return redirect('/contact');
});

// Redirect halaman hewan
Route::get('/Hewan', function () {
    return redirect()->route('hewan.index');
});

// Redirect halaman pengajuan
Route::redirect('/PengajuanAdopsi', '/pets');

// Redirect submission ke daftar hewan
Route::redirect('/submission', '/pets')
    ->name('submission.index');

// Redirect kategori
Route::get('/Kategori', function () {
    return redirect()->route('kategori.index');
});

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Halaman register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// Daftar hewan untuk pengunjung
Route::get('/pets', [PetController::class, 'index'])
    ->name('pets.index');

// Dashboard
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admindash.dashboard')
        : view('dashboard');
})->middleware('auth')->name('dashboard');

// Dashboard admin
Route::get('/admindash', function () {
    return view('admindash.dashboard');
})->middleware(['auth', 'admin'])
    ->name('admindash.dashboard');

// Semua route yang membutuhkan login
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Form pengajuan adopsi
    Route::get('/submission/{id_hewan}', [
        PengajuanAdopsiController::class,
        'create',
    ])->name('adopsi.create');

    // Simpan pengajuan adopsi
    Route::post('/submission/{id_hewan}', [
        PengajuanAdopsiController::class,
        'store',
    ])->name('adopsi.store');

    // Riwayat adopsi user
    Route::get('/profile/riwayat-adopsi', [
        PengajuanAdopsiController::class,
        'riwayat',
    ])->name('pengajuan.riwayat');

    // Data hewan - khusus admin
    Route::resource('hewan', HewanController::class)
        ->middleware('admin');

    // Data kategori - khusus admin
    Route::resource('kategori', KategoriController::class)
        ->except(['show'])
        ->middleware('admin');

    // Halaman konfirmasi pengajuan adopsi admin
    Route::get('/admin/pengajuan-adopsi', [
        AdminPengajuanAdopsiController::class,
        'index',
    ])->middleware('admin')
        ->name('admin.pengajuan.index');

    // Update keputusan pengajuan adopsi
    Route::patch('/admin/pengajuan-adopsi/{id_pengajuan}', [
        AdminPengajuanAdopsiController::class,
        'update',
    ])->middleware('admin')
        ->name('admin.pengajuan.update');
});

// Tombol kembali kategori
Route::get('/kembali', function () {
    return redirect()->route('kategori.index');
})->name('kembali');
