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

//Dokter
Route::get('/dokter/dashboard', [DashboardController::class, 'indexDokter'])->name('dokter-dashboard');

//Pasien
Route::get('/pasien/dashboard', [DashboardController::class, 'indexPasien'])->name('pasien-dashboard');
Route::get('/pasien/pengajuan', [PengajuanController::class, 'indexPasien'])->name('pasien-pengajuan');
Route::get('/pasien/profil', [ProfilController::class, 'indexPasien'])->name('pasien-profil');