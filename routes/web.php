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


Route::get('admin/dashboard', [\App\Http\Controllers\Admin\AdminDashboard::class, 'index']);
Route::prefix('admin/penduduk')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'index']);
    Route::get('/create', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'create']);
    Route::post('/', [\App\Http\Controllers\Admin\AdminPenduduk::class,'store']);
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
