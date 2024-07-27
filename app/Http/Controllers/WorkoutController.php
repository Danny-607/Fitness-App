<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index(){
        $user = auth()->user();
        $workouts = Workout::with('exercises')->get();

        return Inertia::render('Workouts/Index', [
            'user' => $user,
            'workouts' => $workouts
        ]);
    }
    public function create(){
        $exercises = auth()->user()->exercises;
        $user = auth()->user();
        return Inertia::render('Workouts/Create', [
            'exercises' => $exercises,
            'user' => $user
        ]);
    }
    public function show($id){
        $workout = Workout::with('exercises')->find($id);
        $user = auth()->user();
        return Inertia::render('Workouts/Show', [
            'workout' => $workout,
            'user' => $user
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
