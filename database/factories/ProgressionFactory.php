<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progression>
 */
class ProgressionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->word(),
            'poids' => $this->faker->numberBetween(50, 120),
            'weight' => $this->faker->numberBetween(50, 120),
            'height' => $this->faker->numberBetween(150, 200),
            'chest_Measurement' => $this->faker->numberBetween(80, 120),
            'biceps_Measurement' => $this->faker->numberBetween(25, 50),
            'waist_Measurement' => $this->faker->numberBetween(60, 100),
            'hip_Measurement' => $this->faker->numberBetween(80, 120),
            'squat' => $this->faker->numberBetween(50, 300),
            'deadlift' => $this->faker->numberBetween(50, 400),
            'pushUp' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['non terminer', 'terminer']),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}
