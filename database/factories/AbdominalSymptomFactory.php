<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbdominalSymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'abdominal_symptom_time' => now()->subDays(rand(1, 7)),
            'abdominal_symptom' => rand(0, 3),
            'user_id' => User::factory(),
        ];
    }
}
