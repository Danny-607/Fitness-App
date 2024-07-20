<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function create(){
        $exercises = auth()->user()->exercises;
        return Inertia::render('Workouts/Create', [
            'exercises' => $exercises,
        ]);
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'exercise_ids' => 'required',
        ]);
        $name = $data['name'];
        $exercises = $data['exercise_ids'];
        foreach ($exercises as $exercise_id) {
            auth()->user()->workouts()->create([
                'name' => $name,
                'exercise_id' => $exercise_id,
            ]);
        }

        return redirect()->route('dashboard');
    }
}
