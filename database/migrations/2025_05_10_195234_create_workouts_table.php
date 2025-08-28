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
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->date('date');
            $table->time('duration')->nullable(); // New
            $table->enum('intensity', ['low', 'medium', 'high'])->nullable(); // New
            $table->integer('calories_burned')->nullable(); // New
            $table->boolean('is_completed')->default(false); // New
            $table->string('location')->nullable(); // New
            $table->enum('mood', ['energized', 'tired', 'neutral'])->nullable(); // New
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
