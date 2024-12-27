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
        DB::table('pivot_polis_users')->insert([
            [
                'id_dokter'  => '3',
                'id_poli' => '1',
            ],
            [
                'id_dokter'  => '2',
                'id_poli' => '2',
            ],

        ]);
    }
}
