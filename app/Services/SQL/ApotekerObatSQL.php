<?php

namespace App\Services\SQL;

use App\Models\Obat;

class ApotekerObatSQL
{
    public function getObatData()
    {
        return Obat::select([
            'obats.id',
            'obats.nama',
            'obats.jenis_obat',
            'obats.satuan',
            'obats.qty',
        ])
            ->get();
    }
}
