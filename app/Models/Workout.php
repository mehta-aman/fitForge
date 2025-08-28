<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'date',
        'duration',
        'intensity',
        'calories_burned',
        'is_completed',
        'location',
        'mood',
        'notes',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutExercises()
    {
        return $this->hasMany(WorkoutExercise::class);
    }
}
