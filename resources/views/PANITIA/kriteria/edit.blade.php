@extends('layouts.app')

@section('content')
<style>
    .container-custom {
        max-width: 800px;
        margin: 40px auto;
    }

    .card-custom {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card-header-custom {
        background: #4c6ef5;
        color: white;
        padding: 25px;
        text-align: center;
    }

    .card-header-custom h1 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .card-header-custom p {
        font-size: 14px;
        opacity: 0.9;
        margin: 0;
    }

    .card-body-custom {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 8px;
        font-size: 15px;
    }

    .form-group label .required {
        color: #e74c3c;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #4c6ef5;
        box-shadow: 0 0 0 3px rgba(76, 110, 245, 0.15);
    }

    .input-group {
        position: relative;
    }

    .input-group .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #777;
        font-size: 18px;
    }

    .form-control.with-icon {
        padding-right: 45px;
    }

    .help-text {
        font-size: 13px;
        color: #666;
        margin-top: 6px;
    }

    .btn-group {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .btn {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: #4c6ef5;
        color: white;
    }

    .btn-primary:hover {
        background: #3b5bdb;
    }

    .btn-secondary {
        background: #f8f9fa;
        color: #555;
        border: 1px solid #ddd;
    }

    .btn-secondary:hover {
        background: #e9ecef;
    }

    .info-box {
        background: #f3f6ff;
        border-left: 4px solid #4c6ef5;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .info-box p {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
        margin: 0;
    }
</style>

<div class="container-custom">
    <div class="card-custom">
        
        <div class="card-body-custom">
            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kriteria">
                        Nama Kriteria
                        <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nama_kriteria" 
                        name="nama_kriteria" 
                        class="form-control" 
                        placeholder="Masukkan nama kriteria"
                        value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="bobot">
                        Bobot Kriteria
                        <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <input 
                            type="number" 
                            id="bobot" 
                            name="bobot" 
                            class="form-control with-icon" 
                            placeholder="0.00"
                            step="0.01"
                            min="0"
                            max="1"
                            value="{{ old('bobot', $kriteria->bobot) }}"
                            required
                        >
                    </div>
                </div>

                <div class="btn-group">
                    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const namaKriteria = document.getElementById('nama_kriteria').value.trim();
        const bobot = parseFloat(document.getElementById('bobot').value);

        if (!namaKriteria) {
            e.preventDefault();
            alert('❌ Nama kriteria harus diisi!');
            return;
        }

        if (isNaN(bobot) || bobot < 0 || bobot > 1) {
            e.preventDefault();
            alert('❌ Bobot harus berupa angka antara 0 dan 1!');
            return;
        }
    });

    const bobotInput = document.getElementById('bobot');
    bobotInput.addEventListener('blur', function() {
        if (this.value) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    });
</script>
@endsection
