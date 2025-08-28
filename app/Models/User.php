<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'age',
        'gender',
        'height',
        'weight',
        'activity_level',
        'health_conditions',
        'goals',
        'phone',
        'birthdate',
        'username',
        'preferred_language',
        'unit_preference',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships
    public function workouts() {
        return $this->hasMany(Workout::class);
    }

    public function goals() {
        return $this->hasMany(Goal::class);
    }

    public function progressLogs() {
        return $this->hasMany(ProgressLog::class);
    }

    public function reminders() {
        return $this->hasMany(Reminder::class);
    }

    public function streaks() {
        return $this->hasMany(Streak::class);
    }

    public function measurements() {
        return $this->hasMany(Measurement::class);
    }
}
