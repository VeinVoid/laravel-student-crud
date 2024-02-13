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
            'id_kelas' => $this->faker->randomDigit(),
            'NIS' => $this->faker->randomNumber(5, true),
            'name' => $this->faker->name(),
            'tahun_lahir' => $this->faker->dateTimeBetween('-20 years', 'now')->format('Y-m-d'),
            'alamat' => $this->faker->address(),
            'image' => $this->faker->sentence(40),
            'quotes' => $this->faker->sentence(40),
        ];
    }
}
