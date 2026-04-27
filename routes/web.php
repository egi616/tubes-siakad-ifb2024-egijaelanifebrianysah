<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('pages.beranda');
});

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
Route::get('/dosen/create', [DosenController::class, 'create'])->name('form-create-dosen');
Route::post('/dosen/store', [DosenController::class, 'store'])->name('store-dosen');

Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('form-create-matakuliah');
Route::post('/matakuliah/store', [MataKuliahController::class, 'store'])->name('store-matakuliah');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('form-create-mahasiswa');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('store-mahasiswa');


