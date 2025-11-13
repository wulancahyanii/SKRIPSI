@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #f5f5f5;
    }
    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    .profile-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #4a90e2 100%);
        padding: 30px;
        text-align: center;
        color: white;
    }
    .profile-header h2 {
        font-size: 28px;
        margin-bottom: 5px;
    }
    .profile-header p {
        font-size: 16px;
        opacity: 0.9;
    }
    .profile-body {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 40px;
        padding: 40px;
    }
    .photo-container {
        width: 280px;
        height: 380px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        margin-bottom: 20px;
    }
    .photo-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-primary {
        background-color: #0d6efd;
        color: white;
    }
    .btn-primary:hover {
        background-color: #0b5ed7;
    }
    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }
    .detail-group {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 12px;
        border-left: 4px solid #4a90e2;
        margin-bottom: 20px;
    }
    .detail-group h3 {
        color: #1e3a5f;
        font-size: 18px;
        margin-bottom: 20px;
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 10px;
    }
    .detail-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }
    .detail-row:last-child {
        border-bottom: none;
    }
    .detail-label {
        font-weight: 600;
        color: #495057;
    }
    .detail-value {
        color: #212529;
    }
    @media (max-width: 968px) {
        .profile-body {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="profile-card">
        {{-- Header --}}
        <div class="profile-header">
            <h2>{{ $peserta->nama_lengkap }}</h2>
        </div>

```
    {{-- Body --}}
    <div class="profile-body">
        {{-- Foto --}}
        <div class="text-center">
            <div class="photo-container">
                @if($peserta->foto)
                    <img src="{{ asset('storage/' . $peserta->foto) }}" alt="Foto Peserta">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height:100%;font-weight:500;">Tidak ada foto</div>
                @endif
            </div>
            <div class="action-buttons">
                <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-primary">✏️ Edit</a>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </div>

        {{-- Detail --}}
        <div>
            <div class="detail-group">
                <h3>📋 Data Pribadi</h3>
                <div class="detail-row"><div class="detail-label">Nama Panggilan</div><div class="detail-value">{{ $peserta->nama_panggilan }}</div></div>
                <div class="detail-row"><div class="detail-label">Tempat, Tanggal Lahir</div><div class="detail-value">{{ $peserta->ttl }}</div></div>
                <div class="detail-row"><div class="detail-label">Jenis Kelamin</div><div class="detail-value">{{ $peserta->jenis_kelamin }}</div></div>
                <div class="detail-row"><div class="detail-label">Kecamatan</div><div class="detail-value">{{ $peserta->kecamatan }}</div></div>
                <div class="detail-row"><div class="detail-label">Alamat</div><div class="detail-value">{{ $peserta->alamat }}</div></div>
                <div class="detail-row"><div class="detail-label">No HP</div><div class="detail-value">{{ $peserta->no_hp }}</div></div>
            </div>

            <div class="detail-group">
                <h3>📏 Data Fisik</h3>
                <div class="detail-row"><div class="detail-label">Tinggi / Berat Badan</div><div class="detail-value">{{ $peserta->tinggi_badan }} cm / {{ $peserta->berat_badan }} kg</div></div>
            </div>

            <div class="detail-group">
                <h3>🎓 Pendidikan & Lainnya</h3>
                <div class="detail-row"><div class="detail-label">Pendidikan</div><div class="detail-value">{{ $peserta->pendidikan }}</div></div>
                <div class="detail-row"><div class="detail-label">Instansi</div><div class="detail-value">{{ $peserta->instansi }}</div></div>
                <div class="detail-row"><div class="detail-label">Hobi</div><div class="detail-value">{{ $peserta->hobi }}</div></div>
                <div class="detail-row"><div class="detail-label">Keterampilan</div><div class="detail-value">{{ $peserta->keterampilan }}</div></div>
                <div class="detail-row"><div class="detail-label">Organisasi</div><div class="detail-value">{{ $peserta->organisasi }}</div></div>
                <div class="detail-row"><div class="detail-label">Alasan</div><div class="detail-value">{{ $peserta->alasan }}</div></div>
                <div class="detail-row"><div class="detail-label">Harapan</div><div class="detail-value">{{ $peserta->harapan }}</div></div>
            </div>
        </div>
    </div>
</div>
```

</div>
@endsection
