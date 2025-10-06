@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: #f4f7fe; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            {{-- Card Form --}}
            <div class="card border-0 shadow-lg rounded-4">

                {{-- Body --}}
                <div class="card-body p-5 bg-white">
                    <form action="{{ route('kriteria.store') }}" method="POST">
                        @csrf

                        {{-- Kode Kriteria --}}
                        <div class="mb-4">
                            <label for="kode" class="form-label fw-semibold text-secondary">Kode Kriteria</label>
                            <div class="input-group input-group-lg shadow-sm rounded-3">
                                <span class="input-group-text bg-primary text-white border-0 rounded-start-3">
                                    <i class="bi bi-upc-scan"></i>
                                </span>
                                <input type="text" name="kode" id="kode" 
                                    class="form-control border-0 rounded-end-3" 
                                    placeholder="isi kode kriteria" required>
                            </div>
                        </div>

                        {{-- Nama Kriteria --}}
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold text-secondary">Nama Kriteria</label>
                            <div class="input-group input-group-lg shadow-sm rounded-3">
                                <span class="input-group-text bg-primary text-white border-0 rounded-start-3">
                                    <i class="bi bi-card-text"></i>
                                </span>
                                <input type="text" name="nama" id="nama" 
                                    class="form-control border-0 rounded-end-3" 
                                    placeholder="isi nama kriteria" required>
                            </div>
                        </div>

                        {{-- Bobot --}}
                        <div class="mb-5">
                            <label for="bobot" class="form-label fw-semibold text-secondary">Bobot</label>
                            <div class="input-group input-group-lg shadow-sm rounded-3">
                                <span class="input-group-text bg-primary text-white border-0 rounded-start-3">
                                    <i class="bi bi-graph-up"></i>
                                </span>
                                <input type="number" name="bobot" id="bobot" step="0.01"
                                    class="form-control border-0 rounded-end-3"
                                    placeholder="isi bobot" required>
                            </div>
                        </div>

                        {{-- Tombol --}}
                            <button type="submit" 
                                class="btn text-white px-5 py-2 fw-semibold rounded-3 shadow-sm"
                                style="background: linear-gradient(135deg, #007bff, #00bfff); border: none; transition: all 0.3s;"
                                onmouseover="this.style.opacity='0.9'"
                                onmouseout="this.style.opacity='1'">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
