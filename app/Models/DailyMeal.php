<?php

namespace App\Models;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_id',
        'user_id',
        'date',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
