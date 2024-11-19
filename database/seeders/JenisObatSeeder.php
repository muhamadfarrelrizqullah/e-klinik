<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_obats')->insert([
            [
                'nama' => 'Tablet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kapsul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Syrup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
