<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MealsSeeder;
use Database\Seeders\WorkoutSeeder;
use Database\Seeders\ExercisesSeeder;
use Database\Seeders\DailyMealsSeeder;
use Database\Seeders\WorkoutExerciseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            MealsSeeder::class,
            DailyMealsSeeder::class,
            ExercisesSeeder::class,
            WorkoutSeeder::class,
            WorkoutExerciseSeeder::class

        ]);
    }
}
