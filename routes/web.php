<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DetailPembayaranController;
use App\Http\Controllers\CekPembayaranController;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('kelas')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/createOrUpdate', [KelasController::class, 'createOrUpdate'])->name('kelas.createOrUpdate');
        Route::get('/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::delete('/delete/{id}', [KelasController::class, 'delete'])->name('kelas.delete');
    });

    Route::prefix('spp')->group(function () {
        Route::get('/', [SppController::class, 'index'])->name('spp.index');
        Route::get('/create', [SppController::class, 'create'])->name('spp.create');
        Route::post('/createOrUpdate', [SppController::class, 'createOrUpdate'])->name('spp.createOrUpdate');
        Route::get('/edit/{id}', [SppController::class, 'edit'])->name('spp.edit');
        Route::delete('/delete/{id}', [SppController::class, 'delete'])->name('spp.delete');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/createOrUpdate', [SiswaController::class, 'createOrUpdate'])->name('siswa.createOrUpdate');
        Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::delete('/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
    });

    Route::prefix('petugas')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/create', [PetugasController::class, 'create'])->name('petugas.create');
        Route::post('/createOrUpdate', [PetugasController::class, 'createOrUpdate'])->name('petugas.createOrUpdate');
        Route::get('/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::delete('/delete/{id}', [PetugasController::class, 'delete'])->name('petugas.delete');
    });

    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::get('/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/createOrUpdate', [PembayaranController::class, 'createOrUpdate'])->name('pembayaran.createOrUpdate');
        Route::get('/edit/{id}', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
        Route::delete('/delete/{id}', [PembayaranController::class, 'delete'])->name('pembayaran.delete');
    });

    Route::prefix('cekpembayaran')->group(function () {
        Route::get('/', [CekPembayaranController::class, 'index'])->name('cekpembayaran.index');
        Route::post('/search', [CekPembayaranController::class, 'search'])->name('cekpembayaran.search');
    });

    Route::prefix('detail-pembayaran')->group(function () {
        Route::get('/', [DetailPembayaranController::class, 'index'])->name('detailpembayaran.index');
        Route::get('/print', [DetailPembayaranController::class, 'print'])->name('detailpembayaran.print');
    });
});