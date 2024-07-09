<?php

namespace App\Services\SQL;

use App\Models\Divisi;

class AdminDivisiSQL
{
    public function getDivisiData()
    {
        return Divisi::select(['id', 'nama'])
            ->get();;
    }
}
