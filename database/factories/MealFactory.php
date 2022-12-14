<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meal_time' => now()->subDays(rand(1, 7)),
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
        ];
    }
}
