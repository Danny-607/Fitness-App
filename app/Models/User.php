<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Meal;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\DailyMeal;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'weight',
        'height',
        'gender',
        'activity_level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function dailyMeals()
    {
        return $this->hasMany(DailyMeal::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }
}
