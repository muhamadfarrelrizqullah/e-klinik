<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pengajuan;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $pasienCount = User::where('role', 'Pasien')->count();
        $pengajuanCount = Pengajuan::count();
        $dokterCount = User::where('role', 'Dokter')->count();
        $aktifDokterCount = User::where('role', 'Dokter')->where('status', 'Aktif')->count();
        $poliCount = Poli::count();
        $divisiCount = Divisi::count();
        $performance = Pengajuan::select(DB::raw('DATE(tanggal_pengajuan) as date'), DB::raw('COUNT(*) as pengajuan_count'))
        ->groupBy(DB::raw('DATE(tanggal_pengajuan)'))
        ->orderBy(DB::raw('DATE(tanggal_pengajuan)'), 'asc')
        ->get();
        return view('admin.dashboard', compact('pasienCount', 'pengajuanCount', 'dokterCount', 'aktifDokterCount', 'poliCount', 'divisiCount', 'performance'));
    }

    public function indexDokter()
    {
        return view('dokter.dashboard');
    }

    public function indexPasien()
    {
        return view('pasien.dashboard');
    }
}
