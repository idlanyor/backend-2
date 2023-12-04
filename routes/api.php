<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;
// Panel
use App\Http\Controllers\Api\Auth\Panel\LoginPanelController;
use App\Http\Controllers\Api\Auth\Pendaftar\LoginPendaftarController;

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

Route::post('/registrasi', RegisterController::class)->name('registrasi');
Route::post('/panel/login', LoginPanelController::class)->name('loginpanel');
Route::post('/login', LoginPendaftarController::class)->name('login');
Route::middleware(['auth:api'])->group(function () {
    Route::apiResource("/buku", BookController::class);
});
Route::post('/logout', LogoutController::class)->name('logout');
