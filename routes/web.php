<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/logingoogle', [App\Http\Controllers\Auth\GoogleLoginController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('complaints', App\Http\Controllers\ComplaintsController::class);
Route::resource('reports', App\Http\Controllers\ReportsController::class);
Route::resource('users', App\Http\Controllers\UsersController::class);
