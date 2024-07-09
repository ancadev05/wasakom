<?php

namespace Database\Seeders;

use App\Models\LaptopTipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopTipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptop_tipe = [
            [
                'laptop_merek_id' => 1,
                'tipe' => 'ROG'
            ],
            [
                'laptop_merek_id' => 2,
                'tipe' => 'Thinkpad T480'
            ],
            [
                'laptop_merek_id' => 3,
                'tipe' => 'Travelmate'
            ],
            [
                'laptop_merek_id' => 4,
                'tipe' => 'Probook'
            ],
            [
                'laptop_merek_id' => 5,
                'tipe' => 'MacBook Pro'
            ]
        ];

        foreach ($laptop_tipe as $key => $value) {
            LaptopTipe::create($value);
        }
    }
}
