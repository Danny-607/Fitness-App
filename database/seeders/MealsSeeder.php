<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meals = [
            [
                'name' => 'Bolognese Pasta',
                'calories' => 165,
                'protein' => 31,
                'carbohydrates' => 0,
                'fat' => 4,
                'sugar' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chicken And Rice',
                'calories' => 55,
                'protein' => 4,
                'carbohydrates' => 11,
                'fat' => 1,
                'sugar' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Beef Stir Fry',
                'calories' => 215,
                'protein' => 5,
                'carbohydrates' => 45,
                'fat' => 2,
                'sugar' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sweet and sour beef',
                'calories' => 233,
                'protein' => 25,
                'carbohydrates' => 0,
                'fat' => 14,
                'sugar' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Greek Yogurt',
                'calories' => 100,
                'protein' => 10,
                'carbohydrates' => 5,
                'fat' => 4,
                'sugar' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('meals')->insert($meals);
    }
}
