<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;
use Carbon\Carbon;

class LandingPengajuanSQL
{
    public function getPengajuanData()
    {
        $tanggalSekarang = Carbon::now()->toDateString();
        return Pengajuan::join('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->join('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->select([
                'pengajuans.id',
                'pengajuans.keluhan',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.qrcode',
                'pengajuans.status_qrcode',
                'pengajuans.catatan',
                'pengajuans.id_pasien',
                'pasien.nama as nama_pasien',
                'pasien.nip as nip_pasien',
                'pengajuans.id_dokter',
                'dokter.nama as nama_dokter',
                'dokter.nip as nip_dokter',
                'polis.id as id_poli',
                'polis.nama as nama_poli',
            ])
            ->where('pengajuans.status', 'Diterima')
            ->whereDate('pengajuans.tanggal_pemeriksaan', $tanggalSekarang)
            ->get();
    }
}
