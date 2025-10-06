@extends('layouts.auth')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100" style="background: #f4f7fe;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 380px;">
        <div class="card-body p-5">

            {{-- Judul --}}
            <h3 class="text-center mb-4 fw-bold text-primary">Sistem Penilaian<br><span class="text-dark">Bujang Dara Kabupaten Bengkalis</span></h3>

            {{-- Pesan Error --}}
            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form Login --}}
            <form action="{{ route('login.post') }}" method="POST">

                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control rounded-3 border-2" placeholder="Masukkan email..." required autofocus>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control rounded-3 border-2" placeholder="Masukkan password..." required>
                </div>

                {{-- Tombol Login --}}
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary fw-semibold py-2 rounded-3">Masuk</button>
                </div>

                {{-- Link Daftar (opsional) --}}
                <p class="text-center mt-3 text-muted">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">Daftar</a>
                </p>
            </form>

        </div>
    </div>
</div>
@endsection
