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
Route::get('/dashboard/user/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/dashboard/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');


Route::get('/dashboard/marques', [App\Http\Controllers\MarqueController::class, 'index'])->name('dashboard.marque');
Route::delete('/dashboard/marques/{id}', [App\Http\Controllers\MarqueController::class, 'destroy'])->name('marque.destroy');
Route::post('/dashboard/marques', [App\Http\Controllers\MarqueController::class, 'store'])->name('marque.store');
Route::get('/dashboard/marques/{id}/edit', [App\Http\Controllers\MarqueController::class, 'edit'])->name('marque.edit');
Route::put('/dashboard/marques/{id}', [App\Http\Controllers\MarqueController::class, 'update'])->name('marque.update');



Route::get('/dashboard/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('dashboard.categorie');
Route::delete('/dashboard/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('categories.destroy');
Route::post('/dashboard/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories.store');
Route::put('/dashboard/categories/{id}/edit', [App\Http\Controllers\CategoriesController::class, 'update'])->name('categories.update');



Route::get('/dashboard/produits', [App\Http\Controllers\ProduitController::class, 'index'])->name('dashboard.produit');
Route::delete('/dashboard/produits/{id}', [App\Http\Controllers\ProduitController::class, 'destroy'])->name('produit.destroy');
Route::post('/dashboard/produits', [App\Http\Controllers\ProduitController::class, 'store'])->name('produit.store');
Route::put('/dashboard/produits/{id}/edit', [App\Http\Controllers\ProduitController::class, 'update'])->name('produit.update');