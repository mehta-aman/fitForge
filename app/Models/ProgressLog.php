<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workout_exercise_id',
        'type',
        'value',
        'log_date',
        'sets_completed',
        'reps_completed',
        'weight_lifted',
        'calories_burned',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutExercise()
    {
        return $this->belongsTo(WorkoutExercise::class);
    }
}
