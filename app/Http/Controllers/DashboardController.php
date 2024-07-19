<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use Inertia\Inertia;
use App\Models\Workout;
use Inertia\Controller;
use App\Models\Exercise;
use App\Models\DailyMeal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Change so that only today's meals are sent to the frontend
    public function index(Request $request)
    {
        $user = $request->user();
        $today = Carbon::today();
        $exercises = Exercise::where('user_id', $user->id)->get();
        $dailyMeals = DailyMeal::where('user_id', $user->id)
                               ->whereDate('created_at', $today)
                               ->with('meal')
                               ->get();
        $meals = Meal::where('user_id', $user->id)->get();
        $workouts = Workout::where('user_id', $user->id)->get();


        return Inertia::render('Dashboard', [
            'user' => $user,
            'exercises' => $exercises,
            'dailyMeals' => $dailyMeals,
            'workouts' => $workouts,
            'meals' => $meals,

        ]);
    }


}
