<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class DokterPengajuanSQL
{
    public function getPengajuanData()
    {
        $userId = Auth::id();

        return Pengajuan::join('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->join('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->join('pivot_polis_users', function ($join) use ($userId) {
                $join->on('pengajuans.id_poli', '=', 'pivot_polis_users.id_poli')
                    ->where(function ($query) use ($userId) {
                        $query->Where('pivot_polis_users.id_dokter', '=', $userId);
                    });
            })
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
            ->where('pengajuans.status', 'Pending')
            ->get();
    }
}
