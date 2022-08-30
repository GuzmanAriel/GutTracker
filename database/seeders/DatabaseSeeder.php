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

         $user = User::factory(2)->create();

         Meal::factory(10)->create();

         Stool::factory(30)->create();

         OverallSymptom::factory(30)->create();

         AbdominalSymptom::factory(30)->create();
         BloatingSymptom::factory(30)->create();
         BrainSymptom::factory(30)->create();
         DiscomfortSymptom::factory(30)->create();
         FatigueSymptom::factory(30)->create();
    }
}
