<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('measurements', function (Blueprint $table) {
            $table->float('muscle_mass')->nullable()->after('body_fat_percentage');
        });
    }

    public function down()
    {
        Schema::table('measurements', function (Blueprint $table) {
            $table->dropColumn('muscle_mass');
        });
    }
}; 