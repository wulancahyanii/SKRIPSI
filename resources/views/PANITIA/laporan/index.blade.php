@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center space-x-2">
        <span>📊</span>
        <span>Laporan Rekap Penilaian</span>
    </h2>

    <!-- Tombol Export PDF -->
    <div class="mb-6">
        <a href="{{ route('laporan.exportPdf') }}" 
           class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 4v16m8-8H4"/>
            </svg>
            Export PDF
        </a>
    </div>

    <!-- Card Tabel -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="px-6 py-3 text-center font-semibold">No</th>
                        <th class="px-6 py-3 font-semibold">Nama Peserta</th>
                        <th class="px-6 py-3 font-semibold text-center">Total Nilai</th>
                        <th class="px-6 py-3 font-semibold text-center">Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekap as $data)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $data['peserta'] }}</td>
                            <td class="px-6 py-3 text-center font-medium text-gray-800">{{ $data['total_nilai'] }}</td>
                            <td class="px-6 py-3 text-center">{{ $data['rata_rata'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">
                                Belum ada data penilaian
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
