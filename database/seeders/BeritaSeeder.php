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
                'judul' => 'Berita Pertama',
                'deskripsi' => 'Deskripsi singkat berita pertama.',
                'isi' => 'Ini adalah isi lengkap berita pertama.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Berita Kedua',
                'deskripsi' => 'Deskripsi singkat berita kedua.',
                'isi' => 'Ini adalah isi lengkap berita kedua.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Berita Ketiga',
                'deskripsi' => 'Deskripsi singkat berita ketiga.',
                'isi' => 'Ini adalah isi lengkap berita ketiga.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
