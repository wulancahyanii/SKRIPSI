@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Peserta</h2>

    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block text-sm">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $peserta->nama) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Asal Sekolah --}}
        <div>
            <label class="block text-sm">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $peserta->asal_sekolah) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- TTL --}}
        <div>
            <label class="block text-sm">Tempat, Tanggal Lahir</label>
            <input type="text" name="ttl" value="{{ old('ttl', $peserta->ttl) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Kecamatan --}}
<div>
    <label class="block text-sm">Kecamatan</label>
    <select name="kecamatan" class="w-full border rounded px-3 py-2">
        <option value="">-- Pilih Kecamatan --</option>
        <option value="Bengkalis" {{ $peserta->kecamatan == 'Bengkalis' ? 'selected' : '' }}>Bengkalis</option>
        <option value="Bantan" {{ $peserta->kecamatan == 'Bantan' ? 'selected' : '' }}>Bantan</option>
        <option value="Mandau" {{ $peserta->kecamatan == 'Mandau' ? 'selected' : '' }}>Mandau</option>
        <option value="Pinggir" {{ $peserta->kecamatan == 'Pinggir' ? 'selected' : '' }}>Pinggir</option>
        <option value="Rupat" {{ $peserta->kecamatan == 'Rupat' ? 'selected' : '' }}>Rupat</option>
        <option value="Rupat Utara" {{ $peserta->kecamatan == 'Rupat Utara' ? 'selected' : '' }}>Rupat Utara</option>
        <option value="Siak Kecil" {{ $peserta->kecamatan == 'Siak Kecil' ? 'selected' : '' }}>Siak Kecil</option>
        <option value="Bukit Batu" {{ $peserta->kecamatan == 'Bukit Batu' ? 'selected' : '' }}>Bukit Batu</option>
        <option value="Bandar Laksamana" {{ $peserta->kecamatan == 'Bandar Laksamana' ? 'selected' : '' }}>Bandar Laksamana</option>
    </select>
</div>


        {{-- Jenis Kelamin --}}
        <div>
            <label class="block text-sm">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border rounded px-3 py-2">
                <option value="Laki-laki" {{ $peserta->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $peserta->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block text-sm">Alamat</label>
            <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ old('alamat', $peserta->alamat) }}</textarea>
        </div>

        {{-- No HP --}}
        <div>
            <label class="block text-sm">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Foto --}}
        <div>
            <label class="block text-sm">Foto</label>
            @if($peserta->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$peserta->foto) }}" alt="Foto Peserta" class="h-24 rounded">
                </div>
            @endif
            <input type="file" name="foto" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('peserta.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
