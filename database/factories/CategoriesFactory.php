<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'category_name' => $this->faker->unique()->randomElement(['feature', 'issue', 'bug', 'urgent'])
            // Got infinite loop error running this, because not sure at which iteration all values will be inserted. So, wrote manual insertion at the seeder file.
        ];
    }
}
