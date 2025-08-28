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
        Schema::create('exercises', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('category')->nullable();
    $table->string('muscle_group')->nullable();
    $table->string('secondary_muscle_group')->nullable();
    $table->string('equipment')->nullable();
    $table->string('difficulty')->nullable();
    $table->integer('duration')->nullable();
    $table->text('description')->nullable();
    $table->string('media_url')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
