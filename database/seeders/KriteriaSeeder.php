<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ⬅️ ini wajib ditambahkan

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriterias')->insert([
            ['nama_kriteria' => 'Penampilan', 'bobot' => 0.3],
            ['nama_kriteria' => 'Wawasan', 'bobot' => 0.25],
            ['nama_kriteria' => 'Kepribadian', 'bobot' => 0.25],
            ['nama_kriteria' => 'Komunikasi', 'bobot' => 0.2],
        ]);
    }
}
