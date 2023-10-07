<?php

use Illuminate\Support\Facades\Route;

Route:: view('/','inicio')->name('inicio');

Route::get('/', function () {
    return view('inicio');
});
Route::get('/panel', function () {
    return view('panel');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
