<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentUserController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Route Panel
Route::post('/panel/registrasi', [AuthController::class, 'registerPanel'])->name('registerpanel');
Route::post('/panel/login', [AuthController::class, 'loginPanel'])->name('loginpanel');
// Route Panel After Login
Route::middleware(['auth:panel'])->group(function () {
    Route::apiResource("/user", UserController::class);
});
// Route Pendaftar
Route::post('/registrasi', [AuthController::class, 'registerPendaftar'])->name('registrasi');
Route::post('/login', [AuthController::class, 'loginPendaftar'])->name('login');
// Route Pendaftar After Login
Route::middleware(['auth:pendaftar'])->group(function () {
    Route::apiResource("/pendaftar", StudentUserController::class);
});
// Route Log Out
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
