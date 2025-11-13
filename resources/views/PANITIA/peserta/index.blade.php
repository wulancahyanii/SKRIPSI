@extends('layouts.app')

@section('content')

<style>
    .header {
        background-color: #ffffff;
        padding: 25px 40px;
        border-bottom: 2px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    .header h1 {
        font-size: 24px;
        color: #1e3a5f;
        font-weight: 600;
    }
    .logout-btn {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.3s;
    }
    .logout-btn:hover {
        background-color: #c82333;
    }
    .content-area {
        padding: 40px;
    }
    .breadcrumb {
        background-color: #f8f9fa;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #666;
    }
    .breadcrumb-item.active {
        color: #1e3a5f;
        font-weight: 500;
    }
    .btn-add {
        background-color: #4a7ad3ff;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 20px;
        transition: background-color 0.3s;
    }
    .btn-add:hover {
        background-color: #213988ff;
    }
    .card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .card-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #4a90e2 100%);
        color: white;
        padding: 20px 30px;
    }
    .card-header h2 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }
    .card-body {
        padding: 30px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    thead {
        background-color: #f8f9fa;
    }
    th {
        padding: 15px 12px;
        text-align: left;
        font-weight: 600;
        color: #1e3a5f;
        border-bottom: 2px solid #dee2e6;
        white-space: nowrap;
    }
    td {
        padding: 15px 12px;
        border-bottom: 1px solid #e9ecef;
        color: #495057;
    }
    tbody tr:hover {
        background-color: #f8f9fa;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }
    .empty-state-icon {
        font-size: 48px;
        margin-bottom: 15px;
        opacity: 0.5;
    }
    .btn-outline-primary, .btn-outline-danger {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        transition: 0.2s;
    }
    .btn-outline-primary {
        border: 1px solid #4a7ad3ff;
        color: #4a7ad3ff;
    }
    .btn-outline-primary:hover {
        background-color: #4a7ad3ff;
        color: white;
    }
    .btn-outline-danger {
        border: 1px solid #dc3545;
        color: #dc3545;
        margin-left: 6px;
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 5px solid #28a745;
    }
</style>

<div class="content-area">

    {{-- Pesan sukses setelah hapus/tambah --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah Peserta --}}
    <a href="{{ route('peserta.create') }}" class="btn-add">+ Tambah Peserta Baru</a>

    {{-- Card Tabel Peserta --}}
    <div class="card">
        <div class="card-header">
            <h2>Daftar Peserta Bujang Dara</h2>
        </div>
        <div class="card-body">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Kecamatan</th>
                            <th>Asal Sekolah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peserta as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->kecamatan }}</td>
                            <td>{{ $p->instansi }}</td>
                            <td>
                                <a href="{{ route('peserta.show', $p->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i> Detail
                                </a>

                                <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus peserta ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-state-icon">📋</div>
                                    <p><strong>Belum ada data peserta</strong></p>
                                    <p>Silakan tambahkan peserta baru menggunakan tombol di atas</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
