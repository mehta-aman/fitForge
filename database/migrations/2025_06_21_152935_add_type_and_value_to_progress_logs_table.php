<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('progress_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('progress_logs', 'type')) {
                $table->string('type')->after('user_id');
            }
            if (!Schema::hasColumn('progress_logs', 'value')) {
                $table->string('value')->after('type');
            }
            if (!Schema::hasColumn('progress_logs', 'log_date')) {
                $table->timestamp('log_date')->after('value')->nullable();
            }
        });
        // Make workout_exercise_id nullable if not already
        if (Schema::hasColumn('progress_logs', 'workout_exercise_id')) {
            DB::statement('ALTER TABLE progress_logs MODIFY workout_exercise_id BIGINT UNSIGNED NULL');
        }
        // Drop 'date' column if it exists
        if (Schema::hasColumn('progress_logs', 'date')) {
            Schema::table('progress_logs', function (Blueprint $table) {
                $table->dropColumn('date');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progress_logs', function (Blueprint $table) {
            $table->dropColumn(['type', 'value', 'log_date']);
            $table->foreignId('workout_exercise_id')->nullable(false)->change();
            $table->date('date');
        });
    }
};
