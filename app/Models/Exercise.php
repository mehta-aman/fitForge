<?php

 namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'muscle_group',
        'secondary_muscle_group',
        'equipment',
        'difficulty',
        'duration',
        'description',
        'media_url',
        'is_active',
        'external_id',
    ];

    // Relationships
    public function workoutExercises()
    {
        return $this->hasMany(WorkoutExercise::class);
    }
}
