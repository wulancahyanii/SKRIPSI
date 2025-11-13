<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Juri - Sistem Penilaian Bujang Dara</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-950 text-white h-screen flex flex-col justify-between">
        <div>
            <div class="p-6 text-center border-b border-blue-800">
                <h1 class="text-xl font-bold">Halaman Penilaian Bujang Dara</h1>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="{{ route('juri.dashboard') }}" class="block py-2.5 px-6 hover:bg-blue-800 {{ request()->routeIs('juri.dashboard') ? 'bg-blue-800' : '' }}">
                    🏠 Dashboard
                </a>
                <a href="{{ route('juri.daftar_peserta') }}" class="block py-2.5 px-6 hover:bg-blue-800 {{ request()->routeIs('juri.daftar_peserta') ? 'bg-blue-800' : '' }}">
                    🧑‍🤝‍🧑 Daftar Peserta
                </a>
                <a href="{{ route('juri.riwayat') }}" class="block py-2.5 px-6 hover:bg-blue-800 {{ request()->routeIs('juri.riwayat') ? 'bg-blue-800' : '' }}">
                    📜 Riwayat Penilaian
                </a>
            </nav>
        </div>

        <div class="p-6 border-t border-blue-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2 bg-red-600 hover:bg-red-700 rounded-lg">🚪 Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>
