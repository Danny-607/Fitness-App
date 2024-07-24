<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        return Inertia::render('Exercises/Create', [
            'exercise' => [
                'name' => '',
                'reps' => '',
                'sets' => '',
                'rest' => '',
                'weight' => '',
            ],
            'user' => $user
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'reps' => ['required', 'integer'],
            'sets' => ['required', 'integer'],
            'rest' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
        ]);

        $request->user()->exercises()->create($request->all());

        return redirect()->route('dashboard');
    }
}
