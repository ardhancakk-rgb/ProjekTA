<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/pets', function () {
    return view('pets');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/Hewan', function () {
    return view('Hewan');
});

Route::get('/PengajuanAdopsi', function () {
    return view('PengajuanAdopsi');
});

Route::get('/Kategori', function () {
    return view('Kategori');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

//auth
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admindash', function () {
    return view('admindash.dashboard');
})->name('admindash.dashboard');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', function () {
    return view('auth.logout');
})->name('logout');

Route::get('/pets', [PetController::class, 'index'])
->name('pets.index');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::post('/pengajuan', [AuthController::class, 'pengajuan'])
    ->name('pengajuan');

