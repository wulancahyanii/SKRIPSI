<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Cek apakah tabel 'peserta' ada (tanpa 's')
        if (Schema::hasTable('peserta')) {
            Schema::table('peserta', function (Blueprint $table) {
                if (!Schema::hasColumn('peserta', 'asal_sekolah')) {
                    $table->string('asal_sekolah')->nullable();
                }
            });
        }
        // Jika tabel 'pesertas' ada (dengan 's')
        elseif (Schema::hasTable('pesertas')) {
            Schema::table('pesertas', function (Blueprint $table) {
                if (!Schema::hasColumn('pesertas', 'asal_sekolah')) {
                    $table->string('asal_sekolah')->nullable();
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('peserta') && Schema::hasColumn('peserta', 'asal_sekolah')) {
            Schema::table('peserta', function (Blueprint $table) {
                $table->dropColumn('asal_sekolah');
            });
        } elseif (Schema::hasTable('pesertas') && Schema::hasColumn('pesertas', 'asal_sekolah')) {
            Schema::table('pesertas', function (Blueprint $table) {
                $table->dropColumn('asal_sekolah');
            });
        }
    }
};