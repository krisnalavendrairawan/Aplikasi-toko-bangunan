<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanHasProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/create', [DashboardController::class, 'create']);
Route::post('/dashboard', [DashboardController::class, 'store']);
Route::get('/dashboard/edit', [DashboardController::class, 'edit']);
Route::delete('/dashboard/{karyawan}', [DashboardController::class, 'destroy']);
Route::get('/dashboard/{karyawan}/edit', [DashboardController::class, 'edit']);
Route::put('/dashboard/{karyawan:id}', [DashboardController::class, 'update']);

Route::get('/dashboard/produk', 'App\Http\Controllers\ProdukController@index');
Route::get('/dashboard/produk/create', [ProdukController::class, 'create']);
Route::post('/dashboard/produk', [ProdukController::class, 'store']);
Route::delete('/dashboard/produk/{produk}', [ProdukController::class, 'destroy']);
Route::get('/dashboard/produk/{produk}/edit', [ProdukController::class, 'edit']);
Route::put('/dashboard/produk/{produk:id}', [ProdukController::class, 'update']);

Route::get('/dashboard/penjualan', [PenjualanController::class, 'index']);
Route::get('/dashboard/penjualan/create', [PenjualanController::class, 'create']);
Route::post('/dashboard/penjualan', [PenjualanController::class, 'store']);
Route::delete('/dashboard/penjualan/{penjualan}', [PenjualanController::class, 'destroy']);
Route::get('/dashboard/penjualan/{penjualan}/edit', [PenjualanController::class, 'edit']);
Route::put('/dashboard/penjualan/{penjualan:id}', [PenjualanController::class, 'update']);

Route::get('/dashboard/penjualan_has_produk', [PenjualanHasProdukController::class, 'index']);
Route::get('/dashboard/penjualan_has_produk/create', [PenjualanHasProdukController::class, 'create']);
Route::post('/dashboard/penjualan_has_produk', [PenjualanHasProdukController::class, 'store']);
Route::delete('/dashboard/penjualan_has_produk/{penjualanhasproduk}', [PenjualanHasProdukController::class, 'destroy']);
Route::get('/dashboard/penjualan_has_produk/{penjualanhasproduk}/edit', [PenjualanHasProdukController::class, 'edit']);
Route::put('/dashboard/penjualan_has_produk/{penjualanhasproduk:id}', [PenjualanHasProdukController::class, 'update']);