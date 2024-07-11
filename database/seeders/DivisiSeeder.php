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
            [
                'nama' => 'IT',
            ],
            [
                'nama' => 'Akutansi',
            ],
            [
                'nama' => 'HR',
            ],
            [
                'nama' => 'Marketing',
            ],
            [
                'nama' => 'Operations',
            ],
        ]);
        
    }
}
