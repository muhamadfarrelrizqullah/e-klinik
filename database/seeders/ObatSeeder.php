<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obats')->insert([
            [
                'nama' => 'Paracetamol',
                'id_jenis' => 1,
                'satuan' => 'Box',
                'qty' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Amoxicillin',
                'id_jenis' => 2,
                'satuan' => 'Strip',
                'qty' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Vitamin C',
                'id_jenis' => 1,
                'satuan' => 'Botol',
                'qty' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ibuprofen',
                'id_jenis' => 1,
                'satuan' => 'Box',
                'qty' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Cough Syrup',
                'id_jenis' => 3,
                'satuan' => 'Botol',
                'qty' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
