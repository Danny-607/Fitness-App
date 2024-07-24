<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Inertia\Inertia;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function create(){
        $user = auth()->user();
        return Inertia::render('Meals/Create', [
            'meal' => [
                'name' => '',
                'calories' => '',
                'protein' => '',
                'carbohydrates' => '',
                'fat' => '',
                'sugar' => '',
            ],
            'user' => $user
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'calories' => ['required', 'numeric'],
            'protein' => ['required', 'numeric'],
            'carbohydrates' => ['required', 'numeric'],
            'fat' => ['required', 'numeric'],
            'sugar' => ['required', 'numeric'],
        ]);
        $request->user()->meals()->create($validatedData);
        return redirect()->route('dashboard');
    }
}
