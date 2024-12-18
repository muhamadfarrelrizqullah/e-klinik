<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beritas')->insert([
            [
                'judul' => 'Piala AFF 2024: Andai ke Semifinal, Indonesia Potensi Lawan Thailand',
                'deskripsi' => 'Jakarta - Thailand sudah mengunci tiket ke semifinal Piala AFF 2024 dari Grup A.',
                'isi' => 'Jakarta - Thailand sudah mengunci tiket ke semifinal Piala AFF 2024 dari Grup A. Timnas Indonesia berpotensi bertemu War Elephants andai ke fase gugur. Thailand masih sempurna di fase grup dengan mengemas sembilan poin. Hal ini membuat Thailand mengunci status juara grup meski masih punya satu pertandingan lagi.',
                'cover' => 'human_vs_computer.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Permintaan Maaf Ibu Lady Usai Sopirnya Aniaya Luthfi',
                'deskripsi' => 'Palembang - Ibu Lady, berinisial SM menyampaikan permintaan maafnya kepada Muhammad Luthfi Hadyhan (22) atas penganiayaan yang dilakukan sopirnya.',
                'isi' => 'Palembang - Ibu Lady, berinisial SM menyampaikan permintaan maafnya kepada Muhammad Luthfi Hadyhan (22) atas penganiayaan yang dilakukan sopirnya, Fadilah alias Datuk (37). Permintaan maaf disampaikan usai SM menjalani pemeriksaan polisi. "Saya atas nama pribadi dan keluarga meminta maaf sebesar-sebesarnya kepada ananda Luthfi dan orang tua, atas kejadian pemukulan yang dilakukan oleh sopir saya," kata SM singkat, Senin (16/12/2024). Sedangkan Lady usai dilakukan pemeriksaan menghindari para awak media dengan keluar melalui pintu belakang dan langsung masuk ke dalam mobil.',
                'cover' => 'human_vs_computer.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Jokowi Sebut Waktu Akan Menguji Usai Dipecat, PDIP Bilang Begini',
                'deskripsi' => 'Jakarta - Ketua DPP PDI Perjuangan Deddy Sitorus membalas pernyataan Presiden RI ke-7 Joko Widodo (Jokowi) terkait waktu yang akan menguji usai dipecat oleh partai.',
                'isi' => 'Jakarta - Ketua DPP PDI Perjuangan Deddy Sitorus membalas pernyataan Presiden RI ke-7 Joko Widodo (Jokowi) terkait waktu yang akan menguji usai dipecat oleh partai. Deddy menilai Jokowi sudah terbukti tidak memiliki kesetiaan kepada partai. "Apanya yang mau diuji? Beliau sudah diuji oleh waktu dan terbukti beliau tidak punya kesetiaan dan rela menghalalkan segala cara untuk mencapai tujuan-tujuan politiknya," kata Deddy kepada wartawan, Selasa (17/12/2024).',
                'cover' => 'human_vs_computer.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
