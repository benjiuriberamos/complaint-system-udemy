<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('complaints', App\Http\Controllers\ComplaintsController::class);
Route::resource('reports', App\Http\Controllers\ReportsController::class);
Route::resource('users', App\Http\Controllers\UsersController::class);
