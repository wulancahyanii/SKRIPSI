<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->unsignedBigInteger('juri_id')->after('id');
            $table->foreign('juri_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropForeign(['juri_id']);
            $table->dropColumn('juri_id');
        });
    }
};