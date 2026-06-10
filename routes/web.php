<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/beranda', function () {
//     return view('pages.beranda');
// });

Route::get('/',[AuthController::class, 'index'])->name('login');
Route::post('/',[AuthController::class, 'login']);

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('form-create-dosen');
    Route::post('/dosen/store', [DosenController::class, 'store'])->name('store-dosen');
    Route::get('/detail-dosen/{nidn}/detail-data-dosen', [DosenController::class, 'show'])->name('detail-dosen');
    Route::delete('/dosen/{nidn}/delete-data-dosen', [DosenController::class, 'destroy'])->name('delete-dosen');
    Route::get('/edit-dosen/{nidn}/edit-data-dosen', [DosenController::class, 'edit'])->name('edit-dosen');
    Route::put('/update-dosen/{nidn}/update-data-dosen', [DosenController::class, 'update'])->name('update-dosen');
    
    Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
    Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('form-create-matakuliah');
    Route::post('/matakuliah/store', [MataKuliahController::class, 'store'])->name('store-matakuliah');
    Route::get('/detail-matakuliah/{kode_matakuliah}/detail-data-matakuliah', [MataKuliahController::class, 'show'])->name('detail-matakuliah');
    Route::get('/edit-matakuliah/{kode_matakuliah}/edit-data-matakuliah', [MataKuliahController::class, 'edit'])->name('edit-matakuliah');
    Route::put('/update-matakuliah/{kode_matakuliah}/update-data-matakuliah', [MataKuliahController::class, 'update'])->name('update-matakuliah');
    Route::delete('/matakuliah/{kode_matakuliah}/delete-data-matakuliah', [MataKuliahController::class, 'destroy'])->name('delete-matakuliah');

    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('form-create-mahasiswa');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('store-mahasiswa');
    Route::get('/detail-mahasiswa/{npm}/detail-data-mahasiswa', [MahasiswaController::class, 'show'])->name('detail-mahasiswa');
    Route::delete('/mahasiswa/{npm}/delete-data-mahasiswa', [MahasiswaController::class, 'destroy'])->name('delete-mahasiswa');
    Route::get('/edit-mahasiswa/{npm}/edit-data-mahasiswa', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
    Route::put('/update-mahasiswa/{npm}/update-data-mahasiswa', [MahasiswaController::class, 'update'])->name('update-mahasiswa');

    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('form-create-jadwal');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('store-jadwal');
    Route::get('/detail-jadwal/{id}/detail-data-jadwal', [JadwalController::class, 'show'])->name('detail-jadwal');
    Route::delete('/jadwal/{id}/delete-data-jadwal', [JadwalController::class, 'destroy'])->name('delete-jadwal');
    Route::get('/edit-jadwal/{id}/edit-data-jadwal', [JadwalController::class, 'edit'])->name('edit-jadwal');
    Route::put('/update-jadwal/{id}/update-data-jadwal', [JadwalController::class, 'update'])->name('update-jadwal');

    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});

Route::prefix('mahasiswa')->middleware(['auth', 'role:mahasiswa'])->name('mahasiswa.')->group(function () {
    Route::get('/krs', [KrsController::class, 'index'])->name('krs');
});