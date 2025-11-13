<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kriterias', function (Blueprint $table) {
            if (Schema::hasColumn('kriterias', 'tahapan')) {
                $table->dropColumn('tahapan');
            }
        });
    }

    public function down()
    {
        Schema::table('kriterias', function (Blueprint $table) {
            $table->string('tahapan')->nullable();
        });
    }
};
