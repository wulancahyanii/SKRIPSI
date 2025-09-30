@extends('layouts.app')

@section('content')
    <!-- Intro card -->
    <div class="bg-gradient-to-r from-purple-100 to-blue-100 p-6 rounded-2xl shadow-md mb-8">
        <p class="text-gray-700 leading-relaxed">
            Platform ini dirancang untuk memudahkan <span class="font-semibold">pengelolaan data peserta</span>,
            monitoring proses penilaian, serta menyajikan informasi terkini terkait kegiatan
            <span class="font-semibold">Bujang Dara di Kabupaten Bengkalis</span>.
            <br><br>
            Mari bersama-sama kita dorong generasi muda untuk tampil percaya diri, berprestasi,
            dan berkontribusi positif bagi pembangunan daerah.
        </p>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
            <div class="flex items-center">
                <div class="bg-purple-500 text-white p-4 rounded-xl mr-4">
                    <i class="ph-duotone ph-users-three text-2xl"></i>
                </div>
                <div>
                    <p class="text-gray-500">Total Peserta</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $totalPeserta }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
            <div class="flex items-center">
                <div class="bg-blue-500 text-white p-4 rounded-xl mr-4">
                    <i class="ph-duotone ph-trophy text-2xl"></i>
                </div>
                <div>
                    <p class="text-gray-500">Kriteria Penilaian</p>
                    <h3 class="text-3xl font-bold text-gray-800">5</h3>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
            <div class="flex items-center">
                <div class="bg-green-500 text-white p-4 rounded-xl mr-4">
                    <i class="ph-duotone ph-medal text-2xl"></i>
                </div>
                <div>
                    <p class="text-gray-500">Juara Terpilih</p>
                    <h3 class="text-3xl font-bold text-gray-800">0</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
