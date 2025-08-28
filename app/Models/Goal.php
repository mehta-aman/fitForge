<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal_type',
        'target_value',
        'target_date',
    ];

    // Relationship: A goal belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
