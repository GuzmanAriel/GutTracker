<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stool_time' => now()->subDays(rand(1, 7)),
            'stool_symptom' => rand(0, 6),
            'user_id' => User::factory(),
        ];
    }
}
