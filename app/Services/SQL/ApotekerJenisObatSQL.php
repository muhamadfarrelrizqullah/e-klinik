<?php

namespace App\Services\SQL;

use App\Models\JenisObat;
use Illuminate\Support\Facades\DB;

class ApotekerJenisObatSQL
{
    public function getJenisObatData()
    {
        return JenisObat::select([
                'jenis_obats.id',
                'jenis_obats.nama',
                DB::raw('COUNT(obats.id) as jumlah_obat') 
            ])
            ->leftJoin('obats', 'jenis_obats.id', '=', 'obats.id_jenis') 
            ->groupBy('jenis_obats.id', 'jenis_obats.nama')
            ->get();
    }
}
