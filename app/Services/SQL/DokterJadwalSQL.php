<?php

namespace App\Services\SQL;

use App\Models\JadwalDokter;
use Illuminate\Support\Facades\Auth;

class DokterJadwalSQL
{
    public function getJadwalData()
    {
        $userId = Auth::id();

        return JadwalDokter::join('users as dokter', 'jadwal_dokters.id_dokter', '=', 'dokter.id')
            ->select([
                'jadwal_dokters.id',
                'jadwal_dokters.id_dokter',
                'dokter.nama',
                'jadwal_dokters.hari',
                'jadwal_dokters.jam_mulai',
                'jadwal_dokters.jam_selesai',
            ])
            ->where('jadwal_dokters.id_dokter', '=', $userId)
            ->get();
    }
}
