<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            [
                'user_id' => 1,
                'name' => 'Bench Press',
                'reps' => 10,
                'sets' => 3,
                'rest' => 60,
                'weight' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Squats',
                'reps' => 12,
                'sets' => 4,
                'rest' => 90,
                'weight' => 150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Deadlift',
                'reps' => 8,
                'sets' => 3,
                'rest' => 120,
                'weight' => 200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Bicep Curl',
                'reps' => 15,
                'sets' => 3,
                'rest' => 45,
                'weight' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Tricep Dips',
                'reps' => 12,
                'sets' => 3,
                'rest' => 60,
                'weight' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('exercises')->insert($exercises);


    }
}
