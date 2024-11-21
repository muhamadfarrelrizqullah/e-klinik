<?php

namespace App\Services\SQL;

use App\Models\DetailResep;

class ApotekerObatKeluarSQL
{
    public function getObatKeluarData($data_nama, $data_jenis, $data_tanggal)
    {
        $query = DetailResep::join('obats', 'detail_reseps.id_obat', '=', 'obats.id')
            ->leftJoin('reseps', 'detail_reseps.id_resep', '=', 'reseps.id')
            ->leftJoin('jenis_obats', 'obats.id_jenis', '=', 'jenis_obats.id')
            ->select([
                'detail_reseps.id',
                'detail_reseps.id_resep',
                'detail_reseps.id_obat',
                'obats.nama as nama_obat',
                'jenis_obats.nama as jenis_obat',
                'obats.satuan',
                'obats.qty as jumlah_total',
                'detail_reseps.jumlah as jumlah_keluar',
                'detail_reseps.created_at as tanggal_keluar',
            ])
            ->where('reseps.status', 'Selesai');

        if ($data_nama) {
            $query->where('detail_reseps.id_obat', $data_nama);
        }

        if ($data_jenis) {
            $query->where('obats.id_jenis', $data_jenis);
        }

        if ($data_tanggal) {
            $query->whereDate('detail_reseps.created_at', $data_tanggal);
        }

        return $query->get();
    }
}
