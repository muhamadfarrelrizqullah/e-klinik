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
                'jenis_obat' => 'Tablet',
                'satuan' => 'Box',
                'qty' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Amoxicillin',
                'jenis_obat' => 'Kapsul',
                'satuan' => 'Strip',
                'qty' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Vitamin C',
                'jenis_obat' => 'Tablet',
                'satuan' => 'Botol',
                'qty' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ibuprofen',
                'jenis_obat' => 'Tablet',
                'satuan' => 'Box',
                'qty' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Cough Syrup',
                'jenis_obat' => 'Syrup',
                'satuan' => 'Botol',
                'qty' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
