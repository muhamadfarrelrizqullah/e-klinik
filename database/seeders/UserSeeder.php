<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nip' => '11111111',
                'nama' => 'Syahidan',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Admin',
                'divisi_id' => 1,
                'tanggal_lahir' => '1990-01-01',
                'tinggi_badan' => 180.5,
                'berat_badan' => 75.3,
            ],
            [
                'nip' => '22222222',
                'nama' => 'Rifat Smith',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Dokter',
                'divisi_id' => 2,
                'tanggal_lahir' => '1985-05-15',
                'tinggi_badan' => 165.4,
                'berat_badan' => 60.2,
            ],
            [
                'nip' => '33333333',
                'nama' => 'Farrrel',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1985-05-15',
                'tinggi_badan' => 165.4,
                'berat_badan' => 60.2,
            ],
        ]);
    }
}
