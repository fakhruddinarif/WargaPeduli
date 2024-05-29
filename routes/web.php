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
Route::get('/login', function () {
    return view('login');
});

Route::get('user/index', function () {
    return view('user.index');
});
Route::get('rt/index', function () {
    return view('rt.index');
});

Route::middleware(['auth', 'level:Admin'])->prefix('admin')->group(function () {
    
});

Route::get('admin/dashboard', [\App\Http\Controllers\Admin\AdminDashboard::class, 'index']);
Route::prefix('admin/penduduk')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'index']);
    Route::get('/create/keluarga', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'createKeluarga']);
    Route::post('/keluarga', [\App\Http\Controllers\Admin\AdminPenduduk::class,'storeKeluarga']);
    Route::get('/keluarga/{id}', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'detailKeluarga']);
    Route::get('/create/warga', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'createWarga']);
    Route::post('/warga', [\App\Http\Controllers\Admin\AdminPenduduk::class,'storeWarga']);
    Route::get('/warga/{id}', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'detailWarga']);
});
Route::prefix('admin/bansos')->group(function () {
   Route::get('/', [\App\Http\Controllers\Admin\AdminBansos::class, 'index']);
   Route::get('/create', [\App\Http\Controllers\Admin\AdminBansos::class, 'create']);
   Route::get('/detail', [\App\Http\Controllers\Admin\AdminBansos::class, 'detail']);
});
Route::prefix('admin/laporan')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminLaporan::class, 'index']);
    Route::get('/detail', [\App\Http\Controllers\Admin\AdminLaporan::class, 'detail']);
});
Route::prefix('admin/informasi')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminInformasi::class, 'index']);
    Route::get('/create', [\App\Http\Controllers\Admin\AdminInformasi::class, 'create']);
    Route::get('/detail', [\App\Http\Controllers\Admin\AdminInformasi::class, 'detail']);
});
