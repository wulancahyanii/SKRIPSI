<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Juri - Bujang Dara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-3xl font-bold text-center text-blue-900 mb-6">Form Penilaian Juri</h1>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('penilaian.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
            @csrf

            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-2">Pilih Peserta</label>
                <select name="peserta_id" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Pilih Peserta --</option>
                    @foreach ($pesertas as $peserta)
                        <option value="{{ $peserta->id }}">{{ $peserta->nama }}</option>
                    @endforeach
                </select>
            </div>

            <table class="w-full border border-gray-300 rounded-lg mb-6">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="py-2 px-4 text-left">Kriteria</th>
                        <th class="py-2 px-4 text-left">Bobot</th>
                        <th class="py-2 px-4 text-left">Nilai (0-100)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $kriteria)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $kriteria->nama }}</td>
                            <td class="py-2 px-4">{{ $kriteria->bobot }}%</td>
                            <td class="py-2 px-4">
                                <input type="number" name="nilai[{{ $kriteria->id }}]" class="border border-gray-300 rounded p-2 w-28" min="0" max="100" required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center">
                <a href="{{ route('juri.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="text-red-600 font-semibold hover:underline">Logout</a>
                <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition">Simpan Penilaian</button>
            </div>
        </form>

        <form id="logout-form" action="{{ route('juri.logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</body>
</html>
