<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pengajuan;
use App\Models\Poli;
use App\Models\User;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SQL\AdminPengajuanSQL;


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
        $pengajuan = Pengajuan::all();
        return view('dokter.dashboard', compact('pengajuan'));
    }

    public function indexApoteker()
    {
        $obat = Obat::all();
        return view('apoteker.dashboard', compact('obat'));
    }

    public function indexPasien()
    {
        $pengajuan = Pengajuan::where('id_pasien', auth()->user()->id)->get();
        $user = auth()->user();
        $polis = Poli::all();
        return view('pasien.dashboard', compact('pengajuan', 'user', 'polis'));
    }

    public function dasboardPasien(Request $request)
    {
        $userId = auth()->user()->id;

        $pengajuan = Pengajuan::where('id_pasien', $userId)
            ->join('users', 'users.id', '=', 'pengajuans.id_pasien')
            ->select('pengajuans.*', 'users.nama as nama_pasien')
            ->get();

        return datatables()->of($pengajuan)
            ->addIndexColumn()
            ->make(true);
    }
}
