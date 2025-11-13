@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f7fa !important;
        color: #2d3748;
    }

    .content-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
        margin-top: 20px;
    }

    .card-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 24px 28px;
        border-bottom: 1px solid #e2e8f0;
    }

    .card-header-custom h2 {
        font-size: 18px;
        font-weight: 600;
        color: #1a202c;
        margin: 0;
    }

    .add-btn {
        background: #3182ce;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s;
        text-decoration: none;
    }

    .add-btn:hover {
        background: #2c5aa0;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #f7fafc;
    }

    thead th {
        padding: 16px 28px;
        text-align: left;
        color: #4a5568;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #e2e8f0;
    }

    tbody tr {
        border-bottom: 1px solid #e2e8f0;
        transition: background 0.2s;
    }

    tbody tr:hover {
        background: #f7fafc;
    }

    tbody td {
        padding: 20px 28px;
        color: #2d3748;
        font-size: 14px;
    }

    .code-badge {
        background: #edf2f7;
        color: #2d3748;
        padding: 4px 12px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 13px;
        display: inline-block;
    }

    .weight-badge {
        background: #bee3f8;
        color: #2c5aa0;
        padding: 4px 12px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 13px;
        display: inline-block;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        padding: 6px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s;
        background: white;
        text-decoration: none;
    }

    .btn-edit {
        color: #d69e2e;
        border-color: #d69e2e;
    }

    .btn-edit:hover {
        background: #fefcbf;
    }

    .btn-delete {
        color: #e53e3e;
        border-color: #e53e3e;
    }

    .btn-delete:hover {
        background: #fff5f5;
    }
</style>

<div class="container-fluid px-4 py-5">
    <div class="content-card shadow-sm">
        <div class="card-header-custom">
            <h2>Daftar Kriteria</h2>
            <a href="{{ route('kriteria.create') }}" class="add-btn">+ Tambah Kriteria</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kriterias as $kriteria)
                        <tr>
                            <td><span class="code-badge">{{ $kriteria->kode }}</span></td>
                            <td>{{ $kriteria->nama }}</td>
                            <td><span class="weight-badge">{{ $kriteria->bobot }}</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn-action btn-edit">Edit</a>
                                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kriteria ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-secondary">
                                Belum ada data kriteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
