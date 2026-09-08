<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('home');
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', function () {
    return view('auth.logout');
})->name('logout');

Route::get('/pets', [PetController::class, 'index'])
->name('pets.index');
