<?php

namespace Database\Seeders;

use App\Models\LaptopStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptop_status = [
           ['status' => 'Display'],
           ['status' => 'Penyewaan'],
           ['status' => 'Pengecekan'],
           ['status' => 'Baru Masuk'],
           ['status' => 'Dipenyewaan'],
           ['status' => 'Terjual'],
           ['status' => 'Bangkai']
        ];

        foreach ($laptop_status as $key => $value) {
            LaptopStatus::create($value);
        }
    }
}
