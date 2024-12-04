<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PivotPoliUser;

class PivotPoliUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PivotPoliUser::create([
            'id_dokter' => 2,
            'id_poli' => 1
        ]);

        PivotPoliUser::create([
            'id_dokter' => 2,
            'id_poli' => 2
        ]);

        PivotPoliUser::create([
            'id_dokter' => 2,
            'id_poli' => 3
        ]);

        PivotPoliUser::create([
            'id_dokter' => 2,
            'id_poli' => 4
        ]);

        PivotPoliUser::create([
            'id_dokter' => 9,
            'id_poli' => 2
        ]);

        PivotPoliUser::create([
            'id_dokter' => 10,
            'id_poli' => 2
        ]);


    }
}
