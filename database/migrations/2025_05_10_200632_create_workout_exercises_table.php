<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workout_exercises', function (Blueprint $table) {
    $table->id();
    $table->foreignId('workout_id')->constrained()->onDelete('cascade'); // Relates to workouts
    $table->foreignId('exercise_id')->constrained()->onDelete('cascade'); // Relates to exercises
    $table->integer('sets')->nullable(); // Number of sets
    $table->integer('reps')->nullable(); // Number of reps per set
    $table->integer('rest_time')->nullable(); // Rest time between sets in seconds
    $table->float('weight')->nullable(); // Weight used (if applicable) in kg/lb
    $table->integer('duration')->nullable(); // Duration of the exercise in seconds or minutes (optional)
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_exercises');
    }
};
