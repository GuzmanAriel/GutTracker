<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FatigueSymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fatigue_symptom_time' => now()->subDays(rand(1, 7)),
            'fatigue_symptom' => rand(0, 10),
            'user_id' => User::factory(),
        ];
    }
}
