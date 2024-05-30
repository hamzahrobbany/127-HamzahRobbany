<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;




Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


    Route::resource('users', UserController::class);


    Route::resource('tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');



Route::get('/profile', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::post('/profile', [ProfileController::class, 'store'])->name('profiles.store');
Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profiles.update');



});

