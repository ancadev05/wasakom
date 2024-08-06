<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawans = [
            [
                'nama' => 'nama',
                'tempat_lahir' => 'tampat-lahir',
                'tgl_lahir' => '1999-01-01',
                'alamat' => 'alamat',
                'no_wa' => '000',
                'email' => 'email.com',
                'jabatan' => 'jabatan',
                // 'user_id' => '1',
            ],
            [
                'nama' => 'Hamzah',
                'tempat_lahir' => 'Takalar',
                'tgl_lahir' => '1997-07-13',
                'alamat' => 'Galesong',
                'no_wa' => 'Galesong',
                'email' => 'hamzahanca5@gmail.com',
                'jabatan' => 'Teknisi',
                'foto' => 'foto.jpg',
                // 'user_id' => '1',
            ]
        ];

        foreach ($karyawans as $key => $value) {
            Karyawan::create($value);
        }
    }
}
