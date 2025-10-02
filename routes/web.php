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
Route::post('/dashboard/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');


Route::get('/dashboard/marques', [App\Http\Controllers\Marque::class, 'index'])->name('dashboard.marque');
Route::delete('/dashboard/marque/{id}', [App\Http\Controllers\Marque::class, 'destroy'])->name('marque.destroy');
Route::post('/dashboard/marque', [App\Http\Controllers\Marque::class, 'store'])->name('marque.store');