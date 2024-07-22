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
                'tipe' => 'ROG',
                'gambar_1' => 'rog2.png',
                'harga' => 1000000,
                'user_id' => '1',
            ],
            [
                'laptop_merek_id' => 2,
                'tipe' => 'Thinkpad T480',
                'gambar_1' => 'thinkpad.png',
                'harga' => 2000000,
                'user_id' => '1',
            ],
            [
                'laptop_merek_id' => 3,
                'tipe' => 'Travelmate',
                'gambar_1' => 'travelmate.png',
                'harga' => 3000000,
                'user_id' => '1',
            ],
            [
                'laptop_merek_id' => 4,
                'tipe' => 'Probook',
                'gambar_1' => 'probook.png',
                'harga' => 4000000,
                'user_id' => '1',
            ],
            [
                'laptop_merek_id' => 5,
                'tipe' => 'MacBook Pro',
                'gambar_1' => 'macbook.png',
                'harga' => 5000000,
                'user_id' => '1',
            ]
        ];

        foreach ($laptop_tipe as $key => $value) {
            LaptopTipe::create($value);
        }
    }
}
