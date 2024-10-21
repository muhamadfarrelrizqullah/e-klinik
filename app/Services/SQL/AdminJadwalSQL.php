<?php

namespace App\Services\SQL;

use App\Models\JadwalDokter;
use Illuminate\Support\Facades\Auth;

class AdminJadwalSQL
{
    public function getJadwalData($id_dokter, $data_hari)
    {
        $query = JadwalDokter::join('users as dokter', 'jadwal_dokters.id_dokter', '=', 'dokter.id')
            ->select([
                'jadwal_dokters.id',
                'jadwal_dokters.id_dokter',
                'dokter.nama',
                'jadwal_dokters.hari',
                'jadwal_dokters.jam_mulai',
                'jadwal_dokters.jam_selesai',
            ]);

        if ($id_dokter) {
            $query->where('jadwal_dokters.id_dokter', $id_dokter);
        }

        if ($data_hari) {
            $query->where('jadwal_dokters.hari', $data_hari);
        }

        $query->orderByRaw("
            CASE jadwal_dokters.hari
                WHEN 'Senin' THEN 1
                WHEN 'Selasa' THEN 2
                WHEN 'Rabu' THEN 3
                WHEN 'Kamis' THEN 4
                WHEN 'Jumat' THEN 5
                ELSE 6 
            END
        ");

        return $query->get();
    }
}
