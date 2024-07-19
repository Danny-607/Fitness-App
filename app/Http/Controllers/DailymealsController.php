<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DailymealsController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'meal_id' => 'required|integer',
        ]);
        $user->dailyMeals()->create([
            'meal_id' => $validated['meal_id'],
            'user_id' => $user->id,
            'date' => now(),
        ]);
        return redirect()->back();
    }
}
