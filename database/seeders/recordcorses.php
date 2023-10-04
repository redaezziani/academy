<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class recordcorses extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recordcourses')->insert([
            'name' => 'البرمجة',
            'img' => '',
            // Add more columns and values as needed
        ],);
    }
}
