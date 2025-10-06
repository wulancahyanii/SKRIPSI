@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Tombol Tambah --}}
            <div class="mb-4 text-start">
                <a href="{{ route('kriteria.create') }}" 
                   class="btn fw-semibold shadow-sm"
                   style="
                       background-color: #007bff; 
                       color: white; 
                       border-radius: 10px; 
                       font-size: 1rem; 
                       padding: 10px 28px; 
                       transition: 0.3s;
                   "
                   onmouseover="this.style.backgroundColor='#0056b3'"
                   onmouseout="this.style.backgroundColor='#007bff'">
                   + Tambah Kriteria
                </a>
            </div>

            {{-- Card Tabel --}}
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle mx-auto"
                               style="
                                   width: 95%; 
                                   font-size: 1rem; 
                                   background-color: #ffffff; 
                                   border: 2px solid #000; 
                                   border-collapse: collapse;
                               ">
                            <thead style="background-color: #f1f3f5; font-weight: 600;">
                                <tr style="border: 2px solid #000;">
                                    <th style="width: 15%; border: 2px solid #000;">Kode</th>
                                    <th style="width: 35%; border: 2px solid #000;">Nama Kriteria</th>
                                    <th style="width: 20%; border: 2px solid #000;">Bobot</th>
                                    <th style="width: 30%; border: 2px solid #000;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kriterias as $kriteria)
                                    <tr style="border: 2px solid #000;">
                                        <td style="border: 2px solid #000;">{{ $kriteria->kode }}</td>
                                        <td style="border: 2px solid #000;">{{ $kriteria->nama }}</td>
                                        <td style="border: 2px solid #000;">{{ $kriteria->bobot }}</td>
                                        <td style="border: 2px solid #000;">

                                            {{-- Tombol Aksi sejajar --}}
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                               <td style="border: 2px solid #000; vertical-align: middle;">
    <div style="
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        height: 100%;
    ">

        {{-- Tombol Edit --}}
        <a href="{{ route('kriteria.edit', $kriteria->id) }}" 
            class="fw-semibold shadow-sm text-decoration-none"
            style="
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background-color: #FDCB58; 
                color: #000; 
                padding: 5px 12px; 
                border-radius: 6px; 
                font-size: 0.85rem; 
                font-weight: 600;
                height: 32px;
                transition: all 0.3s ease;
                border: none;
            "
            onmouseover="this.style.backgroundColor='#e3b94f'"
            onmouseout="this.style.backgroundColor='#FDCB58'">
            <i class="bi bi-pencil-square me-1"></i>Edit
        </a>

        {{-- Tombol Hapus --}}
        <form action="{{ route('kriteria.destroy', $kriteria->id) }}" 
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus kriteria ini?')"
              style="margin: 0; padding: 0; display: inline-flex; align-items: center;">
            @csrf
            @method('DELETE')
            <button type="submit" 
                class="fw-semibold shadow-sm"
                style="
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #ff4d4f; 
                    color: white; 
                    padding: 5px 12px; 
                    border-radius: 6px; 
                    font-size: 0.85rem; 
                    font-weight: 600;
                    height: 32px;
                    border: none;
                    transition: all 0.3s ease;
                "
                onmouseover="this.style.backgroundColor='#d9363e'"
                onmouseout="this.style.backgroundColor='#ff4d4f'">
                <i class="bi bi-trash3 me-1"></i>Hapus
            </button>
        </form>
    </div>
</td>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-muted py-3">Belum ada data kriteria</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
