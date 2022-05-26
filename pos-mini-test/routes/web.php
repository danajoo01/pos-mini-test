<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/keranjang', [App\Http\Controllers\HomeController::class, 'keranjang'])->name('keranjang');
    Route::post('/gambar', [App\Http\Controllers\GambarController::class, 'upload'])->name('gambar');

    // Transaksi
    Route::resources([
        'penjualan' => App\Http\Controllers\PenjualanController::class,
        'pembelian' => App\Http\Controllers\PembelianController::class,
    ]);
});

// ADMIN
Route::group(['middleware' => ['auth', 'can:admin']], function () {

    // Laporan
    Route::group([
        'prefix' => 'laporan',
    ], function () {
        Route::get('penjualan', [App\Http\Controllers\HomeController::class, 'penjualan'])->name('laporan.penjualan');
        Route::get('pembelian', [App\Http\Controllers\HomeController::class, 'pembelian'])->name('laporan.pembelian');
    });

    // Master Data
    Route::resources([
        'produk'    => App\Http\Controllers\ProdukController::class,
        'kategori'  => App\Http\Controllers\KategoriController::class,
        'pelanggan' => App\Http\Controllers\PelangganController::class,
        'suplier'   => App\Http\Controllers\SuplierController::class,
        'user'      => App\Http\Controllers\UserController::class,
    ]);
});
