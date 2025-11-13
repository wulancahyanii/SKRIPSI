@extends('layouts.juri')

@section('content')
<h2 class="text-2xl font-bold mb-6">Daftar Peserta</h2>

<table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
    <thead class="bg-blue-900 text-white">
        <tr>
            <th class="py-3 px-4 text-left">No</th>
            <th class="py-3 px-4 text-left">Nama Peserta</th>
            <th class="py-3 px-4 text-left">Asal</th>
            <th class="py-3 px-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $p)
        <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">{{ $loop->iteration }}</td>
            <td class="py-3 px-4">{{ $p->nama }}</td>
            <td class="py-3 px-4">{{ $p->asal }}</td>
            <td class="py-3 px-4">
                <a href="{{ route('juri.nilai', $p->id) }}" 
                   class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">
                   Nilai
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
