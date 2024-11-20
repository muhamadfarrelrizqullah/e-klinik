<?php

namespace App\Services\SQL;

use App\Models\Obat;

class ApotekerObatSQL
{
    public function getObatData($data_jenis, $data_satuan)
    {
        $query = Obat::join('jenis_obats', 'obats.id_jenis', '=', 'jenis_obats.id')
            ->select([
                'obats.id',
                'obats.nama',
                'obats.id_jenis',
                'jenis_obats.nama as jenis_obat',
                'obats.satuan',
                'obats.qty',
            ]);

        if ($data_jenis) {
            $query->where('obats.id_jenis', $data_jenis);
        }

        if ($data_satuan) {
            $query->where('obats.satuan', $data_satuan);
        }

        return $query->get();
    }
}
