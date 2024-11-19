<?php

namespace App\Services\SQL;

use App\Models\Obat;

class ApotekerObatSQL
{
    public function getObatData($nama_obat, $data_jenis_obat)
    {
        $query = Obat::select([
            'obats.id',
            'obats.nama',
            'obats.jenis',
            'obats.stok',
            'obats.harga',
        ]);

        // Filter berdasarkan nama obat
        if ($nama_obat) {
            $query->where('obats.nama', 'like', '%' . $nama_obat . '%');
        }

        // Filter berdasarkan jenis obat
        if ($data_jenis_obat) {
            $query->where('obats.jenis', $data_jenis_obat);
        }

        // Urutkan hasil berdasarkan nama obat secara alfabetis
        $query->orderBy('obats.nama', 'asc');

        return $query->get();
    }

}
