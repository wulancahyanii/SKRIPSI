@extends('layouts.app')

@section('content')
<div class="flex justify-center items-start py-10 px-4 bg-gray-50 min-h-screen">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-md p-8">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Peserta</h2>

        <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
         @csrf

            <!-- Nama Lengkap -->
            <div>
                <label for="nama" class="block text-base font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500" 
                       placeholder="Masukkan nama lengkap" required>
            </div>

            <!-- Asal Sekolah -->
            <div>
                <label for="asal_sekolah" class="block text-base font-medium text-gray-700">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500" 
                       placeholder="Masukkan asal sekolah" required>
            </div>

            <!-- Tempat, tanggal lahir / Kecamatan / Jenis kelamin -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="ttl" class="block text-base font-medium text-gray-700">Tempat, Tanggal Lahir</label>
                    <input type="text" name="ttl" id="ttl" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500" 
                           placeholder="Masukkan tempat, tanggal lahir">
                </div>
                <div>
                    <label for="kecamatan" class="block text-base font-medium text-gray-700">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Pilih Kecamatan</option>
                        <option value="Bengkalis">Bengkalis</option>
                        <option value="Mandau">Mandau</option>
                        <option value="Bukit batu">Bukit batu</option>
                        <option value="Siak kecil">Siak kecil</option>
                        <option value="Bathin Solapan">Bathin Solapan</option>
                        <option value="Bantan">Bantan</option>
                        <option value="Rupat">Rupat</option>
                        <option value="Rupat Utara">Rupat Utara</option>
                        <option value="Bandar Laksamana">Bandar Laksamana</option>
                        <option value="Pinggir">Pinggir</option>
                        <option value="Talang Muandau">Talang Muandau</option>
                        <option value="Umum">Umum</option>
                    </select>
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-base font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- Alamat + No HP -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="alamat" class="block text-base font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="alamat" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500" 
                           placeholder="Masukkan alamat">
                </div>
                <div>
                    <label for="no_hp" class="block text-base font-medium text-gray-700">No Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-10 px-3 text-base focus:border-indigo-500 focus:ring-indigo-500" 
                           placeholder="08xxxxxxx">
                </div>
            </div>

            <!-- Upload Foto -->
            <div>
                <label for="foto" class="block text-base font-medium text-gray-700">Unggah Foto</label>
                <input type="file" name="foto" id="foto" 
                       class="mt-1 block w-full text-base text-gray-500 file:mr-4 file:py-2 file:px-4 
                              file:rounded-md file:border-0
                              file:text-base file:font-semibold
                              file:bg-indigo-50 file:text-indigo-600
                              hover:file:bg-indigo-100"/>
            </div>

            <!-- Tombol -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full md:w-auto px-6 py-2 rounded-md bg-indigo-600 text-white font-medium text-base hover:bg-indigo-700">
                    Tambah
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
