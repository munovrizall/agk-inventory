<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->name(),
            'stok' => fake()->randomNumber(4),
            'satuan_id' => fake()->numberBetween(1, 5),
            'jenis_id' => fake()->numberBetween(1, 5),
        ];
    }
}
