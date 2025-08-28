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
        Schema::create('measurements', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relates to users
    $table->float('weight')->nullable(); // User's weight in kg/lb
    $table->float('waist_circumference')->nullable(); // Waist circumference in cm/inch
    $table->float('hip_circumference')->nullable(); // Hip circumference in cm/inch
    $table->float('chest_circumference')->nullable(); // Chest circumference in cm/inch
    $table->float('shoulder_circumference')->nullable(); // Shoulder circumference in cm/inch
    $table->float('thigh_circumference')->nullable(); // Thigh circumference in cm/inch
    $table->float('height')->nullable(); // User's height in cm/inch
    $table->float('body_fat_percentage')->nullable(); // Body fat percentage
    $table->date('date'); // Date the measurement was taken
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
