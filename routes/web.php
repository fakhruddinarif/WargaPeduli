<?php

use Illuminate\Support\Facades\Route;

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

// Guest
Route::get('/', [\App\Http\Controllers\AuthController::class, 'landingPage']);
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/', [\App\Http\Controllers\AuthController::class, 'storelogin']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::post('/storePengajuan', [\App\Http\Controllers\AuthController::class, 'storepengajuan']);
Route::post('/checkPengajuan', [\App\Http\Controllers\AuthController::class, 'checkPengajuan']);

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Admin'], function () {
        Route::prefix('admin')->group(function () {
            // Dashboard
            Route::get('/profil', [\App\Http\Controllers\UserController::class, 'profil']);
            Route::put('/change_profile', [\App\Http\Controllers\UserController::class, 'changeProfile']);
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
            Route::post('/pengajuan/penduduk/{id}', [\App\Http\Controllers\PengajuanController::class, 'proses']);
            // Penduduk
            Route::prefix('/penduduk')->group(function () {
                Route::get('/', [\App\Http\Controllers\PendudukController::class, 'index']);
                Route::get('/create/keluarga', [\App\Http\Controllers\PendudukController::class, 'createKeluarga']);
                Route::post('/keluarga', [\App\Http\Controllers\PendudukController::class,'storeKeluarga']);
                Route::get('/keluarga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailKeluarga']);
                Route::put('/update/keluarga/{id}', [\App\Http\Controllers\PendudukController::class, 'updateKeluarga']);
                Route::get('/create/warga', [\App\Http\Controllers\PendudukController::class, 'createWarga']);
                Route::post('/warga', [\App\Http\Controllers\PendudukController::class,'storeWarga']);
                Route::get('/warga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailWarga']);
                Route::put('/update/warga/{id}', [\App\Http\Controllers\PendudukController::class, 'updateWarga']);
                Route::post('/arsip/keluarga/{id}', [\App\Http\Controllers\PendudukController::class, 'arsipKeluarga']);
                Route::post('/arsip/warga/{id}', [\App\Http\Controllers\PendudukController::class, 'arsipWarga']);
                Route::get('/riwayat/keluarga', [\App\Http\Controllers\RiwayatPendudukController::class, 'riwayatKeluarga']);
                Route::get('/riwayat/warga', [\App\Http\Controllers\RiwayatPendudukController::class, 'riwayatWarga']);
                Route::get('/riwayat/keluarga/download/{id}', [\App\Http\Controllers\RiwayatPendudukController::class, 'downloadRiwayatKeluarga']);
                Route::get('/riwayat/warga/download/{id}', [\App\Http\Controllers\RiwayatPendudukController::class, 'downloadRiwayatWarga']);
            });
            // Akun
            Route::prefix('/akun')->group(function () {
                Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
                Route::get('/create', [\App\Http\Controllers\UserController::class, 'create']);
                Route::post('/', [\App\Http\Controllers\UserController::class, 'store']);
                Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\UserController::class, 'update']);
                Route::delete('/delete/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
            });
            // Informasi
            Route::prefix('informasi')->group(function () {
                Route::get('/', [\App\Http\Controllers\InformasiController::class, 'index']);
                Route::get('/create', [\App\Http\Controllers\InformasiController::class, 'create']);
                Route::post('/', [\App\Http\Controllers\InformasiController::class, 'store']);
                Route::get('/{id}', [\App\Http\Controllers\InformasiController::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\InformasiController::class, 'update']);
                Route::delete('/delete/{id}', [\App\Http\Controllers\InformasiController::class, 'destroy']);
            });
            // Laporan
            Route::prefix('/laporan')->group(function () {
                Route::get('/', [\App\Http\Controllers\LaporanController::class, 'index']);
                Route::get('/{id}', [\App\Http\Controllers\LaporanController::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\LaporanController::class, 'update']);
                Route::delete('/delete/{id}', [\App\Http\Controllers\LaporanController::class, 'destroy']);
            });
            // Bansos
            Route::prefix('/bansos')->group(function () {
                Route::get('/', [\App\Http\Controllers\BansosController::class, 'index']);
                Route::get('/create', [\App\Http\Controllers\BansosController::class, 'create']);
                Route::post('/', [\App\Http\Controllers\BansosController::class, 'store']);
                Route::get('/{id}', [\App\Http\Controllers\BansosController::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\BansosController::class, 'update']);
                Route::delete('/delete/{id}', [\App\Http\Controllers\BansosController::class, 'destroy']);
                Route::get('/mabac/{id}/{number?}', [\App\Http\Controllers\BansosController::class, 'mabac']);
                Route::get('/saw/{id}/{number?}', [\App\Http\Controllers\BansosController::class, 'saw']);
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Ketua RW'], function() {
        Route::prefix('rw')->group(function () {
            // Profil
            Route::get('/profil', [\App\Http\Controllers\UserController::class, 'profil']);
            Route::put('/profil_update', [\App\Http\Controllers\UserController::class, 'profilUpdate']);
            Route::put('/change_profile', [\App\Http\Controllers\UserController::class, 'changeProfile']);
            Route::post('/add_warga',[\App\Http\Controllers\PengajuanController::class, 'store']);
            // Dashboard
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
            // Penduduk
            Route::prefix('/penduduk')->group(function () {
                Route::get('/', [\App\Http\Controllers\PendudukController::class, 'index']);
                Route::post('/download', [\App\Http\Controllers\PendudukController::class, 'download']);
                Route::get('/keluarga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailKeluarga']);
                Route::get('/warga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailWarga']);
                Route::get('/riwayat/keluarga', [\App\Http\Controllers\RiwayatPendudukController::class, 'riwayatKeluarga']);
                Route::get('/riwayat/warga', [\App\Http\Controllers\RiwayatPendudukController::class, 'riwayatWarga']);
                Route::get('/riwayat/keluarga/download/{id}', [\App\Http\Controllers\RiwayatPendudukController::class, 'downloadRiwayatKeluarga']);
                Route::get('/riwayat/warga/download/{id}', [\App\Http\Controllers\RiwayatPendudukController::class, 'downloadRiwayatWarga']);
            });
            // Laporan
            Route::prefix('/laporan')->group(function () {
                Route::get('/', [\App\Http\Controllers\LaporanController::class, 'index']);
                Route::get('/', [\App\Http\Controllers\LaporanController::class, 'index']);
                Route::get('/{id}', [\App\Http\Controllers\LaporanController::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\LaporanController::class, 'update']);
                Route::delete('/delete/{id}', [\App\Http\Controllers\LaporanController::class, 'destroy']);
            });
            // Bansos
            Route::prefix('/bansos')->group(function () {
                Route::get('/', [\App\Http\Controllers\BansosController::class, 'index']);
                Route::get('/{id}', [\App\Http\Controllers\BansosController::class, 'detail']);
                Route::get('/mabac/download/{id}/', [\App\Http\Controllers\BansosController::class, 'downloadMabac']);
                Route::get('/saw/download/{id}/', [\App\Http\Controllers\BansosController::class, 'downloadSaw']);
                Route::get('/mabac/{id}/{number?}', [\App\Http\Controllers\BansosController::class, 'mabac']);
                Route::get('/saw/{id}/{number?}', [\App\Http\Controllers\BansosController::class, 'saw']);
                Route::get('/pengajuan/{id}', [\App\Http\Controllers\BansosController::class, 'pengajuan']);
                Route::get('/pengajuan/{bansosId}/detail/{id}', [\App\Http\Controllers\BansosController::class, 'detailPengajuan']);
                Route::put('/{id}/terima' , [\App\Http\Controllers\BansosController::class, 'terima']);
                Route::put('/{id}/tolak', [\App\Http\Controllers\BansosController::class, 'tolak']);
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Ketua RT'], function() {
        Route::prefix('rt')->group(function () {
            // Profil
            Route::get('/profil', [\App\Http\Controllers\UserController::class, 'profil']);
            Route::put('/profil_update', [\App\Http\Controllers\UserController::class, 'profilUpdate']);
            Route::put('/change_profile', [\App\Http\Controllers\UserController::class, 'changeProfile']);
            Route::post('/add_warga',[\App\Http\Controllers\PengajuanController::class, 'store']);
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
            Route::put('/pengajuan/{id}/terima', [\App\Http\Controllers\PengajuanController::class, 'terima']);
            Route::put('/pengajuan/{id}/tolak', [\App\Http\Controllers\PengajuanController::class, 'tolak']);
            Route::prefix('/penduduk')->group(function () {
                Route::get('/keluarga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailKeluarga']);
                Route::get('/warga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailWarga']);
            });
            Route::prefix('/bansos')->group(function () {
               Route::get('/rekomendasi/{keluarga}', [\App\Http\Controllers\BansosController::class, 'rekomendasi']);
               Route::post('/', [\App\Http\Controllers\BansosController::class, 'storePengajuan']);
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Warga'], function() {
        Route::prefix('warga')->group(function () {
            // Profil
            Route::get('/profil', [\App\Http\Controllers\UserController::class, 'profil']);
            Route::put('/profil_update', [\App\Http\Controllers\UserController::class, 'profilUpdate']);
            Route::put('/change_profile', [\App\Http\Controllers\UserController::class, 'changeProfile']);
            Route::post('/add_warga',[\App\Http\Controllers\PengajuanController::class, 'store']);
            Route::post('/create_laporan', [\App\Http\Controllers\LaporanController::class, 'store']);
            Route::post('/bansos/pengajuan', [\App\Http\Controllers\BansosController::class, 'storePengajuan']);
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
        });
    });
});
