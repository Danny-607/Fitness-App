<?php

namespace Database\Seeders;

use App\Models\Workout;
use App\Models\Exercise;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkoutExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch workouts
        $chestDay = Workout::where('name', 'Chest Day')->first();
        $legDay = Workout::where('name', 'Leg Day')->first();


        // Fetch exercises
        $benchPress = Exercise::where('name', 'Bench Press')->first();
        $squat = Exercise::where('name', 'Squats')->first();

        // Attach exercises to workouts with pivot data
        $chestDay->exercises()->attach($benchPress->id, ['sets' => 3, 'reps' => 12, 'rest' => 60, 'weight' => null]);
        $chestDay->exercises()->attach($squat->id, ['sets' => 4, 'reps' => 10, 'rest' => 90, 'weight' => 50]);
        $legDay->exercises()->attach($squat->id, ['sets' => 4, 'reps' => 10, 'rest' => 90, 'weight' => 50]);
    }
}
