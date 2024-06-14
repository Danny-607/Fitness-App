<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workouts = [
            [
                'name' => 'Chest Day',
                'user_id' => 1,
                'exercise_id' => 1, // Assuming exercise_id 1 corresponds to Bench Press
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Leg Day',
                'user_id' => 1,
                'exercise_id' => 2, // Assuming exercise_id 2 corresponds to Squats
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Back Day',
                'user_id' => 1,
                'exercise_id' => 3, // Assuming exercise_id 3 corresponds to Deadlift
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Arm Day',
                'user_id' => 1,
                'exercise_id' => 4, // Assuming exercise_id 4 corresponds to Bicep Curl
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tricep Day',
                'user_id' => 1,
                'exercise_id' => 5, // Assuming exercise_id 5 corresponds to Tricep Dips
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('workouts')->insert($workouts);
    }
}
