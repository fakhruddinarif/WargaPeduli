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

Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboard::class, 'index']);
Route::prefix('/penduduk')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminPenduduk::class, 'index']);
});
Route::prefix('/bansos')->group(function () {
   Route::get('/', [\App\Http\Controllers\Admin\AdminBansos::class, 'index']);
    Route::get('/create', function () {
        return view('admin.bansos.create');
    });
    Route::get('/detail', function () {
        return view('admin.bansos.detail');
    });
});
Route::prefix('/laporan')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminLaporan::class, 'index']);
});
Route::prefix('/informasi')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminInformasi::class, 'index']);
});
