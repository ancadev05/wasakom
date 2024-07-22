<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Laptop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            LevelAkunSeeder::class,
            UserSedeer::class,
            LaptopMerekSeeder::class,
            LaptopTipeSeeder::class,
            LaptopStatusSeeder::class,
            LaptopKondisiSeeder::class,
        ]);

        Laptop::factory(200)->create();
    }
}
