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
            'id_poli' => 1,
            'keluhan' => 'Pusing',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(3),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(2),
            'qrcode' => 'example-qrcode-1',
            'status_qrcode' => 'aktif',
            'catatan' => 'Catatan contoh 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 5,
            'id_dokter' => 2,
            'id_poli' => 2,
            'keluhan' => 'Mual',
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
            'id_dokter' => 9,
            'id_poli' => 2,
            'keluhan' => 'Sakit perut',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-3',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id_pasien' => 6,
            'id_dokter' => 10,
            'id_poli' => 2,
            'keluhan' => 'Demam',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-4',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'id_pasien' => 5,
            'id_dokter' => 10,
            'id_poli' => 2,
            'keluhan' => 'Liver',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(2),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(3),
            'qrcode' => 'example-qrcode-5',
            'status_qrcode' => 'expired',
            'catatan' => 'Catatan contoh 5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 5,
            'id_dokter' => 9,
            'id_poli' => 2,
            'keluhan' => 'Pusing',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(3),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(2),
            'qrcode' => 'example-qrcode-6',
            'status_qrcode' => 'null',
            'catatan' => 'Catatan contoh 6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 6,
            'id_dokter' => 2,
            'id_poli' => 1,
            'keluhan' => 'Pusing',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(3),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(2),
            'qrcode' => 'example-qrcode-7',
            'status_qrcode' => 'null',
            'catatan' => 'Catatan contoh 7',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 7,
            'id_dokter' => 2,
            'id_poli' => 2,
            'keluhan' => 'Pusing',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(3),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(2),
            'qrcode' => 'example-qrcode-8',
            'status_qrcode' => 'null',
            'catatan' => 'Catatan contoh 8',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id_pasien' => 8,
            'id_dokter' => 9,
            'id_poli' => 2,
            'keluhan' => 'Pusing',
            'status' => 'Diterima',
            'tanggal_pengajuan' => Carbon::now()->subDays(3),
            'tanggal_pemeriksaan' => Carbon::now()->addDays(2),
            'qrcode' => 'example-qrcode-9',
            'status_qrcode' => 'null',
            'catatan' => 'Catatan contoh 9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ]);
}
}
