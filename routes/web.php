<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
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
Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/antrian-pemeriksaan', [LandingController::class, 'antrian'])->name('antrian');
Route::get('/data-antrian-pemeriksaan', [LandingController::class, 'antrianData'])->name('antrian-data');
Route::get('/login', [AutentikasiController::class, 'login'])->name('login');
Route::post('/login-process', [AutentikasiController::class, 'loginProcess'])->name('login-process');
Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');

Route::get('/logo-base64', [PdfController::class, 'getLogoBase64']);
Route::post('/qr-scan/{id}', [QRController::class, 'scanQr'])->name('update-status-from-qr');

// Admin Routes
Route::prefix('admin')->name('admin-')->middleware('role:Admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');
    Route::get('/poli', [PoliController::class, 'index'])->name('poli');
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/scan-qr', [QrController::class, 'indexAdmin'])->name('scanqr');
    Route::get('/rating', [RatingController::class, 'indexAdmin'])->name('rating');
    Route::get('/jadwal-dokter', [JadwalDokterController::class, 'indexAdmin'])->name('jadwaldokter');
    Route::get('/rekam-medis', [RekamMedisController::class, 'indexAdmin'])->name('rekammedis');
    Route::get('/obat', [ObatController::class, 'indexAdmin'])->name('obat');

    Route::get('/data-user-pasien', [UserController::class, 'readPasien'])->name('datauser-pasien');
    Route::get('/data-user-dokter', [UserController::class, 'readDokter'])->name('datauser-dokter');
    Route::get('/data-user-admin', [UserController::class, 'readAdmin'])->name('datauser-admin');
    Route::post('/data-user-tambah', [UserController::class, 'store'])->name('datauser-tambah');
    Route::put('/data-user-edit', [UserController::class, 'update'])->name('datauser-edit');
    Route::delete('/data-user-delete/{id}', [UserController::class, 'destroy'])->name('datauser-delete');
    Route::post('/data-user-reset-password', [UserController::class, 'resetPassword'])->name('datauser-resetpassword');

    Route::get('/data-divisi', [DivisiController::class, 'read'])->name('datadivisi');
    Route::post('/data-divisi-tambah', [DivisiController::class, 'store'])->name('datadivisi-tambah');
    Route::put('/data-divisi-edit', [DivisiController::class, 'update'])->name('datadivisi-edit');
    Route::delete('/data-divisi-delete/{id}', [DivisiController::class, 'destroy'])->name('datadivisi-delete');

    Route::get('/data-poli', [PoliController::class, 'read'])->name('datapoli');
    Route::post('/data-poli-tambah', [PoliController::class, 'store'])->name('datapoli-tambah');
    Route::put('/data-poli-edit', [PoliController::class, 'update'])->name('datapoli-edit');
    Route::delete('/data-poli-delete/{id}', [PoliController::class, 'destroy'])->name('datapoli-delete');

    Route::get('/data-pengajuan', [PengajuanController::class, 'read'])->name('datapengajuan');
    Route::put('/data-pengajuan-edit', [PengajuanController::class, 'update'])->name('datapengajuan-edit');
    Route::delete('/data-pengajuan-delete/{id}', [PengajuanController::class, 'destroy'])->name('datapengajuan-delete');
    Route::post('/data-pengajuan-update-status/{id}', [PengajuanController::class, 'updateStatus'])->name('datapengajuanstatus-update');
    Route::post('/tolak-pengajuan-hari-ini', [PengajuanController::class, 'tolakPengajuanHariIni'])->name('tolakpengajuanhariini');

    Route::get('/data-rating', [RatingController::class, 'readAdmin'])->name('datarating');
    Route::put('/data-rating-edit', [RatingController::class, 'update'])->name('datarating-edit');
    Route::delete('/data-rating-delete/{id}', [RatingController::class, 'destroy'])->name('datarating-delete');

    Route::get('/data-jadwal-dokter', [JadwalDokterController::class, 'readAdmin'])->name('datajadwaldokter');
    Route::post('/data-jadwal-dokter-tambah', [JadwalDokterController::class, 'storeAdmin'])->name('datajadwaldokter-tambah');
    Route::put('/data-jadwal-dokter-edit', [JadwalDokterController::class, 'updateAdmin'])->name('datajadwaldokter-edit');
    Route::delete('/data-jadwal-dokter-delete/{id}', [JadwalDokterController::class, 'destroy'])->name('datajadwaldokter-delete');

    Route::get('/profil-edit', [ProfilController::class, 'edit'])->name('profil-edit');
    Route::post('/profil-edit', [ProfilController::class, 'update'])->name('profil-update');
});

