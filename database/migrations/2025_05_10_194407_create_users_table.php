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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'user'])->default('user');

            // Health and profile info
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->float('height')->nullable(); // in cm
            $table->float('weight')->nullable(); // in kg
            $table->string('activity_level')->nullable(); // e.g., sedentary, active
            $table->text('health_conditions')->nullable(); // e.g., diabetes, asthma
            $table->enum('goals', ['lose weight', 'gain weight', 'gain muscle', 'strength'])->nullable(); // fixed

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
