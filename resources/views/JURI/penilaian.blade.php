<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Penilaian Juri - Bujang Dara Bengkalis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%);
            box-shadow: 4px 0 20px rgba(0,0,0,0.3);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: relative;
        }

        .logo-sidebar {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            border: 3px solid rgba(255,255,255,0.3);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo-sidebar {
            width: 50px;
            height: 50px;
        }

        .logo-sidebar-inner {
            width: 90%;
            height: 90%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .logo-sidebar-text-top {
            font-size: 10px;
            color: white;
            letter-spacing: 1px;
        }

        .logo-sidebar-text-main {
            font-size: 18px;
            color: #ffd700;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .logo-sidebar-text-bottom {
            font-size: 7px;
            color: white;
            letter-spacing: 1px;
        }

        .sidebar-title {
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .sidebar-title,
        .sidebar.collapsed .sidebar-subtitle {
            opacity: 0;
            height: 0;
            overflow: hidden;
        }

        .sidebar-subtitle {
            color: rgba(255,255,255,0.7);
            font-size: 0.85em;
            transition: all 0.3s ease;
        }

        .toggle-btn {
            position: absolute;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: #f0f0f0;
            transform: translateY(-50%) scale(1.1);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .menu-item.active {
            background: rgba(255,255,255,0.15);
            color: white;
            border-left: 4px solid #ffd700;
        }

        .menu-item.active::before {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: #ffd700;
        }

        .menu-icon {
            font-size: 1.3em;
            width: 30px;
            text-align: center;
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .menu-icon {
            margin-right: 0;
        }

        .menu-text {
            font-size: 0.95em;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .menu-badge {
            background: #ff4757;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.75em;
            margin-left: auto;
            font-weight: 600;
        }

        .sidebar.collapsed .menu-badge {
            display: none;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.1);
        }

        .user-info {
            display: flex;
            align-items: center;
            color: white;
            transition: all 0.3s ease;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3em;
            margin-right: 12px;
            border: 2px solid rgba(255,255,255,0.3);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .user-avatar {
            margin-right: 0;
        }

        .user-details {
            flex: 1;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .user-details {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.95em;
        }

        .user-role {
            font-size: 0.8em;
            opacity: 0.8;
        }

        /* Main Content */
        .main-wrapper {
            margin-left: 280px;
            transition: all 0.3s ease;
            padding: 20px;
        }

        .main-wrapper.expanded {
            margin-left: 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .logo-container {
            display: inline-block;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .logo {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: 4px solid rgba(255,255,255,0.3);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .logo-inner {
            width: 90%;
            height: 90%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .logo-text-top {
            font-size: 12px;
            color: white;
            letter-spacing: 1px;
        }

        .logo-text-main {
            font-size: 22px;
            color: #ffd700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .logo-text-bottom {
            font-size: 9px;
            color: white;
            letter-spacing: 2px;
        }

        .header h1 {
            font-size: 2em;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .header p {
            font-size: 1em;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 40px 30px;
        }

        .section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 1.4em;
            color: #1e3c72;
            margin-bottom: 20px;
            padding: 15px 20px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border-left: 5px solid #667eea;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-group {
            margin-bottom: 25px;
            background: #f8f9ff;
            padding: 20px;
            border-radius: 12px;
            border: 2px solid #e6e9ff;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 12px;
            font-size: 1.1em;
        }

        select {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: white;
            cursor: pointer;
        }

        select:hover {
            border-color: #667eea;
        }

        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        thead {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
        }

        th {
            padding: 16px 12px;
            text-align: center;
            font-weight: 600;
            font-size: 0.95em;
            letter-spacing: 0.5px;
        }

        th.text-left {
            text-align: left;
        }

        td {
            padding: 14px 12px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: #f8f9ff;
            transform: scale(1.005);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        input[type="number"] {
            width: 100px;
            padding: 10px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95em;
            text-align: center;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px 50px;
            border: none;
            border-radius: 50px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            display: block;
            margin: 30px auto 0;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit::before {
            content: '💾 ';
            margin-right: 8px;
        }

        .badge {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            color: #1e3c72;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(255, 215, 0, 0.4);
        }

        .category-label {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9em;
            font-weight: 600;
            display: inline-block;
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            cursor: pointer;
            font-size: 1.5em;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .main-wrapper.expanded {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .header h1 {
                font-size: 1.5em;
            }
            
            .content {
                padding: 20px 15px;
            }
            
            table {
                font-size: 0.85em;
            }
            
            th, td {
                padding: 10px 6px;
            }

            input[type="number"] {
                width: 80px;
                padding: 8px;
            }

            .section-title {
                font-size: 1.1em;
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Overlay untuk mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        .sidebar-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">☰</button>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" onclick="toggleMobileSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <button class="toggle-btn" onclick="toggleSidebar()">
                <span id="toggleIcon">◀</span>
            </button>
            <div class="logo-sidebar">
                <div class="logo-sidebar-inner">
                    <div class="logo-sidebar-text-top">BUJANG</div>
                    <div class="logo-sidebar-text-main">BD</div>
                    <div class="logo-sidebar-text-bottom">BENGKALIS</div>
                </div>
            </div>
            <div class="sidebar-title">Bujang Dara</div>
            <div class="sidebar-subtitle">Sistem Penilaian</div>
        </div>

        <nav class="sidebar-menu">
            <a href="#" class="menu-item">
                <span class="menu-icon">🏠</span>
                <span class="menu-text">Dashboard</span>
            </a>
            <a href="#" class="menu-item active">
                <span class="menu-icon">✍️</span>
                <span class="menu-text">Penilaian Juri</span>
                <span class="menu-badge">Active</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">👥</span>
                <span class="menu-text">Data Peserta</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">📊</span>
                <span class="menu-text">Hasil Penilaian</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">🏆</span>
                <span class="menu-text">Peringkat</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">📋</span>
                <span class="menu-text">Laporan</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">⚙️</span>
                <span class="menu-text">Pengaturan</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">❓</span>
                <span class="menu-text">Bantuan</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">👤</div>
                <div class="user-details">
                    <div class="user-name">Juri #1</div>
                    <div class="user-role">Dewan Juri</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper" id="mainWrapper">
        <div class="container">
            <div class="header">
                <div class="logo-container">
                    <div class="logo">
                        <div class="logo-inner">
                            <div class="logo-text-top">BUJANG</div>
                            <div class="logo-text-main">BD</div>
                            <div class="logo-text-bottom">BENGKALIS</div>
                        </div>
                    </div>
                </div>
                <h1>Halaman Penilaian Juri</h1>
                <p>Pemilihan Bujang Dara Bengkalis</p>
            </div>

            <div class="content">
                <!-- Pilih Peserta -->
                <div class="section">
                    <div class="form-group">
                        <label for="peserta">Pilih Peserta:</label>
                        <select id="peserta" name="peserta">
                            <option value="">-- Pilih Peserta --</option>
                            <option value="1">Bujang - Andi</option>
                            <option value="2">Dara - Siti</option>
                            <option value="3">Bujang - Rudi</option>
                            <option value="4">Dara - Lina</option>
                            <option value="5">Bujang - Eko</option>
                        </select>
                    </div>
                </div>

                <form id="formPenilaian">
                    <!-- Kriteria Top 6 dan Top 3 -->
                    <div class="section">
                        <h3 class="section-title">
                            <span>Penilaian Top 6 dan Top 3</span>
                            <span class="badge">Tahap Awal</span>
                        </h3>
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Kode</th>
                                    <th class="text-left" style="width: 40%;">Faktor Kriteria</th>
                                    <th style="width: 15%;">Bobot</th>
                                    <th style="width: 35%;">Nilai (0-100)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>C1</strong></td>
                                    <td style="text-align: left;">Penampilan</td>
                                    <td>0.4</td>
                                    <td><input type="number" name="C1" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><strong>C2</strong></td>
                                    <td style="text-align: left;">Wawasan</td>
                                    <td>0.35</td>
                                    <td><input type="number" name="C2" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><strong>C3</strong></td>
                                    <td style="text-align: left;">Kepribadian</td>
                                    <td>0.25</td>
                                    <td><input type="number" name="C3" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Kriteria Juara -->
                    <div class="section">
                        <h3 class="section-title">
                            <span>Penilaian Juara 1, 2, dan 3</span>
                            <span class="badge">Tahap Final</span>
                        </h3>
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Kode</th>
                                    <th class="text-left" style="width: 40%;">Faktor Kriteria</th>
                                    <th style="width: 15%;">Bobot</th>
                                    <th style="width: 35%;">Nilai (0-100)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>C1</strong></td>
                                    <td style="text-align: left;">Penampilan</td>
                                    <td>0.25</td>
                                    <td><input type="number" name="C1_juara" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><strong>C2</strong></td>
                                    <td style="text-align: left;">Wawasan</td>
                                    <td>0.2</td>
                                    <td><input type="number" name="C2_juara" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><strong>C3</strong></td>
                                    <td style="text-align: left;">Kepribadian</td>
                                    <td>0.2</td>
                                    <td><input type="number" name="C3_juara" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><strong>C4</strong></td>
                                    <td style="text-align: left;">Q & A</td>
                                    <td>0.35</td>
                                    <td><input type="number" name="C4_juara" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Penghargaan Tambahan -->
                    <div class="section">
                        <h3 class="section-title">
                            <span>Penilaian Penghargaan Tambahan</span>
                            <span class="badge">Special Awards</span>
                        </h3>
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 18%;">Kategori</th>
                                    <th style="width: 8%;">Kode</th>
                                    <th class="text-left" style="width: 32%;">Faktor Kriteria</th>
                                    <th style="width: 12%;">Bobot</th>
                                    <th style="width: 30%;">Nilai (0-100)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Intelegensia -->
                                <tr>
                                    <td><span class="category-label">Intelegensia</span></td>
                                    <td><strong>C5</strong></td>
                                    <td style="text-align: left;">Nilai akademik</td>
                                    <td>0.6</td>
                                    <td><input type="number" name="C5" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><span class="category-label">Intelegensia</span></td>
                                    <td><strong>C6</strong></td>
                                    <td style="text-align: left;">Kemampuan komunikasi</td>
                                    <td>0.4</td>
                                    <td><input type="number" name="C6" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <!-- Fotogenic -->
                                <tr>
                                    <td><span class="category-label">Fotogenic</span></td>
                                    <td><strong>C7</strong></td>
                                    <td style="text-align: left;">Kualitas foto</td>
                                    <td>0.7</td>
                                    <td><input type="number" name="C7" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <tr>
                                    <td><span class="category-label">Fotogenic</span></td>
                                    <td><strong>C8</strong></td>
                                    <td style="text-align: left;">Ekspresi penampilan</td>
                                    <td>0.3</td>
                                    <td><input type="number" name="C8" min="0" max="100" placeholder="0-100"></td>
                                </tr>
                                <!-- Best Social Media -->
                                <tr>
                                    <td><span class="category-label">Best Social Media</span></td>
                                    <td><strong>C9</strong></td>
                                    <td style="text-align: left;">Kreativitas konten</td>
                                    <td>0.6</td>
                                    <td><input type="number"