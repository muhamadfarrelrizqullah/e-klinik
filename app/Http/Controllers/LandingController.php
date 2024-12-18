<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengajuan;
use App\Models\PivotPoliUser;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Services\SQL\LandingPengajuanSQL;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing()
    {
        $totalDokter = User::where('role', 'Dokter')->count();
        $totalPengajuan = Pengajuan::where('status', 'Selesai')->count();
        $totalPasien = User::where('role', 'Pasien')->count();
        $dataDokter = User::join('divisis', 'users.divisi_id', '=', 'divisis.id')
            ->leftJoin('pivot_polis_users', 'users.id', '=', 'pivot_polis_users.id_dokter')
            ->leftJoin('polis', 'pivot_polis_users.id_poli', '=', 'polis.id')
            ->select([
                'users.id',
                'users.nip',
                'users.nama',
                'users.status',
                'users.role',
                'divisis.id as divisi_id',
                'divisis.nama as divisi_nama',
                'users.tanggal_lahir',
                'users.tinggi_badan',
                'users.berat_badan',
            ])
            ->selectRaw("string_agg(polis.nama, ', ') as poli_nama")
            ->selectRaw("string_agg(polis.id::text, ', ') as poli_id")
            ->where('users.role', '=', 'Dokter')
            ->groupBy(
                'users.id',
                'users.nip',
                'users.nama',
                'users.status',
                'users.role',
                'divisis.id',
                'divisis.nama',
                'users.tanggal_lahir',
                'users.tinggi_badan',
                'users.berat_badan'
            )
            ->get();
        $companyProfiles = CompanyProfile::first();
        $dataBerita = Berita::orderBy('created_at', 'desc')->take(3)->get();
        return view('landing', compact('totalDokter', 'totalPengajuan', 'totalPasien', 'dataDokter', 'companyProfiles', 'dataBerita'));
    }

    public function landing_antrian()
    {
        $totalDokter = User::where('role', 'Dokter')->count();
        $totalPengajuan = Pengajuan::where('status', 'Selesai')->count();
        $totalPasien = User::where('role', 'Pasien')->count();
        return view('landing_antrian', compact('totalDokter', 'totalPengajuan', 'totalPasien'));
    }

    public function antrian()
    {
        $tanggalSekarang = date('d-m-Y');
        return view('antrian', compact('tanggalSekarang'));
    }

    protected $DataPengajuan;
    public function __construct(LandingPengajuanSQL $LandingPengajuanSQL)
    {
        $this->DataPengajuan = $LandingPengajuanSQL;
    }

    public function antrianData(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::now()->toDateString());
        $data = $this->DataPengajuan->getPengajuanData($tanggal);

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
