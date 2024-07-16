<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
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

//Authentication
Route::get('/', [AutentikasiController::class, 'landing'])->name('landing');
Route::get('/login', [AutentikasiController::class, 'login'])->name('login');
Route::post('/login-process', [AutentikasiController::class, 'loginProcess'])->name('login-process');
Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');

//Admin
Route::get('/admin/dashboard', [DashboardController::class, 'indexAdmin'])->name('admin-dashboard');
Route::get('/admin/user', [UserController::class, 'index'])->name('admin-user');
Route::get('/admin/divisi', [DivisiController::class, 'index'])->name('admin-divisi');
Route::get('/admin/poli', [PoliController::class, 'index'])->name('admin-poli');
Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('admin-pengajuan');
Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin-profil');

Route::get('/admin/data-user-pasien', [UserController::class, 'readPasien'])->name('admin-datauser-pasien');
Route::get('/admin/data-user-dokter', [UserController::class, 'readDokter'])->name('admin-datauser-dokter');
Route::get('/admin/data-user-admin', [UserController::class, 'readAdmin'])->name('admin-datauser-admin');
Route::post('/admin/data-user-tambah', [UserController::class, 'store'])->name('admin-datauser-tambah');
Route::put('/admin/data-user-edit', [UserController::class, 'update'])->name('admin-datauser-edit');
Route::delete('/admin/data-user-delete/{id}', [UserController::class, 'destroy'])->name('admin-datauser-delete');
Route::post('/admin/data-user-reset-password', [UserController::class, 'resetPassword'])->name('admin-datauser-resetpassword');

Route::get('/admin/data-divisi', [DivisiController::class, 'read'])->name('admin-datadivisi');
Route::post('/admin/data-divisi-tambah', [DivisiController::class, 'store'])->name('admin-datadivisi-tambah');
Route::put('/admin/data-divisi-edit', [DivisiController::class, 'update'])->name('admin-datadivisi-edit');
Route::delete('/admin/data-divisi-delete/{id}', [DivisiController::class, 'destroy'])->name('admin-datadivisi-delete');

Route::get('/admin/data-poli', [PoliController::class, 'read'])->name('admin-datapoli');
Route::post('/admin/data-poli-tambah', [PoliController::class, 'store'])->name('admin-datapoli-tambah');
Route::put('/admin/data-poli-edit', [PoliController::class, 'update'])->name('admin-datapoli-edit');
Route::delete('/admin/data-poli-delete/{id}', [PoliController::class, 'destroy'])->name('admin-datapoli-delete');

Route::get('/admin/data-pengajuan', [PengajuanController::class, 'read'])->name('admin-datapengajuan');
Route::put('/admin/data-pengajuan-edit', [PengajuanController::class, 'update'])->name('admin-datapengajuan-edit');
Route::delete('/admin/data-pengajuan-delete/{id}', [PengajuanController::class, 'destroy'])->name('admin-datapengajuan-delete');

//Dokter
Route::get('/dokter/dashboard', [DashboardController::class, 'indexDokter'])->name('dokter-dashboard');

//Pasien
Route::get('/pasien/dashboard', [DashboardController::class, 'indexPasien'])->name('pasien-dashboard');
Route::get('/pasien/pengajuan', [PengajuanController::class, 'indexPasien'])->name('pasien-pengajuan');
Route::get('/pasien/profil', [ProfilController::class, 'indexPasien'])->name('pasien-profil');