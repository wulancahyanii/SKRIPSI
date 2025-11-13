@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f7fa;
    }

    .edit-container {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 40px 50px;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .edit-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .edit-header h1 {
        color: #2a5298;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .edit-header p {
        color: #6c757d;
        font-size: 15px;
    }

    .form-label {
        font-weight: 600;
        color: #1e3c72;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 15px;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 35px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102,126,234,0.4);
    }

    .btn-secondary {
        background: white;
        border: 2px solid #667eea;
        color: #667eea;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #f0f2ff;
    }
</style>

<div class="edit-container">

    <form action="{{ route('juri.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" 
                   value="{{ old('nama', $user->nama) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password Baru (Opsional)</label>
            <input type="password" name="password" class="form-control"
                   placeholder="Kosongkan jika tidak ingin mengganti password">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
        </div>

        <div class="btn-group">
            <a href="{{ route('juri.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
