<?php

namespace Database\Seeders;

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

         $user = User::factory()->create();

         Meal::factory(10)->create();
    }
}
