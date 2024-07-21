<?php

namespace Database\Seeders;

use App\Models\LevelAkun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level_akuns = [
            [
                'level' => 'Super Admin'
            ],
            [
                'level' => 'GM'
            ],
            [
                'level' => 'HRD'
            ],
            [
                'level' => 'Admin'
            ],
            [
                'level' => 'FO'
            ],
            [
                'level' => 'Teknisi'
            ],
        ];

        foreach ($level_akuns as $key => $value) {
            LevelAkun::create($value);
        }
    }
}
