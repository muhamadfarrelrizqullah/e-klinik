<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('pengajuans')->insert([
        [
            'id_pasien' => 3,
            'id_dokter' => 2,
            'keluhan' => 'Keluhan Lapar',
            'status' => 'Pending',
            'tanggal_pengajuan' => Carbon::now()->subDays(3),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(2),
            'qrcode' => 'example-qrcode-1',
            'status_qrcode' => 'aktif',
            'catatan' => 'Catatan contoh 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 4,
            'id_dokter' => 10,
            'keluhan' => 'Keluhan Pegel',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-2',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 7,
            'id_dokter' => 11,
            'keluhan' => 'Keluhan Ngelu',
            'status' => 'Pending',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-2',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id_pasien' => 6,
            'id_dokter' => 12,
            'keluhan' => 'Keluhan Kanker',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-2',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id_pasien' => 5,
            'id_dokter' => 12,
            'keluhan' => 'Keluhan Liver',
            'status' => 'Pending',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-2',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ]);
}
}