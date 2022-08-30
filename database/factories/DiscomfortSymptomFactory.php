<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscomfortSymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'discomfort_symptom_time' => now()->subDays(rand(1, 7)),
            'discomfort_symptom' => rand(0, 10),
            'user_id' => User::factory(),
        ];
    }
}
