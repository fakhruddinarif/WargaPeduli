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
Route::get('/pengajuan', function () {
    return view('pengajuan');
});
Route::get('user/index', function () {
    return view('user.index');
});
Route::get('rt/index', function () {
    return view('rt.index');
});
Route::get('/modal', function () {
    return view('components.modals.modal_pengajuan_akun');
});



Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/', [\App\Http\Controllers\AuthController::class, 'storelogin']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'level:Admin'], function () {
        Route::prefix('admin')->group(function () {
            // Dashboard
            Route::get('/', [\App\Http\Controllers\Admin\AdminDashboard::class, 'index']);
            // Penduduk
            Route::prefix('/penduduk')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'index']);
                Route::get('/create/keluarga', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'createKeluarga']);
                Route::post('/keluarga', [\App\Http\Controllers\Admin\AdminPenduduk::class,'storeKeluarga']);
                Route::get('/keluarga/{id}', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'detailKeluarga']);
                Route::put('/update/keluarga/{id}', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'updateKeluarga']);
                Route::get('/create/warga', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'createWarga']);
                Route::post('/warga', [\App\Http\Controllers\Admin\AdminPenduduk::class,'storeWarga']);
                Route::get('/warga/{id}', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'detailWarga']);
                Route::put('/update/warga/{id}', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'updateWarga']);
            });
            // Akun
            Route::prefix('/akun')->group(function () {
                Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
                Route::get('/create', [\App\Http\Controllers\UserController::class, 'create']);
                Route::post('/', [\App\Http\Controllers\UserController::class, 'store']);
                Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\UserController::class, 'update']);
            });
            // Informasi
            Route::prefix('informasi')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\AdminInformasi::class, 'index']);
                Route::get('/create', [\App\Http\Controllers\Admin\AdminInformasi::class, 'create']);
                Route::post('/', [\App\Http\Controllers\Admin\AdminInformasi::class, 'store']);
                Route::get('/{id}', [\App\Http\Controllers\Admin\AdminInformasi::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\Admin\AdminInformasi::class, 'update']);
            });
            // Laporan
            Route::prefix('/laporan')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\AdminLaporan::class, 'index']);
                Route::get('/{id}', [\App\Http\Controllers\Admin\AdminLaporan::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\Admin\AdminLaporan::class, 'update']);
            });
            // Bansos
            Route::prefix('/bansos')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\AdminBansos::class, 'index']);
                Route::get('/create', [\App\Http\Controllers\Admin\AdminBansos::class, 'create']);
                Route::post('/', [\App\Http\Controllers\Admin\AdminBansos::class, 'store']);
                Route::get('/{id}', [\App\Http\Controllers\Admin\AdminBansos::class, 'detail']);
                Route::put('/update/{id}', [\App\Http\Controllers\Admin\AdminBansos::class, 'update']);
                Route::get('/mabac/{id}', [\App\Http\Controllers\Admin\AdminBansos::class, 'mabac']);
                Route::get('/saw/{id}', [\App\Http\Controllers\Admin\AdminBansos::class, 'saw']);
            });
        });
    });
});
