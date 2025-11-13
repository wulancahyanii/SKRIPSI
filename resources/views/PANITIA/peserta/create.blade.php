@extends('layouts.app')

@section('content')
<style>
    /* ====== STYLE TAMBAHAN ====== */
    body {
        background: linear-gradient(135deg, #f8f8faff 0%, #f7f7f7ff 100%);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .form-wrapper {
        padding: 2rem 0;
    }

    .card-form {
        background: #ffffff;
        border: none;
        border-radius: 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2.5rem 2rem;
        text-align: center;
    }

    .form-header h2 {
        font-weight: 700;
        margin: 0;
        font-size: 1.8rem;
    }

    .form-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
    }

    .form-body {
        padding: 2.5rem;
    }

    .section-title {
        color: #667eea;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 3px solid #667eea;
        display: inline-block;
    }

    .form-section {
        margin-bottom: 2.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-control,
    .form-select {
        background-color: #f8fafc;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        height: 48px;
    }

    textarea.form-control {
        height: auto !important;
        resize: vertical;
        min-height: 100px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        background-color: #ffffff;
        outline: none;
    }

    .form-control::placeholder {
        color: #94a3b8;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 0.875rem 2.5rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-outline-secondary {
        border: 2px solid #e2e8f0;
        color: #64748b;
        padding: 0.875rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #f1f5f9;
        border-color: #cbd5e1;
        color: #475569;
    }

    .section-divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        border: none;
        margin: 2rem 0;
    }

    /* Pastikan semua input memiliki tinggi yang sama */
    .row.g-3 > div {
        display: flex;
        flex-direction: column;
    }

    .row.g-3 .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .row.g-3 .form-control,
    .row.g-3 .form-select {
        flex: 1;
    }
</style>

<div class="form-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">

                <div class="card-form">

                    <!-- Body Form -->
                    <div class="form-body">
                        <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- A. Data Pribadi --}}
                            <div class="form-section">
                                <h5 class="section-title">A. Data Pribadi</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" class="form-control" placeholder="Masukkan nama panggilan">
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Tempat, Tanggal Lahir</label>
                                            <input type="text" name="ttl" class="form-control" placeholder="Contoh: Bengkalis, 14 Oktober 2002">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Bujang">Laki-laki</option>
                                                <option value="Dara">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan kecamatan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Agama</label>
                                            <input type="text" name="agama" class="form-control" placeholder="Masukkan agama">
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Alamat Lengkap</label>
                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap">
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Nomor HP / WhatsApp</label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Tinggi Badan (cm)</label>
                                            <input type="number" name="tinggi_badan" class="form-control" placeholder="170">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Berat Badan (kg)</label>
                                            <input type="number" name="berat_badan" class="form-control" placeholder="60">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            {{-- B. Data Pendidikan --}}
                            <div class="form-section">
                                <h5 class="section-title">B. Data Pendidikan</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Pendidikan Terakhir / Sedang Ditempuh</label>
                                            <input type="text" name="pendidikan" class="form-control" placeholder="Contoh: S1 Teknik Informatika">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Sekolah / Universitas</label>
                                            <input type="text" name="instansi" class="form-control" placeholder="Contoh: Universitas Indonesia">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            {{-- C. Keterampilan & Minat --}}
                            <div class="form-section">
                                <h5 class="section-title">C. Keterampilan & Minat</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Hobi / Minat</label>
                                            <input type="text" name="hobi" class="form-control" placeholder="Contoh: Membaca, Olahraga">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Bakat atau Keterampilan Khusus</label>
                                            <input type="text" name="keterampilan" class="form-control" placeholder="Contoh: Menyanyi, Menari">
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Organisasi yang Pernah Diikuti</label>
                                            <textarea name="organisasi" class="form-control" placeholder="Tuliskan organisasi yang pernah diikuti..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            {{-- D. Dokumen Pendukung --}}
                            <div class="form-section">
                                <h5 class="section-title">D. Dokumen Pendukung</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Pas Foto (4x6)</label>
                                            <input type="file" name="foto" class="form-control" accept="image/*">
                                            <small class="text-muted">Format: JPG, PNG (Maks. 2MB)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Scan KTP / Kartu Pelajar</label>
                                            <input type="file" name="identitas" class="form-control" accept="image/*,application/pdf">
                                            <small class="text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            {{-- E. Lain-lain --}}
                            <div class="form-section">
                                <h5 class="section-title">E. Lain-lain</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Alasan Mengikuti Bujang Dara</label>
                                            <textarea name="alasan" class="form-control" placeholder="Tuliskan alasan kamu mengikuti ajang ini..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Harapan Setelah Mengikuti Ajang Ini</label>
                                            <textarea name="harapan" class="form-control" placeholder="Tuliskan harapan kamu setelah mengikuti ajang ini..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Action --}}
                            <div class="d-flex justify-content-end gap-3 mt-4 pt-3">
                                <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send me-2"></i>Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection