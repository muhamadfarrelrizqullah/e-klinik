<?php

namespace App\Services\SQL;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class DokterPemeriksaanSQL
{
    public function getPemeriksaanData()
    {
        $userId = Auth::id();

        return Pengajuan::leftJoin('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->leftJoin('divisis', 'pasien.divisi_id', '=', 'divisis.id')
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
                'pasien.tanggal_lahir',
                'divisis.nama as divisi_pasien',
                'pengajuans.id_dokter',
                'dokter.nama as nama_dokter',
                'dokter.nip as nip_dokter',
                'polis.id as id_poli',
                'polis.nama as nama_poli',
            ])
            ->where('pengajuans.status', '=', 'Diproses')
            ->get();
    }
}
