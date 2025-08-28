<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streak extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'streaks';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'days_streak',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
