<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reps',
        'rest',
        'sets',
        'weight'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workout()
    {
        return $this->belongsToMany(Workout::class)->withPivot('reps', 'rest', 'sets', 'weight');
    }
}
