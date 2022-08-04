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
            'meal_time' => $this->faker->dateTime,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
        ];
    }
}
