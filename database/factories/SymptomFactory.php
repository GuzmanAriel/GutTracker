<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SymptomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'overall_symptom' => rand(0, 2),
            'fatigue_symptom' => rand(0, 10),
            'discomfort_symptom' => rand(0, 10),
            'brain_symptom' => rand(0, 10),
            'bloating_symptom' => rand(0, 10),
            'abdominal_symptom' => rand(0, 3),
            'user_id' => User::factory(),
        ];
    }
}
