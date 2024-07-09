<?php

namespace App\Services\SQL;

use App\Models\Poli;

class AdminPoliSQL
{
    public function getPoliData()
    {
        return Poli::select([
            'id',
            'nama',
        ]);
    }
}
