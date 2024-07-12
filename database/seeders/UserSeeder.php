<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 't@t.com',
                'password' => bcrypt('password'),
                'gender' => '1',
                'date_of_birth' => '1990-01-01',
                'height' => '67',
                'weight' => '183',
                'activity_level' => 'light',
            ]
        ];

        DB::table('users')->insert($users);
    }
}
