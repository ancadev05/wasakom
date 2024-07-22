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
                'merek' => 'Asus',
                'user_id' => '1'
            ],
            [
                'merek' => 'Lenovo',
                'user_id' => '1'
            ],
            [
                'merek' => 'Acer',
                'user_id' => '1'
            ],
            [
                'merek' => 'HP',
                'user_id' => '1'
            ],
            [
                'merek' => 'Dell',
                'user_id' => '1'
            ],
            [
                'merek' => 'Mac',
                'user_id' => '1'
            ]
        ];

        foreach ($laptop_merek as $key => $value) {
            LaptopMerek::create($value);
        }
    }
}
