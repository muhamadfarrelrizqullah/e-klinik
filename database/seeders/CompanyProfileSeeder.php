<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProfile::create([
            'main_page_header' => 'Welcome to Our Company',
            'main_page_title' => 'Innovating for a Better Future',
            'second_page_header' => 'Our Vision and Mission',
            'second_page_title' => 'Guiding Principles for Growth',
            'second_page_desc' => 'We aim to lead with innovation, ensuring sustainable solutions that positively impact our stakeholders and the world at large.',
            'third_page_header' => 'Our Achievements',
            'third_page_title' => 'Making a Difference Globally',
            'third_page_desc' => 'From groundbreaking projects to community impact, our achievements reflect our commitment to excellence and responsibility.',
        ]);
    }
}
