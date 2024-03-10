<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'company' => $this->faker->company,
            'location' => $this->faker->city,
            'salary' => $this->faker->numberBetween(1000, 10000),
            'experience' => $this->faker->randomElement(['Entry level', 'Mid-level', 'Senior-level']),
            'category' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),

        ];
    }
}
