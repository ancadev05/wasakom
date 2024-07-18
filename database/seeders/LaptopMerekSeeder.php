<?php

namespace Database\Seeders;

use App\Models\LaptopMerek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopMerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptop_merek = [
            [
                'merek' => 'ASUS'
            ],
            [
                'merek' => 'LENOVO'
            ],
            [
                'merek' => 'ACER'
            ],
            [
                'merek' => 'HP'
            ],
            [
                'merek' => 'DELL'
            ],
            [
                'merek' => 'MAC'
            ]
        ];

        foreach ($laptop_merek as $key => $value) {
            LaptopMerek::create($value);
        }
    }


}
