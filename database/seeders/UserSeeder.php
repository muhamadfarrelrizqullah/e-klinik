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
                'nama' => 'Admin 1',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Admin',
                'divisi_id' => 1,
                'tanggal_lahir' => '1990-01-01',
                'tinggi_badan' => 180,
                'berat_badan' => 75,
            ],
            [
                'nip' => '22222222',
                'nama' => 'Rifat Smith',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Dokter',
                'divisi_id' => 2,
                'tanggal_lahir' => '1985-05-15',
                'tinggi_badan' => 165,
                'berat_badan' => 60,
            ],
            [
                'nip' => '33333333',
                'nama' => 'Farrel',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1985-05-15',
                'tinggi_badan' => 165,
                'berat_badan' => 60,
            ],
            [
                'nip' => '44444444',
                'nama' => 'Admin 2',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Admin',
                'divisi_id' => 1,
                'tanggal_lahir' => '1969-01-01',
                'tinggi_badan' => 150,
                'berat_badan' => 45,
            ],
            [
                'nip' => '12345678',
                'nama' => 'Makow',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1982-05-15',
                'tinggi_badan' => 175,
                'berat_badan' => 68,
            ],
            [
                'nip' => '87654321',
                'nama' => 'Tedi',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1945-05-15',
                'tinggi_badan' => 115,
                'berat_badan' => 64,
            ],
            [
                'nip' => '12121212',
                'nama' => 'Jija',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1265-02-15',
                'tinggi_badan' => 195,
                'berat_badan' => 62,
            ],
            [
                'nip' => '21212121',
                'nama' => 'Tutut',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1995-05-15',
                'tinggi_badan' => 155,
                'berat_badan' => 60,
            ],
            [
                'nip' => '12344321',
                'nama' => 'Yoges',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Dokter',
                'divisi_id' => 2,
                'tanggal_lahir' => '2005-01-15',
                'tinggi_badan' => 175,
                'berat_badan' => 80,
            ],
            [
                'nip' => '43211234',
                'nama' => 'Samiaji',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Dokter',
                'divisi_id' => 2,
                'tanggal_lahir' => '2001-02-15',
                'tinggi_badan' => 165,
                'berat_badan' => 60,
            ],
            [
                'nip' => '56788765',
                'nama' => 'Ricadino',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1956-09-15',
                'tinggi_badan' => 188,
                'berat_badan' => 60,
            ],
            [
                'nip' => '09900990',
                'nama' => 'Bimbimbab',
                'password' => Hash::make('password123'),
                'status' => 'Aktif',
                'role' => 'Pasien',
                'divisi_id' => 2,
                'tanggal_lahir' => '1915-05-15',
                'tinggi_badan' => 185,
                'berat_badan' => 69,
            ],
        ]);
    }
}
