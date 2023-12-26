<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentUserController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FilePendaftarController;
use Illuminate\Support\Facades\Route;

// Route Panel
Route::post('/panel/registrasi', [AuthController::class, 'registerPanel'])->name('registerpanel');
Route::post('/panel/login', [AuthController::class, 'loginPanel'])->name('loginpanel');
Route::get('/ping', [AuthController::class, 'ping'])->name('ping');
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
    Route::get('/file-pendaftar', [FilePendaftarController::class, 'index']);
    Route::post('/file-pendaftar', [FilePendaftarController::class, 'store']);
    Route::patch('/file-pendaftar', [FilePendaftarController::class, 'update']);
    Route::get("/tahapan", [StudentUserController::class, 'tabelProsesPendaftaran']);
    Route::put("/pendaftar", [StudentUserController::class, 'updateDataPendaftar']);
    Route::get("/biodata", [StudentUserController::class, 'getBiodataPendaftar']);
});
// Route Log Out
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
