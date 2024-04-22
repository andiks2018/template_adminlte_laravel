<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest'); //cek provider
Route::post('/login/do', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth'); //cek middleware

Route::get('/template', function () {
    return view ('template');
});

Route::get('/', function () {
    $data = [
        'content'=> 'dashboard.index'
    ];
    return view('layouts.wrapper', $data);
})->middleware('auth');

Route::get('/dashboard', function () {
    $data = [
        'content'=> 'dashboard.index'
    ];
    return view('layouts.wrapper', $data);
});

// Ini route untuk admin
Route::resource('/user', UserController::class);

