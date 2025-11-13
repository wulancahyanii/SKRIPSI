@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f7fa;
    }
    .main-content {
        background: #f5f7fa;
        padding: 0;
    }
    .header-section {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 40px 50px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 0 0 30px 30px;
    }
    .header-section h1 {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .welcome-text {
        background: rgba(255, 255, 255, 0.15);
        padding: 20px 25px;
        border-radius: 15px;
        margin-top: 15px;
    }
    .stats-container {
        padding: 40px 50px;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #f0f0f0;
        transition: 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
    }
    .stat-icon {
        font-size: 30px;
        margin-bottom: 15px;
    }
    .stat-label {
        font-size: 15px;
        color: #6b7280;
    }
    .stat-value {
        font-size: 36px;
        font-weight: 700;
        color: #1f2937;
    }
    .info-section {
        background: white;
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #f0f0f0;
    }
    .info-section h2 {
        font-size: 20px;
        margin-bottom: 20px;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    .info-item {
        padding: 20px;
        background: #f9fafb;
        border-left: 4px solid #667eea;
        border-radius: 10px;
    }
    .quick-actions {
        margin-top: 30px;
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
        padding: 30px;
        border-radius: 16px;
        border: 1px solid #667eea30;
    }
    .action-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    .action-btn {
        padding: 12px 24px;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }
    .action-btn.primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .action-btn.secondary {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    .action-btn.success {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="main-content">
    <!-- Header -->
    <div class="header-section">
        <div class="welcome-text">
            <p>Platform ini dirancang untuk memudahkan pengelolaan data peserta, monitoring proses penilaian, serta menyajikan informasi terkini terkait kegiatan Bujang Dara di Kabupaten Bengkalis.</p>
            <p>Mari bersama-sama kita dorong generasi muda untuk tampil percaya diri, berprestasi, dan berkontribusi positif bagi pembangunan daerah.</p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="stats-container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-label">Total Peserta</div>
                <div class="stat-value">{{ $totalPeserta ?? 0 }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-label">Kriteria Penilaian</div>
                <div class="stat-value">{{ $totalKriteria ?? 5 }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🏆</div>
                <div class="stat-label">Juara Terpilih</div>
                <div class="stat-value">{{ $totalJuara ?? 0 }}</div>
            </div>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <h2>📊 Informasi Sistem</h2>
            <div class="info-grid">
                <div class="info-item">
                    <h3>🎯 Tujuan Platform</h3>
                    <p>Memfasilitasi penilaian yang objektif, transparan, dan terstruktur untuk pemilihan Bujang Dara terbaik.</p>
                </div>
                <div class="info-item">
                    <h3>⚙️ Fitur Utama</h3>
                    <p>Manajemen peserta, sistem penilaian multi-kriteria, perhitungan otomatis, dan pelaporan hasil.</p>
                </div>
                <div class="info-item">
                    <h3>👨‍⚖️ Proses Penilaian</h3>
                    <p>Menggunakan metode MultiFactor Evaluation Process untuk hasil yang akurat dan adil.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
