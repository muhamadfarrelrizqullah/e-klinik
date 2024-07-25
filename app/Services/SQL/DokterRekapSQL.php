<?php

namespace App\Services\SQL;

use App\Models\Rekap;
use Illuminate\Support\Facades\Auth;

class DokterRekapSQL
{
    public function getRekapData()
    {
        $userId = Auth::id();

        return Rekap::join('users as pasien', 'rekaps.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'rekaps.id_dokter', '=', 'dokter.id')
            ->leftJoin('pengajuans', 'rekaps.id_pengajuan', '=', 'pengajuans.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->select([
                'rekaps.id',
                'rekaps.no_rekap',
                'rekaps.id_pasien',
                'pasien.nip as nip_pasien',
                'pasien.nama as nama_pasien',
                'rekaps.id_dokter',
                'dokter.nama as nama_dokter',
                'rekaps.id_pengajuan',
                'polis.nama as nama_poli',
                'pengajuans.keluhan',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.catatan',
                'pengajuans.status_qrcode',
                'rekaps.surat_izin',
            ])
            ->where('rekaps.id_dokter', '=', $userId)
            ->get();
    }
}
