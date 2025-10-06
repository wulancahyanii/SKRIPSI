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
    Schema::create('pesertas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('asal_sekolah');
        $table->string('ttl')->nullable(); // tempat tanggal lahir
        $table->string('kecamatan')->nullable();
        $table->string('jenis_kelamin')->nullable();
        $table->text('alamat')->nullable();
        $table->string('no_hp')->nullable();
        $table->string('foto')->nullable(); // simpan path foto
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
