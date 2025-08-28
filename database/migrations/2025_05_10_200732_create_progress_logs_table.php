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
        Schema::create('progress_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relates to users
    $table->foreignId('workout_exercise_id')->constrained()->onDelete('cascade'); // Relates to specific workout-exercise
    $table->date('date'); // Date of progress log
    $table->integer('sets_completed')->nullable(); // Number of sets completed
    $table->integer('reps_completed')->nullable(); // Number of reps completed per set
    $table->float('weight_lifted')->nullable(); // Weight lifted during the exercise
    $table->float('calories_burned')->nullable(); // Calories burned during the exercise
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_logs');
    }
};
