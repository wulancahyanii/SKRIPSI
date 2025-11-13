@extends('layouts.app')

@section('content')
<div class="main-content bg-white min-h-screen p-10">
    <div class="max-w-5xl mx-auto">

        {{-- Card Form --}}
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200">

            <div class="p-10">
                <form action="{{ route('peserta.update', $peserta->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Data Pribadi --}}
                    <h3 class="text-xl font-semibold text-[#1e3a5f] mb-4 border-b pb-2 flex items-center gap-2">👤 Data Pribadi</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" value="{{ old('nama', $peserta->nama) }}" class="w-full border-2 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="font-medium text-gray-700">Asal Sekolah / Instansi <span class="text-red-500">*</span></label>
                            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $peserta->asal_sekolah) }}" class="w-full border-2 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:border-blue-400">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="font-medium text-gray-700">Tempat, Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="ttl" value="{{ old('ttl', $peserta->ttl) }}" placeholder="Contoh: Bengkalis, 10 Januari 2003" class="w-full border-2 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:border-blue-400">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border-2 rounded-lg px-4 py-2">
                                <option value="Laki-laki" {{ $peserta->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $peserta->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="font-medium text-gray-700">Kecamatan</label>
                            <select name="kecamatan" class="w-full border-2 rounded-lg px-4 py-2">
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
                    </div>

                    {{-- Alamat & No HP --}}
                    <div class="mb-6">
                        <label class="font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" class="w-full border-2 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:border-blue-400">{{ old('alamat', $peserta->alamat) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="font-medium text-gray-700">No HP / WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}" class="w-full border-2 rounded-lg px-4 py-2">
                    </div>

                    {{-- Foto --}}
                    <div class="mb-6">
                        <label class="font-medium text-gray-700">Foto Peserta</label>
                        @if($peserta->foto)
                            <div class="mb-3">
                                <img src="{{ asset('storage/'.$peserta->foto) }}" alt="Foto Peserta" class="h-28 rounded shadow">
                            </div>
                        @endif
                        <input type="file" name="foto" class="w-full border-2 rounded-lg px-4 py-2">
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-4 pt-6 border-t">
                        <a href="{{ route('peserta.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">← Batal</a>
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">💾 Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
