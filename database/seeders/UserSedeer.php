<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => "Hamzah",
                'username' => '1',
                'password' => 1,
                'sandi' => 1,
                'no_wa' => 1111,
                'level_akun_id' => 1
            ],
            [
                'name' => "Resky",
                'username' => 're123',
                'password' => 123,
                'sandi' => 123,
                'no_wa' => 222,
                'level_akun_id' => 6
            ],
            [
                'name' => "Abdi",
                'username' => 'ab123',
                'password' => 123,
                'sandi' => 123,
                'no_wa' => 333,
                'level_akun_id' => 5
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
