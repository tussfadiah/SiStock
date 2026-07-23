<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ROUTE YANG BISA DIAKSES SEMUA USER
    |--------------------------------------------------------------------------
    */

    // Data Barang (hanya lihat)
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
    
    Route::get('/laporan/pdf', [LaporanController::class, 'downloadPdf'])
    ->name('laporan.pdf');

    /*
    |--------------------------------------------------------------------------
    | KHUSUS ROLE TEKNISI
    |--------------------------------------------------------------------------
    */

    Route::middleware(['role:teknisi'])->group(function () {

        // CRUD Barang
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
        Route::get('/barang/{id}/barcode', [BarangController::class, 'barcode'])->name('barang.barcode');

        // Barang Masuk
        Route::resource('barang-masuk', BarangMasukController::class);

        // Barang Keluar
        Route::resource('barang-keluar', BarangKeluarController::class);

    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';