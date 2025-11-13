@extends('layouts.juri')

@section('content')
<h2 class="text-2xl font-bold mb-6">Dashboard Juri</h2>

<div class="grid grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-gray-600">Total Peserta</h3>
        <p class="text-3xl font-bold text-blue-700">{{ $totalPeserta }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-gray-600">Sudah Dinilai</h3>
        <p class="text-3xl font-bold text-green-600">{{ $sudahDinilai }}</p>
    </div>
</div>
@endsection
