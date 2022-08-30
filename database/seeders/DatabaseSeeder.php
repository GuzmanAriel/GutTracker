<?php

namespace Database\Seeders;

use App\Models\AbdominalSymptom;
use App\Models\BloatingSymptom;
use App\Models\BrainSymptom;
use App\Models\DiscomfortSymptom;
use App\Models\FatigueSymptom;
use App\Models\OverallSymptom;
use App\Models\Stool;
use App\Models\User;
use App\Models\Meal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
             'name' => 'Ariel Guzman',
             'email' => 'guzmanariel525@gmail.com',
             'password' => 'Knicks1991!'
         ]);

         Meal::create([
             'meal_time' => now()->subDays(rand(1, 7)),
             'description' => 'Sweet Potato Salad',
             'user_id' => 1,
         ]);

        Meal::create([
            'meal_time' => now()->subDays(rand(1, 7)),
            'description' => 'Ramen',
            'user_id' => 1,
        ]);

        Meal::create([
            'meal_time' => now()->subDays(rand(1, 7)),
            'description' => 'Cod Fish and rice',
            'user_id' => 1,
        ]);

        Stool::create([
            'stool_time' => now()->subDays(rand(1, 7)),
            'stool_symptom' => rand(0, 6),
            'user_id' => 1
        ]);

        Stool::create([
            'stool_time' => now()->subDays(rand(1, 7)),
            'stool_symptom' => rand(0, 6),
            'user_id' => 1
        ]);


        OverallSymptom::create([
            'overall_symptom_time' => now()->subDays(rand(1, 7)),
            'overall_symptom' => rand(0, 2),
            'user_id' => 1,
        ]);

        OverallSymptom::create([
            'overall_symptom_time' => now()->subDays(rand(1, 7)),
            'overall_symptom' => rand(0, 2),
            'user_id' => 1,
        ]);

        AbdominalSymptom::create([
            'abdominal_symptom_time' => now()->subDays(rand(1, 7)),
            'abdominal_symptom' => rand(0, 3),
            'user_id' => 1,
        ]);

        AbdominalSymptom::create([
            'abdominal_symptom_time' => now()->subDays(rand(1, 7)),
            'abdominal_symptom' => rand(0, 3),
            'user_id' => 1,
        ]);

        BloatingSymptom::create([
            'bloating_symptom_time' => now()->subDays(rand(1, 7)),
            'bloating_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

        BloatingSymptom::create([
            'bloating_symptom_time' => now()->subDays(rand(1, 7)),
            'bloating_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

        BrainSymptom::create([
            'brain_symptom_time' => now()->subDays(rand(1, 7)),
            'brain_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

        DiscomfortSymptom::create([
            'discomfort_symptom_time' => now()->subDays(rand(1, 7)),
            'discomfort_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

        DiscomfortSymptom::create([
            'discomfort_symptom_time' => now()->subDays(rand(1, 7)),
            'discomfort_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

        FatigueSymptom::create([
            'fatigue_symptom_time' => now()->subDays(rand(1, 7)),
            'fatigue_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

        FatigueSymptom::create([
            'fatigue_symptom_time' => now()->subDays(rand(1, 7)),
            'fatigue_symptom' => rand(0, 10),
            'user_id' => 1,
        ]);

    }
}
