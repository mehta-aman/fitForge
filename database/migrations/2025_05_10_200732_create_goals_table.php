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
        Schema::create('goals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relates to users
    $table->string('goal_type'); // Type of goal, e.g., 'weight_loss', 'strength', etc.
    $table->float('target_value'); // Target value to achieve, e.g., weight, reps, etc.
    $table->date('target_date'); // Target date to achieve the goal
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
