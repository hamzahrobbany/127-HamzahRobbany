<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;


// Rute untuk autentikasi
Auth::routes();

// Rute untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk pengguna (users)
Route::resource('users', UserController::class);

// Rute untuk tugas (tasks)
Route::resource('tasks', TaskController::class);

// Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
