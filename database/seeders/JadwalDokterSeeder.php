<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal_dokters')->insert([
            [
                'id_dokter'  => 2, 
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
            ],
            [
                'id_dokter'  => 2,  
                'hari' => 'Senin',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '17:00:00',
            ],
            [
                'id_dokter'  => 9,  
                'hari' => 'Senin',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '11:00:00',
            ],
            [
                'id_dokter'  => 10, 
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
            ],
            [
                'id_dokter'  => 10, 
                'hari' => 'Rabu',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '12:00:00',
            ],
            [
                'id_dokter'  => 10, 
                'hari' => 'Rabu',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '17:00:00',
            ],
        ]);
    }
}
