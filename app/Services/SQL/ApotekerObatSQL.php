<?php

namespace App\Services\SQL;

use App\Models\Obat;

class ApotekerObatSQL
{
    public function getObatData()
    {
        return Obat::join('jenis_obats', 'obats.id_jenis', '=', 'jenis_obats.id')
            ->select([
                'obats.id',
                'obats.nama',
                'obats.id_jenis',
                'jenis_obats.nama as jenis_obat',
                'obats.satuan',
                'obats.qty',
            ])
            ->get();
    }
}
