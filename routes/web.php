<?php

use Illuminate\Support\Facades\Route;

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
