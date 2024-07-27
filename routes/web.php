<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DailymealsController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/meals/create' , [MealController::class, 'create'])->name('meals.create');
    Route::post('/meals', [MealController::class, 'store'])->name('meals.store');
    Route::get('exercises/create', [ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('exercises', [ExerciseController::class, 'store'])->name('exercises.store');
    Route::get('workouts/dashboard', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('workouts/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::get('workouts/{id}', [WorkoutController::class, 'show'])->name('workouts.show');
    Route::post('workouts', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::post('dailymeals', [DailymealsController::class, 'store'])->name('dailymeals.store');
});

require __DIR__.'/auth.php';
