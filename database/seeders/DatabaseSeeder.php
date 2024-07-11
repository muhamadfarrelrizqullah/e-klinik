<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DivisiSeeder::class);
        $this->call(PoliSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PengajuanSeeder::class);
        $this->call(PivotPoliUserSeeder::class);
    }
}
