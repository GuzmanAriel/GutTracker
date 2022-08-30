<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OverallSymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'overall_symptom_time' => now()->subDays(rand(1, 7)),
            'overall_symptom' => rand(0, 6),
            'user_id' => User::factory(),
        ];
    }
}
