<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => 5,
            // 'category_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'due_date' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['pending', 'progress', 'completed']),
            'thumbnail' => "https://source.unsplash.com/random/1920x1080?sig={$this->faker->unique()->numberBetween(1, 100)}",
        ];
    }
}
