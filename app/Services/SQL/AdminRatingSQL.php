<?php

namespace App\Services\SQL;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class AdminRatingSQL
{
    public function getRatingData()
    {
        $userId = Auth::id();

        return Rating::join('pengajuans', 'ratings.id_pengajuan', '=', 'pengajuans.id')
            ->leftJoin('users as pasien', 'ratings.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'ratings.id_dokter', '=', 'dokter.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->select([
                'pengajuans.id',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.catatan',
                'pengajuans.id_pasien',
                'pasien.nip as nip_pasien',
                'pengajuans.id_dokter',
                'dokter.nama as nama_dokter',
                'dokter.nip as nip_dokter',
                'polis.id as id_poli',
                'polis.nama as nama_poli',
                'ratings.id as id_rating',
                'ratings.rating',
                'ratings.komentar',
                'ratings.created_at as tanggal_rating',
            ])
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
