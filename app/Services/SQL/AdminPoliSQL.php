<?php

namespace App\Services\SQL;

use App\Models\Poli;
use Illuminate\Support\Facades\DB;

class AdminPoliSQL
{
    public function getPoliData()
    {
        return Poli::select([
            'polis.id',
            'polis.nama',
            DB::raw('COUNT(pivot_polis_users.id) as user_count')
        ])
        ->leftJoin('pivot_polis_users', 'polis.id', '=', 'pivot_polis_users.id_poli')
        ->groupBy('polis.id', 'polis.nama')
        ->get();
    }
}
