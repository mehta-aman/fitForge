<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'weight',
        'waist_circumference',
        'hip_circumference',
        'chest_circumference',
        'shoulder_circumference',
        'thigh_circumference',
        'height',
        'body_fat_percentage',
        'muscle_mass',
        'date',
    ];

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
