@extends('layouts.app') {{-- layout sudah punya sidebar --}}
@section('content')
<style>
    body {
        background: #f5f7fa !important;
    }

    .main-content {
        padding: 40px;
        background-color: white;
        min-height: 100vh;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-container {
        max-width: 750px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 25px;
    }

    label {
        font-weight: 600;
        color: #1e3c72;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 14px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .btn {
        padding: 14px 25px;
        border-radius: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.5);
    }

    .btn-secondary {
        background: white;
        color: #667eea;
        border: 2px solid #667eea;
    }

    .btn-secondary:hover {
        background: #f0f2ff;
        transform: translateY(-3px);
    }

    .button-group {
        display: flex;
        gap: 15px;
        margin-top: 40px;
    }
</style>

<div class="main-content">
    <div class="form-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM AKUN JURI --}}
        <form action="{{ route('juri.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>📝 Nama Lengkap <span style="color:red">*</span></label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap juri" required>
            </div>

            <div class="form-group">
                <label>📧 Email <span style="color:red">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="contoh@gmail.com" required>
            </div>

            <div class="form-group">
                <label>🔒 Password <span style="color:red">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <div class="form-group">
                <label>📅 Tahun Penilaian <span style="color:red">*</span></label>
                <input type="number" name="tahun" class="form-control" value="2025" min="2020" max="2030" required>
            </div>

            <div class="button-group">
                <a href="{{ route('juri.index') }}" class="btn btn-secondary">← Kembali</a>
                <button type="submit" class="btn btn-primary"> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
