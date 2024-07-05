<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\DashboardController;
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

//Dokter
Route::get('/dokter/dashboard', [DashboardController::class, 'indexDokter'])->name('dokter-dashboard');

//Pasien
Route::get('/pasien/dashboard', [DashboardController::class, 'indexPasien'])->name('pasien-dashboard');