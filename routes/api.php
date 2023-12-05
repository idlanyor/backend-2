<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;
// Panel

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::post('/registrasi', [RegisterController::class,''])->name('registrasi');
Route::post('/panel/login', [LoginController::class,'loginPanel'])->name('loginpanel');
Route::post('/login', [LoginController::class,'loginPendaftar'])->name('login');
Route::middleware(['auth:panel'])->group(function () {
    Route::apiResource("/buku", BookController::class);
});
Route::middleware(['auth:pendaftar'])->group(function () {
    Route::apiResource("/buku", BookController::class);
});
Route::post('/logout', LogoutController::class)->name('logout');
