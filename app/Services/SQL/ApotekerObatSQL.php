<?php

namespace App\Services\SQL;

use App\Models\Obat;

class ApotekerObatSQL
{
    public function getObatData()
    {
        return Obat::all();
    }
}
