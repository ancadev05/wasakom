<?php

namespace Database\Seeders;

use App\Models\Costumer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $costumers = [
            [
                'nama' => 'Hamzah',
                'alamat' => 'Galesong',
                'no_wa' => 111,
                'foto_ktp' => 'ktp.jpg',
            ],
            [
                'nama' => 'Anca',
                'alamat' => 'Bontoreya',
                'no_wa' => 222,
                'foto_ktp' => 'ktp.jpg',
            ],
            [
                'nama' => 'Kono',
                'alamat' => 'Makassar',
                'no_wa' => 222,
                'foto_ktp' => 'ktp.jpg',
            ],
        ];

        foreach ($costumers as $key => $value) {
            Costumer::create($value);
        }
    }
}
