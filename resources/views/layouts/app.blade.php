<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian Bujang Dara</title>
    @vite('resources/css/app.css') {{-- Tailwind --}}
</head>
<body class="flex bg-gray-50">

    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-blue-950 via-blue-900 to-blue-950 text-white min-h-screen shadow-2xl">
        <!-- Header Sidebar -->
        <div class="p-6 border-b border-blue-800/50">
            <div class="flex items-center space-x-4">
                <!-- Logo dengan border elegant -->
                <div class="flex-shrink-0">
                    <div class="w-14 h-14 rounded-xl bg-white/10 backdrop-blur-sm p-1.5 ring-2 ring-white/20">
                        <img src="{{ asset('images/logokabupatenbks.jpeg') }}" 
                             alt="Logo Bengkalis" 
                             class="w-full h-full rounded-lg object-cover">
                    </div>
                </div>
                
                <!-- Judul -->
                <div>
                    <h1 class="text-base font-bold text-white leading-tight">
                        Bujang Dara
                    </h1>
                    <p class="text-xs text-blue-200 mt-0.5">
                        Kabupaten Bengkalis
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-1.5">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-lg ring-1 ring-white/20' : 'text-blue-100 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('peserta.index') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('peserta.*') ? 'bg-white/10 text-white shadow-lg ring-1 ring-white/20' : 'text-blue-100 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span class="font-medium">Daftar Peserta</span>
            </a>

            <a href="{{ route('kriteria.index') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('kriteria.*') ? 'bg-white/10 text-white shadow-lg ring-1 ring-white/20' : 'text-blue-100 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
                <span class="font-medium">Kriteria</span>
            </a>

            <a href="{{ route('juri.index') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('juri.*') ? 'bg-white/10 text-white shadow-lg ring-1 ring-white/20' : 'text-blue-100 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span class="font-medium">Daftar Akun Juri</span>
            </a>

            <a href="{{ route('laporan.index') }}" 
               class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200 text-blue-100 hover:bg-white/5 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="font-medium">Laporan</span>
            </a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Sistem Penilaian Bujang Dara Kabupaten Bengkalis
                </h2>
            </div>
            <button class="flex items-center space-x-2 bg-gradient-to-r from-blue-950 to-blue-900 text-white px-5 py-2.5 rounded-xl hover:shadow-lg transition-all duration-200 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Log out</span>
            </button>
        </div>

        @yield('content')
    </main>

</body>
</html>