@extends('layouts.app')

@section('content')
<div class="p-6">
    {{-- Header + Action Button --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Peserta</h2>
        <div class="flex space-x-2">
            <a href="#"
               class="text-sm text-blue-600 border border-blue-600 px-4 py-2 rounded-md hover:bg-blue-50 transition">
                Export CSV
            </a>
            <a href="{{ route('peserta.create') }}"
               class="text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Tambah Peserta
            </a>
        </div>
    </div>

    {{-- Filter + Search --}}
    <div class="flex items-center space-x-2 mb-4">
        <div class="relative">
            <button class="border px-3 py-2 rounded-md text-sm text-gray-600 flex items-center">
                Add filter
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>
        <div class="flex-1">
            <input type="text" placeholder="Search..."
                   class="w-full border px-3 py-2 rounded-md text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
    </div>

    {{-- Tabel Peserta --}}
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        @if($pesertas->count() > 0)
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Asal Sekolah</th>
                        <th class="px-4 py-3 border">TTL</th>
                        <th class="px-4 py-3 border">Kecamatan</th>
                        <th class="px-4 py-3 border">Jenis Kelamin</th>
                        <th class="px-4 py-3 border">Alamat</th>
                        <th class="px-4 py-3 border">No HP</th>
                        <th class="px-4 py-3 border">Foto</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesertas as $index => $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $p->nama }}</td>
                            <td class="px-4 py-2 border">{{ $p->asal_sekolah }}</td>
                            <td class="px-4 py-2 border">{{ $p->ttl }}</td>
                            <td class="px-4 py-2 border">{{ $p->kecamatan }}</td>
                            <td class="px-4 py-2 border">{{ $p->jenis_kelamin }}</td>
                            <td class="px-4 py-2 border">{{ $p->alamat }}</td>
                            <td class="px-4 py-2 border">{{ $p->no_hp }}</td>
                            <td class="px-4 py-2 border text-center">
                                @if($p->foto)
                                    <img src="{{ asset('storage/'.$p->foto) }}" alt="Foto Peserta" class="h-12 mx-auto">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('peserta.edit', $p->id) }}"
                                   class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">Edit</a>
                                <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin hapus data ini?')"
                                            class="text-red-600 hover:text-red-800 text-sm font-medium ml-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-10 text-center text-gray-500 text-lg">
                Belum Ada Peserta
            </div>
        @endif
    </div>
</div>
@endsection
