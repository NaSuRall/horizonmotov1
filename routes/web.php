<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'site'])->name('site.accueil');




Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/user', [App\Http\Controllers\UserController::class, 'user'])->name('dashboard.user');
Route::delete('/dashboard/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

