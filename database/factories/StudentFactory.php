<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kelas' => $this->faker->numberBetween(1, 10),
            'NIS' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->name,
            'role' => $this->faker->randomElement(['leader','vice leader','treasurer','secretary','student']),
            'tahun_lahir' => $this->faker->date('Y-m-d'),
            'alamat' => $this->faker->address,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
