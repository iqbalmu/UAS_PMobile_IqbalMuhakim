<?php

use App\Http\Controllers\AdmisiController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalPraktekController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamMedikController;
use App\Http\Controllers\TebusObatController;
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

Route::middleware('auth.check')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        // Route::get('/pasien/new/{step?}', [PasienController::class, 'create'])->name('pasien.create');
        // Route::post('/pasien/new/account', [PasienController::class, 'storeAccount'])->name('pasien.create.account');
        // Route::post('/pasien/new/profile', [PasienController::class, 'storeProfile'])->name('pasien.create.profile');

        Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
        Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
        Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
        Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

        Route::get('/poli', [PoliController::class, 'index'])->name('poli.index');
        Route::post('/poli', [PoliController::class, 'store'])->name('poli.store');
        Route::put('/poli', [PoliController::class, 'update'])->name('poli.update');
        Route::delete('/poli', [PoliController::class, 'destroy'])->name('poli.destroy');

        Route::get('/apoteker', [ApotekerController::class, 'index'])->name('apoteker.index');
        Route::get('/apoteker/{id}/show', [ApotekerController::class, 'show'])->name('apoteker.show');
        Route::get('/apoteker/create', [ApotekerController::class, 'create'])->name('apoteker.create');
        Route::post('/apoteker', [ApotekerController::class, 'store'])->name('apoteker.store');
        Route::get('/apoteker/{id}/edit', [ApotekerController::class, 'edit'])->name('apoteker.edit');
        Route::put('/apoteker/{id}', [ApotekerController::class, 'update'])->name('apoteker.update');
        Route::delete('/apoteker/{id}', [ApotekerController::class, 'destroy'])->name('apoteker.destroy');

        Route::get('/admisi', [AdmisiController::class, 'index'])->name('admisi.index');
        Route::get('/admisi/{id}/show', [AdmisiController::class, 'show'])->name('admisi.show');
        Route::get('/admisi/create', [AdmisiController::class, 'create'])->name('admisi.create');
        Route::post('/admisi', [AdmisiController::class, 'store'])->name('admisi.store');
        Route::get('/admisi/{id}/edit', [AdmisiController::class, 'edit'])->name('admisi.edit');
        Route::put('/admisi/{id}', [AdmisiController::class, 'update'])->name('admisi.update');
        Route::delete('/admisi/{id}', [AdmisiController::class, 'destroy'])->name('admisi.destroy');
    });

    Route::middleware('role:apoteker')->group(function () {
        Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
        Route::get('/obat/input', [ObatController::class, 'create'])->name('obat.create');
        Route::get('/obat/{id}/detail', [ObatController::class, 'show'])->name('obat.show');
        Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
        Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
        Route::post('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
        Route::delete('/obat', [ObatController::class, 'remove'])->name('obat.remove');

        Route::get('/tebus-obat', [TebusObatController::class, 'index'])->name('tebus-obat.index');
    });

    Route::middleware('role:admisi')->group(function () {
        Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
        Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
        Route::get('/pasien/new', [PasienController::class, 'create'])->name('pasien.create');
        Route::post('/pasien/new', [PasienController::class, 'store'])->name('pasien.store');
        Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

        Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
        Route::put('/antrian', [AntrianController::class, 'update'])->name('antrian.update');

        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::put('/pembayaran', [PembayaranController::class, 'update'])->name('pembayaran.update');
    });

    Route::middleware('role:dokter')->group(function () {
        // Route::get('/antrian/{nomor}/poli/{poli}/pasien/{mrn}', [DiagnosaController::class, 'get'])->name('diagnosa.get');
        Route::get('/antrian/{antrian}', [DiagnosaController::class, 'get'])->name('diagnosa.get');
        Route::post('/antrian/{antrian}', [DiagnosaController::class, 'diagnosa'])->name('diagnosa.store');

        Route::get('/janji-temu', [JanjiTemuController::class, 'index'])->name('temu.index');
        Route::post('/janji-temu', [JanjiTemuController::class, 'store'])->name('temu.store');
        Route::put('/janji-temu', [JanjiTemuController::class, 'update'])->name('temu.update');
    });

    Route::middleware('role:admisi,dokter')->group(function () {
        Route::get('/jadwal-praktek', [JadwalPraktekController::class, 'index'])->name('jpraktek.index');
        Route::post('/jadwal-praktek', [JadwalPraktekController::class, 'store'])->name('jpraktek.store');
        Route::put('/jadwal-praktek', [JadwalPraktekController::class, 'update'])->name('jpraktek.update');
        Route::delete('/jadwal-praktek', [JadwalPraktekController::class, 'remove'])->name('jpraktek.remove');

        Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
    });

    Route::middleware('role:admisi,dokter,admin')->group(function () {
        Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
        Route::get('/pasien/{id}/detail', [PasienController::class, 'show'])->name('pasien.show');
        Route::get('/pasien/{userId}/mrn/{mrnId}', [PasienController::class, 'pasienMrn'])->name('pasien.mrn');

        Route::get('/dokter/{id}/detail', [DokterController::class, 'show'])->name('dokter.show');
    });

    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index')->middleware('role:admin,admisi');
});

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'signin'])->name('auth.signin');
Route::delete('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
