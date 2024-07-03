<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name,
            'kategori' => fake()->name,
            'harga' => fake()->randomNumber(5, true),
            'stok' => fake()->randomNumber(5, true),
            'penyedia' => 'PT.' . fake()->name,
            'kadaluarsa' => fake()->date(),
            'keterangan' => fake()->sentence()
        ];
    }
}
