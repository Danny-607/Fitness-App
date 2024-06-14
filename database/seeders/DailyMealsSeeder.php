<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DailyMealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dailyMeals = [
            [
                'meal_id' => 1, // Assuming meal_id 1 corresponds to Chicken Breast
                'user_id' => 1,
                'date' => Carbon::today()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => 2, // Assuming meal_id 2 corresponds to Steamed Broccoli
                'user_id' => 1,
                'date' => Carbon::today()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => 3, // Assuming meal_id 3 corresponds to Brown Rice
                'user_id' => 1,
                'date' => Carbon::today()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => 4, // Assuming meal_id 4 corresponds to Grilled Salmon
                'user_id' => 1,
                'date' => Carbon::today()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meal_id' => 5, // Assuming meal_id 5 corresponds to Greek Yogurt
                'user_id' => 1,
                'date' => Carbon::today()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('daily_meals')->insert($dailyMeals);
    }
}
