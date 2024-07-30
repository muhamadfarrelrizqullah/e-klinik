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
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
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
            ->where('pengajuans.id_dokter', $userId)
            ->get()
            ->map(function ($item) {
                switch ($item->status) {
                    case 'Diterima':
                        $item->status_order = 1;
                        break;
                    case 'Diproses':
                        $item->status_order = 2;
                        break;
                    case 'Ditolak':
                        $item->status_order = 3;
                        break;
                    case 'Selesai':
                        $item->status_order = 4;
                        break;
                    default:
                        $item->status_order = 5;
                        break;
                }
                return $item;
            });
    }
}
