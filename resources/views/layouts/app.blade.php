<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian Bujang Dara</title>
    @vite('resources/css/app.css') {{-- Tailwind --}}
</head>
<body class="flex bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-950 text-white min-h-screen p-4">
        <div class="mb-8 flex items-center space-x-3">
            <!-- Logo Kabupaten Bengkalis -->
            <img src="{{ asset('images/logokabupatenbks.jpeg') }}" 
                 alt="Logo Bengkalis" 
                 class="w-12 h-12">
            
            <!-- Judul -->
            <h1 class="text-lg font-bold leading-tight">
                Bujang Dara <br>Kabupaten Bengkalis
            </h1>
        </div>
        <nav class="space-y-2">
    <a href="{{ route('dashboard') }}" 
       class="block px-3 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-blue-800 text-white' : 'hover:bg-blue-900' }}">
        Dashboard
    </a>

    <a href="{{ route('peserta.index') }}" 
       class="block px-3 py-2 rounded {{ request()->routeIs('peserta.*') ? 'bg-blue-800 text-white' : 'hover:bg-blue-900' }}">
        Daftar Peserta
    </a>

    <a href="{{ route('kriteria.index') }}" 
       class="block px-3 py-2 rounded {{ request()->routeIs('kriteria.*') ? 'bg-blue-800 text-white' : 'hover:bg-blue-900' }}">
        Kriteria
    </a>

    <a href="{{ route('penilaian.index') }}" 
       class="block px-3 py-2 rounded {{ request()->routeIs('penilaian.*') ? 'bg-blue-800 text-white' : 'hover:bg-blue-900' }}">
        Penilaian
    </a>

    <a href="{{ route('hasil.index') }}" 
       class="block px-3 py-2 rounded {{ request()->routeIs('hasil.*') ? 'bg-blue-800 text-white' : 'hover:bg-blue-900' }}">
        Hasil
    </a>

    <a href="#" 
       class="block px-3 py-2 rounded hover:bg-blue-900">
        Laporan
    </a>
</nav>

    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">
                Selamat datang di Sistem Penilaian Bujang Dara Kabupaten Bengkalis
            </h2>
            <button class="bg-blue-950 text-white px-4 py-2 rounded hover:bg-blue-900">
                Log out
            </button>
        </div>

        @yield('content')
    </main>

</body>
</html>
