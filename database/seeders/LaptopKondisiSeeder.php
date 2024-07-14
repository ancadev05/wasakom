<?php

namespace Database\Seeders;

use App\Models\LaptopKondisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopKondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptop_kondisi = [
            ['kondisi' => 'Normal'],
            ['kondisi' => 'Minus']
        ];

        foreach ($laptop_kondisi as $key => $value) {
            LaptopKondisi::create($value);
        }
    }
}
