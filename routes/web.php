<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/wel', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('users.index');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'role:Admin'])->group(function () {
    // Routes accessible only to admin role
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
Route::middleware(['auth', 'role:recruiter|Admin'])->group(function () {    // Routes accessible only to editor role
    
    Route::resource('products', ProductController::class);

});

Route::get('/dash', [ProductController::class, 'index']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 
    // Our resource routes

require __DIR__.'/auth.php';