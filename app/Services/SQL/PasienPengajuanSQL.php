<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class PasienPengajuanSQL
{
    public function getPengajuanData()
    {
        $userId = Auth::id();

        return Pengajuan::join('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
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
            ])
            ->where('pengajuans.id_pasien', $userId)
            ->get();
    }
}
