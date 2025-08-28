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
        Schema::table('progress_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('progress_logs', 'type')) {
                $table->string('type')->nullable()->after('user_id');
            }
            if (!Schema::hasColumn('progress_logs', 'value')) {
                $table->string('value')->nullable()->after('type');
            }
            if (!Schema::hasColumn('progress_logs', 'log_date')) {
                $table->timestamp('log_date')->nullable()->after('value');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progress_logs', function (Blueprint $table) {
            if (Schema::hasColumn('progress_logs', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('progress_logs', 'value')) {
                $table->dropColumn('value');
            }
            if (Schema::hasColumn('progress_logs', 'log_date')) {
                $table->dropColumn('log_date');
            }
        });
    }
};
