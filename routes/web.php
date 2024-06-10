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

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/index', function () {
    return view('warga.index');
});
Route::get('rt/index', function () {
    return view('rt.index');
});
Route::get('/berita', function () {
    return view('detailberita');
});


// Guest
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/', [\App\Http\Controllers\AuthController::class, 'storelogin']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/pengajuan', [\App\Http\Controllers\AuthController::class, 'pengajuan']);
Route::post('/storePengajuan', [\App\Http\Controllers\AuthController::class, 'storepengajuan']);
Route::post('/checkPengajuan', [\App\Http\Controllers\AuthController::class, 'checkPengajuan']);

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Admin'], function () {
        Route::prefix('admin')->group(function () {
            // Dashboard
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
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
            // Dashboard
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
            // Penduduk
            Route::prefix('/penduduk')->group(function () {
                Route::get('/', [\App\Http\Controllers\PendudukController::class, 'index']);
                Route::post('/download', [\App\Http\Controllers\PendudukController::class, 'download']);
                Route::get('/keluarga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailKeluarga']);
                Route::get('/warga/{id}', [\App\Http\Controllers\PendudukController::class, 'detailWarga']);
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
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Warga'], function() {
        Route::prefix('warga')->group(function () {

        });
    });
});
