<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanHarian;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Livewire\Users;
use App\Http\Controllers\PemesananController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::get('/dashboard', [ DashboardController::class, "index_view" ])->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('/pelanggan', [ PelangganController::class, "index_view" ])->name('pelanggan');
    Route::view('/pelanggan/new', "pages.user.pelanggan-new")->name('pelanggan.new');
    Route::view('/pelanggan/edit/{pelangganId}', "pages.user.pelanggan-edit")->name('pelanggan.edit');
    Route::get('/pelanggan/riwayat/{pelangganId}',[ PelangganController::class, "riwayat_view"])->name('pelanggan.riwayat');

    Route::get('/pemesanan', [ PemesananController::class, "index_view" ])->name('pemesanan');
    Route::get('/pemesanan/bayar/{pemesananId}',  [ PemesananController::class, "bayar_view" ])->name('bayar');
    Route::view('/pemesanan/new', "pages.user.pemesanan-new")->name('pemesanan.new');
    Route::view('/pemesanan/edit/{pemesananId}', "pages.user.pemesanan-edit")->name('pemesanan.edit');
    Route::get('/pemesanan/bayar/{pemesananId}/konfirmasi',  [ PemesananController::class, "konfirmasi_view" ])->name('bayar.konfirmasi');
    Route::get('/pemesanan/bayar/{pemesananId}/konfirmasi/iya', [ PemesananController::class, "konfirmasi_iya" ] )->name('bayar.iya');
    Route::get('/cetakstruk/{pemesananId}', [ PemesananController::class, "cetak_struk" ] )->name('cetak.struk');

    Route::get('/jenis_mobil', [ JenisController::class, "index_view" ])->name('jenis');
    Route::view('/jenis/new', "pages.user.jenis-new")->name('jenis.new');
    Route::view('/jenis/edit/{jenisId}', "pages.user.jenis-edit")->name('jenis.edit');

    Route::get('/merek_mobil', [ MerekController::class, "index_view" ])->name('merek');
    Route::view('/merek/new', "pages.user.merek-new")->name('merek.new');
    Route::view('/merek/edit/{merekId}', "pages.user.merek-edit")->name('merek.edit');

    Route::get('/layanan_mobil', [ LayananController::class, "index_view" ])->name('layanan');
    Route::view('/layanan/new', "pages.user.layanan-new")->name('layanan.new');
    Route::view('/layanan/edit/{layananId}', "pages.user.layanan-edit")->name('layanan.edit');

    Route::get('/paket_mobil', [ PaketController::class, "index_view" ])->name('paket');
    Route::view('/paket/new', "pages.user.paket-new")->name('paket.new');
    Route::view('/paket/edit/{paketId}', "pages.user.paket-edit")->name('paket.edit');


    //Laporan
    Route::get('/laporanharian', [LaporanController::class, "index_view"])->name('laporanharian');
    Route::get('/laporanbulanan', [LaporanController::class, "index_view_bulanan"])->name('laporanbulanan');
});
