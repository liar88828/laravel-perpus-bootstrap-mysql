<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ISBN' => $this->faker->randomLetter(),
            'judul' => $this->faker->title(),
            'pegarang' => $this->faker->name(),
            'penerbit' => $this->faker->company(),
            'tahun' => $this->faker->date(),
            'jumlah' => $this->faker->numerify(),
            'kategori' => $this->faker->sentences(),
            'tipe' => $this->faker->streetName(),
        ];
    }
}
