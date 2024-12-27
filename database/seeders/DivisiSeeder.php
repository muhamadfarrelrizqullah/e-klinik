<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisis')->insert([
            ['nama' => 'Akuntansi',],
            ['nama' => 'Desain',],
            ['nama' => 'Human Capital Management',],
            ['nama' => 'Kapal Niaga',],
            ['nama' => 'Kapal Perang',],
            ['nama' => 'Kapal Selam',],
            ['nama' => 'Kawasan & K3LH',],
            ['nama' => 'Legal',],
            ['nama' => 'Manajemen Risiko',],
            ['nama' => 'Office of The Board',],
            ['nama' => 'Pemasaran & Penjualan Kapal',],
            ['nama' => 'Pemeliharaan & Perbaikan',],
            ['nama' => 'Penjualan Rekayasa Umum, Pemeliharaan, & Perbaikan',],
            ['nama' => 'Perbendaharaan',],
            ['nama' => 'Perencanaan Strategis Perusahaan',],
            ['nama' => 'Production Management Office',],
            ['nama' => 'Rekayasa Umum',],
            ['nama' => 'Supply Chain',],
            ['nama' => 'Technology & Quality Assurance',],
            ['nama' => 'Teknologi Informasi',],
            ['nama' => 'Satuan Pengawasan Intern',],
            ['nama' => 'Sekretaris Perusahaan',],
            ['nama' => 'Tim Pembangunan Infrastruktur Fasilitas Kapal Selam PMN APBN TA 2021'],
        ]);
    }
}
