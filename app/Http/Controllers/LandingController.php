<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use App\Services\SQL\LandingPengajuanSQL;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing()
    {
        $totalDokter = User::where('role', 'Dokter')->count();
        $totalPengajuan = Pengajuan::where('status', 'Selesai')->count();
        $totalPasien = User::where('role', 'Pasien')->count();
        return view('landing', compact('totalDokter','totalPengajuan','totalPasien'));
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

    public function antrianData()
    {
        $data = $this->DataPengajuan->getPengajuanData();

        return datatables()->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}