<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Route Panel
Route::post('/panel/registrasi', [RegisterController::class, 'registerPanel'])->name('registerpanel');
Route::post('/panel/login', [LoginController::class, 'loginPanel'])->name('loginpanel');
// Route Panel After Login
Route::middleware(['auth:panel'])->group(function () {
    Route::apiResource("/user", UserController::class);
});
// Route Pendaftar
Route::post('/registrasi', [RegisterController::class, 'registerPendaftar'])->name('registrasi');
Route::post('/login', [LoginController::class, 'loginPendaftar'])->name('login');
// Route Pendaftar After Login
Route::middleware(['auth:pendaftar'])->group(function () {
    // Route::apiResource("/buku", BookController::class);
});
// Route Log Out
Route::post('/logout', LogoutController::class)->name('logout');
