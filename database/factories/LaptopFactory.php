<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tgl' => $this->faker->date(),
            'sn' => $this->faker->isbn10(),
            'kode_barang' => $this->faker->isbn10(),
            'cpu' => $this->faker->randomElement(['Intel', 'AMD']),
            'gpu' => $this->faker->randomElement(['Nvdia', 'Intel HD', 'AMD']),
            'ram' => $this->faker->randomElement(['4GB-DDR4', '8GB-DDR3', '8GB-DDR4']),
            'storage' => $this->faker->randomElement(['SSD-128GB', 'SSD-256GB', 'SSD-500GB', 'HDD-500GB', 'HDD-1TB']),
            'interfaces_storage' => $this->faker->randomElement(['1', '2']),
            'keterangan' => 'ok semua',
            'laptop_status_id' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7']),
            'laptop_kondisi_id' => $this->faker->randomElement(['1', '2']),
            'laptop_merek_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'laptop_tipe_id' => $this->faker->randomElement(['1', '2', '3', '4', '5'])
        ];
    }
}
