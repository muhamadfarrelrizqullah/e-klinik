<?php

namespace App\Services\SQL;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class PasienRatingSQL
{
    public function getRatingData()
    {
        $userId = Auth::id();

        return Rating::leftJoin('pengajuans', 'ratings.id', '=', 'pengajuans.id_rating')
            ->leftJoin('users as pasien', 'pengajuans.id_pasien', '=', 'pasien.id')
            ->leftJoin('users as dokter', 'pengajuans.id_dokter', '=', 'dokter.id')
            ->leftJoin('polis', 'pengajuans.id_poli', '=', 'polis.id')
            ->select(
                'ratings.rating',
                'ratings.komentar',
                'ratings.created_at as tanggal_rating',
                'pengajuans.id as pengajuan_id',
                'pengajuans.keluhan',
                'pengajuans.status',
                'pengajuans.tanggal_pengajuan',
                'pengajuans.tanggal_pemeriksaan',
                'pengajuans.catatan',
                'pasien.id as id_pasien',
                'pasien.nip as nip_pasien',
                'pasien.nama as nama_pasien',
                'dokter.id as id_dokter',
                'dokter.nip as nip_dokter',
                'dokter.nama as nama_dokter',
                'polis.nama as nama_poli'
            )
            ->where('pengajuans.id_pasien', $userId)
            ->get();
    }
}