// Dokter Routes
Route::prefix('dokter')->name('dokter-')->middleware('role:Dokter')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexDokter'])->name('dashboard');
    Route::get('/pengajuan', [PengajuanController::class, 'indexDokter'])->name('pengajuan');
    Route::get('/pemeriksaan', [PemeriksaanController::class, 'indexDokter'])->name('pemeriksaan');
    Route::get('/histori-pengajuan', [RekapController::class, 'indexDokter'])->name('historipengajuan');
    Route::get('/jadwal-dokter', [JadwalDokterController::class, 'indexDokter'])->name('jadwaldokter');
    Route::get('/profil', [ProfilController::class, 'indexDokter'])->name('profil');

    Route::get('/data-pengajuan', [PengajuanController::class, 'readDokter'])->name('datapengajuan');
    Route::post('/data-pengajuan-tambah', [PengajuanController::class, 'store'])->name('datapengajuan-tambah');

    Route::get('/data-pemeriksaan', [PemeriksaanController::class, 'readPemeriksaan'])->name('datapemeriksaan');
    Route::post('/data-pemeriksaan-tambah', [PemeriksaanController::class, 'storePemeriksaan'])->name('datapemeriksaan-tambah');

    Route::get('/data-rekap', [RekapController::class, 'read'])->name('datarekap');

    Route::get('/data-jadwal-dokter', [JadwalDokterController::class, 'readDokter'])->name('datajadwaldokter');
    Route::post('/data-jadwal-dokter-tambah', [JadwalDokterController::class, 'store'])->name('datajadwaldokter-tambah');
    Route::put('/data-jadwal-dokter-edit', [JadwalDokterController::class, 'update'])->name('datajadwaldokter-edit');
    Route::delete('/data-jadwal-dokter-delete/{id}', [JadwalDokterController::class, 'destroy'])->name('datajadwaldokter-delete');

    Route::get('/profil-edit', [ProfilController::class, 'editDokter'])->name('profil-edit');
    Route::post('/profil-edit', [ProfilController::class, 'update'])->name('profil-update');
});

// Pasien Routes
Route::prefix('pasien')->name('pasien-')->middleware('role:Pasien')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexPasien'])->name('dashboard');
    Route::get('/pengajuan', [PengajuanController::class, 'indexPasien'])->name('pengajuan');
    Route::get('/profil', [ProfilController::class, 'indexPasien'])->name('profil');
    Route::get('/rating', [RatingController::class, 'index'])->name('rating');
    Route::get('/jadwal-dokter', [JadwalDokterController::class, 'indexPasien'])->name('jadwaldokter');

    Route::get('/data-pengajuan', [PengajuanController::class, 'readPasien'])->name('datapengajuan');
    Route::post('/data-pengajuan-tambah', [PengajuanController::class, 'store'])->name('datapengajuan-tambah');
    Route::post('/rating-pengajuan-tambah', [PengajuanController::class, 'addRating'])->name('ratingpengajuan-tambah');

    Route::get('/data-rating', [RatingController::class, 'read'])->name('datarating');

    Route::get('/data-jadwal-dokter', [JadwalDokterController::class, 'readPasien'])->name('datajadwaldokter');

    Route::get('/profil-edit', [ProfilController::class, 'editPasien'])->name('profil-edit');
    Route::post('/profil-edit', [ProfilController::class, 'update'])->name('profil-update');
});

// Apoteker Routes
Route::prefix('apoteker')->name('apoteker-')->middleware('role:Apoteker')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexApoteker'])->name('dashboard');
    Route::get('/obat', [ObatController::class, 'indexApoteker'])->name('obat');
    Route::get('/profil', [ProfilController::class, 'indexApoteker'])->name('profil');

    Route::get('/data-obat', [ObatController::class, 'read'])->name('dataobat');
    Route::post('/data-obat-tambah', [ObatController::class, 'store'])->name('dataobat-tambah');
    Route::put('/data-obat-edit', [ObatController::class, 'update'])->name('dataobat-edit');
    Route::delete('/data-obat-delete/{id}', [ObatController::class, 'destroy'])->name('dataobat-delete');
});

