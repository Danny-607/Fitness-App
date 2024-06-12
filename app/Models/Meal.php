<?php

namespace App\Models;

use App\Models\User;
use App\Models\DailyMeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'protein',
        'carbohydrates',
        'fat',
        'sugar',
    ];

    public function dailyMeals()
    {
        return $this->hasMany(DailyMeal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
