<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BiodataUmumController;
use App\Http\Controllers\Api\StudentUserController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FilePendaftarController;
use App\Http\Controllers\Api\GelombangAktifController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\api\JalurPendaftaranController;
use App\Http\Controllers\TahunAkademikController;
use App\Models\JadwalJalurPendaftaran;
use Illuminate\Support\Facades\Route;

// Route Panel
Route::post('/panel/registrasi', [AuthController::class, 'registerPanel'])->name('registerpanel');
Route::post('/panel/login', [AuthController::class, 'loginPanel'])->name('loginpanel');
Route::get('/ping', [AuthController::class, 'ping'])->name('ping');
Route::get('/pengumuman', [PostsController::class, 'pengumuman'])->name('pengumuman');
Route::get('/jadwal', [PostsController::class, 'jadwal'])->name('jadwal');
Route::get('/biaya', [PostsController::class, 'biaya'])->name('biaya');
// Route Panel After Login
Route::middleware(['auth:panel'])->group(function () {
    Route::apiResource("panel/user", UserController::class);
    Route::apiResource("panel/gelombang", GelombangAktifController::class);
    Route::apiResource("panel/tahun-akademik", TahunAkademikController::class);
    Route::apiResource("panel/jalur", JalurPendaftaranController::class);
    Route::apiResource("panel/jadwal", JadwalJalurPendaftaran::class);
    Route::apiResource("panel/pendaftar", StudentUserController::class);
});
// Route Pendaftar
Route::post('/registrasi', [AuthController::class, 'registerPendaftar'])->name('registrasi');
Route::post('/login', [AuthController::class, 'loginPendaftar'])->name('login');
// Route Pendaftar After Login
Route::middleware(['auth:pendaftar'])->group(function () {
    Route::get("gelombang-aktif", [GelombangAktifController::class, 'getGelombangAktif']);
    Route::apiResource("/pendaftar", StudentUserController::class);
    Route::get('/file-pendaftar', [FilePendaftarController::class, 'index']);
    Route::get('/biodata-umum', [BiodataUmumController::class, 'index']);
    Route::post('/biodata-umum', [BiodataUmumController::class, 'store']);
    Route::patch('/biodata-umum', [BiodataUmumController::class, 'update']);
    // Route::post('/file-pendaftar', [FilePendaftarController::class, 'store']);
    Route::post('/file-pendaftar', [FilePendaftarController::class, 'update']);
    Route::get("/tahapan", [StudentUserController::class, 'tabelProsesPendaftaran']);
    Route::put("/pendaftar", [StudentUserController::class, 'updateDataPendaftar']);
    Route::get("/biodata", [StudentUserController::class, 'getBiodataPendaftar']);
});
// Route Log Out
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
