<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\RepresentasiController;
use App\Http\Controllers\BiayaTiketPesawatController;
use App\Http\Controllers\BiayaTransportasiDaratController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MataAnggaranController;

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
    return redirect('/login');
});


Auth::routes();
Route::get('/register', function () {
    return abort(404);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile.update', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('spd', SpdController::class);
    Route::prefix('spd')->group(function () {
        Route::get('/detail/{id}', [SpdController::class, 'detail'])->name('detail');
        Route::get('/cetak-permintaan/{id}', [SpdController::class, 'cetakPermintaan'])->name('cetak.permintaan');
        Route::get('/cetak-surat-tugas/{id}', [SpdController::class, 'cetakSuratTugas'])->name('cetak.suratTugas');
        Route::get('/cetak-surat-spd/{id}', [SpdController::class, 'cetakSuratSpd'])->name('cetak.suratSpd');
        Route::get('/cetak-kwitansi/{id}', [SpdController::class, 'cetakKwitansi'])->name('cetak.kwitansi');
        Route::post('/verifikasiSpd/{id}', [SpdController::class, 'verifikasiSpd'])->name('verifikasiSpd');
        Route::post('/penugasan/{id}', [SpdController::class, 'penugasan'])->name('penugasan');
        Route::post('/selesai/{id}', [SpdController::class, 'selesai'])->name('selesai');
        Route::post('/tiket_pesawat/{id}', [SpdController::class, 'tiket_pesawat'])->name('tiket_pesawat');
        Route::post('/spd/{id}/tolak', [SpdController::class, 'tolak'])->name('spd.tolak');
        Route::get('/nota/{id}', [SpdController::class, 'nota'])->name('nota');
        Route::post('/nota/add_nota', [SpdController::class, 'add_nota'])->name('add_nota');
    });
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('golongan', GolonganController::class);
    Route::resource('representasi', RepresentasiController::class);
    Route::resource('biaya', BiayaController::class);
    Route::resource('biayaTransportasiDarat', BiayaTransportasiDaratController::class);
    Route::resource('biayaTiketPesawat', BiayaTiketPesawatController::class);
    Route::resource('mataAnggaran', MataAnggaranController::class);
    Route::prefix('laporan')->group(function () {
        Route::get('/laporanDitolak', [LaporanController::class, 'laporanDitolak'])->name('laporan.laporanDitolak');
        Route::get('/laporanSelesai', [LaporanController::class, 'laporanSelesai'])->name('laporan.laporanSelesai');
        // Route::post('/laporanSelesai', [LaporanController::class, 'laporanSelesai'])->name('laporan.laporanSelesai');
    });
});

// getprovinsi & kota ajax
Route::get('selectProv', [SpdController::class, 'getProvince'])->name('selectProv');
Route::get('selectCity/{id}', [SpdController::class, 'getCity']);
