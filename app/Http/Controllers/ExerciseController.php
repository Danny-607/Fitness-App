<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Workout;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function create()
{
    $user = auth()->user();
    $workouts = $user->workouts;

    return Inertia::render('Exercises/Create', [
        'exercise' => [
            'name' => '',
            'reps' => '',
            'sets' => '',
            'rest' => '',
            'weight' => '',
        ],
        'user' => $user,
        'workouts' => $workouts,
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'workout_id' => 'required|exists:workouts,id',
            'name' => 'required|string|max:255',
            'reps' => 'required|integer',
            'sets' => 'required|integer',
            'rest' => 'required|integer',
            'weight' => 'nullable|integer',
        ]);

        $exercise = Exercise::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        $workout = Workout::findOrFail($request->workout_id);
        $workout->exercises()->attach($exercise->id, [
            'sets' => $request->sets,
            'reps' => $request->reps,
            'rest' => $request->rest,
            'weight' => $request->weight,
        ]);
        return redirect()->route('workouts.index');
    }
}
