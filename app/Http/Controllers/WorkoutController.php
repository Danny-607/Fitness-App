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
            'exercise_id' => 'required',
        ]);
        auth()->user()->workouts()->create($data);

        return redirect()->route('dashboard');
    }
}
