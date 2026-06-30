@extends('layouts.app')

@section('title', 'Data Toko - FarmNex')

@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM NEX EPIC – Tema Peternakan Natural + Futuristik
           ========================================================== */

        /* ---------- Background Langit & Rumput ---------- */
        #farm-toko-page,
        #farm-toko-page .main-panel,
        #farm-toko-page .content-wrapper,
        #farm-toko-page .container-fluid {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-farm {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSun 4s ease-in-out infinite alternate !important;
            z-index: 1 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSun {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan Bergerak ---------- */
        .cloud-farm {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 1 !important;
            pointer-events: none !important;
            animation: moveCloud 25s linear infinite !important;
        }
        .cloud-farm::before,
        .cloud-farm::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }
        .cloud-farm-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-farm-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-farm-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }
        .cloud-farm-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-farm-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-farm-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloud {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput di Bawah ---------- */
        .grass-farm {
            position: fixed !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 60px !important;
            background: #2e7d32 !important;
            z-index: 1 !important;
            border-top: 4px solid #1b5e20 !important;
            pointer-events: none !important;
        }
        .grass-farm::before {
            content: '' !important;
            position: absolute !important;
            top: -20px !important;
            left: 0 !important;
            right: 0 !important;
            height: 40px !important;
            background: repeating-linear-gradient(75deg,
                #388e3c 0px, #388e3c 10px,
                #2e7d32 10px, #2e7d32 20px) !important;
            clip-path: polygon(0% 100%, 10% 0%, 20% 100%, 30% 0%, 40% 100%, 50% 0%,
                60% 100%, 70% 0%, 80% 100%, 90% 0%, 100% 100%) !important;
            animation: swayGrass 3s ease-in-out infinite alternate !important;
        }
        @keyframes swayGrass {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar Kayu ---------- */
        .fence-farm {
            position: fixed !important;
            bottom: 50px !important;
            left: 0 !important;
            right: 0 !important;
            height: 30px !important;
            display: flex !important;
            justify-content: space-around !important;
            padding: 0 10px !important;
            z-index: 2 !important;
            pointer-events: none !important;
        }
        .fence-farm .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }
        .fence-farm .post::before {
            content: '' !important;
            position: absolute !important;
            top: 50% !important;
            left: -15px !important;
            right: -15px !important;
            height: 6px !important;
            background: #8d6e63 !important;
            border-radius: 4px !important;
            box-shadow: 0 -12px 0 #8d6e63, 0 12px 0 #8d6e63 !important;
        }

        /* ---------- Hewan Berjalan (di atas rumput) ---------- */
        .walking-animals-farm {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 3 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkFarm 20s linear infinite !important;
        }
        .walking-animals-farm i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bounceAnimal 1.2s ease-in-out infinite alternate !important;
        }
        .walking-animals-farm i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-farm i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-farm i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkFarm {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }
        @keyframes bounceAnimal {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang (di langit) ---------- */
        .floating-farm-toko {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-farm-toko i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatTokoFarm 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-farm-toko i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-toko i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-toko i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-toko i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatTokoFarm {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Cards ---------- */
        #farm-toko-page .card {
            background: rgba(255, 255, 255, 0.18) !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            border-radius: 32px !important;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.2) !important;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s !important;
            overflow: hidden !important;
            position: relative !important;
            z-index: 5 !important;
        }

        #farm-toko-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-toko-page .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Header ---------- */
        #farm-toko-page .page-header {
            position: relative;
            z-index: 5;
        }
        #farm-toko-page .page-header h4 {
            font-weight: 700 !important;
            color: #fff !important;
            text-shadow: 0 2px 20px rgba(0,0,0,0.3) !important;
        }
        #farm-toko-page .page-header h4 i {
            color: #ffd700 !important;
            filter: drop-shadow(0 0 15px rgba(255,215,0,0.3));
        }

        /* ---------- Tombol ---------- */
        #farm-toko-page .btn {
            border-radius: 50px !important;
            padding: 0.6rem 1.8rem !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
            letter-spacing: 0.5px !important;
            text-transform: uppercase !important;
            position: relative !important;
            overflow: hidden !important;
        }

        #farm-toko-page .btn::after {
            content: '' !important;
            position: absolute !important;
            top: -50% !important;
            left: -50% !important;
            width: 200% !important;
            height: 200% !important;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%) !important;
            opacity: 0 !important;
            transition: opacity 0.5s !important;
            pointer-events: none !important;
        }

        #farm-toko-page .btn:hover::after {
            opacity: 1 !important;
        }

        #farm-toko-page .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
            box-shadow: 0 6px 20px rgba(46, 125, 50, 0.4) !important;
        }

        #farm-toko-page .btn-primary:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 12px 30px rgba(46, 125, 50, 0.6) !important;
        }

        #farm-toko-page .btn-warning {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-toko-page .btn-warning:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.5) !important;
        }

        #farm-toko-page .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-toko-page .btn-success:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.5) !important;
        }

        #farm-toko-page .btn-secondary {
            background: rgba(255, 255, 255, 0.15) !important;
            color: #1b3a2b !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
        }

        #farm-toko-page .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25) !important;
        }

        /* ---------- Tabel ---------- */
        #farm-toko-page .table {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            margin-top: -8px !important;
            color: #1b3a2b !important;
        }

        #farm-toko-page .table thead th {
            background: rgba(27, 58, 43, 0.15) !important;
            backdrop-filter: blur(4px) !important;
            color: #1b3a2b !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            font-size: 0.75rem !important;
            padding: 0.8rem 1rem !important;
            border: none !important;
            border-radius: 16px 16px 0 0 !important;
        }

        #farm-toko-page .table tbody tr {
            background: rgba(255, 255, 255, 0.3) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 16px !important;
            transition: all 0.2s !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
        }

        #farm-toko-page .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.5) !important;
            transform: scale(1.01) !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08) !important;
        }

        #farm-toko-page .table tbody td {
            padding: 0.8rem 1rem !important;
            border: none !important;
            color: #1b3a2b !important;
            vertical-align: middle !important;
        }

        #farm-toko-page .table tbody td:first-child {
            border-radius: 16px 0 0 16px !important;
        }
        #farm-toko-page .table tbody td:last-child {
            border-radius: 0 16px 16px 0 !important;
        }

        #farm-toko-page .table code {
            background: rgba(255, 255, 255, 0.7) !important;
            padding: 0.2rem 0.6rem !important;
            border-radius: 50px !important;
            font-size: 0.8rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Alert ---------- */
        #farm-toko-page .alert-success {
            background: rgba(46, 125, 50, 0.15) !important;
            border: 1px solid rgba(46, 125, 50, 0.3) !important;
            border-radius: 50px !important;
            color: #1b3a2b !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }
        #farm-toko-page .alert-success i {
            color: #2e7d32 !important;
        }

        /* ---------- Modal ---------- */
        #farm-toko-page .modal-content {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            border-radius: 28px !important;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2) !important;
        }

        #farm-toko-page .modal-header {
            border-bottom: 2px solid rgba(255, 215, 0, 0.2) !important;
            border-radius: 28px 28px 0 0 !important;
            padding: 1rem 1.5rem !important;
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        #farm-toko-page .modal-header .btn-close {
            filter: brightness(0) invert(1) !important;
        }

        #farm-toko-page .modal-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        #farm-toko-page .modal-footer {
            border-top: 1px solid rgba(255, 215, 0, 0.1) !important;
            padding: 1rem 1.5rem !important;
            border-radius: 0 0 28px 28px !important;
        }

        #farm-toko-page .form-control,
        #farm-toko-page .form-select {
            background: rgba(255, 255, 255, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.2rem !important;
            color: #1b3a2b !important;
            transition: all 0.3s !important;
        }

        #farm-toko-page .form-control:focus,
        #farm-toko-page .form-select:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15) !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }

        #farm-toko-page .form-label {
            color: #1b3a2b !important;
            font-weight: 600 !important;
        }
        #farm-toko-page .form-label i {
            color: #ffd700 !important;
            margin-right: 6px !important;
        }

        #farm-toko-page .text-muted {
            color: rgba(27, 58, 43, 0.6) !important;
        }
        #farm-toko-page hr {
            border-color: rgba(255, 215, 0, 0.2) !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-toko-page .card-body { padding: 1rem !important; }
            #farm-toko-page .table thead th,
            #farm-toko-page .table tbody td { padding: 0.5rem 0.6rem !important; }
            #farm-toko-page .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-farm-toko i { display: none !important; }
            .walking-animals-farm { display: none !important; }
            .fence-farm { display: none !important; }
            .grass-farm { height: 30px !important; }
            .cloud-farm { display: none !important; }
            .sun-farm { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-toko-page">

        {{-- Elemen Dekoratif --}}
        <div class="sun-farm"></div>
        <div class="cloud-farm cloud-farm-1"></div>
        <div class="cloud-farm cloud-farm-2"></div>
        <div class="grass-farm"></div>
        <div class="fence-farm">
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
            <span class="post"></span>
        </div>
        <div class="walking-animals-farm">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>

        {{-- Hewan Melayang --}}
        <div class="floating-farm-toko">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        <div class="container-fluid py-4">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-4 page-header">
                <h4 class="fw-bold mb-0">
                    <i class="fas fa-store"></i>
                    Data Toko
                </h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahToko">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Toko
                </button>
            </div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- TABEL TOKO --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Nama Toko</th>
                                <th>Alamat</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Accuracy (m)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tokos as $i => $toko)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><code>{{ $toko->barcode }}</code></td>
                                <td>{{ $toko->nama_toko }}</td>
                                <td>{{ $toko->alamat ?? '-' }}</td>
                                <td>{{ $toko->latitude }}</td>
                                <td>{{ $toko->longitude }}</td>
                                <td>{{ $toko->accuracy }}</td>
                                <td>
                                    <a href="{{ route('toko.barcode', $toko->id) }}"
                                       class="btn btn-warning btn-sm" target="_blank">
                                        <i class="fas fa-print me-1"></i> Cetak Barcode
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data toko.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- MODAL TAMBAH TOKO --}}
        <div class="modal fade" id="modalTambahToko" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-store me-2"></i>Tambah Toko Baru
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('toko.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-store-alt"></i> Nama Toko
                                </label>
                                <input type="text" name="nama_toko" class="form-control" required placeholder="Contoh: Toko Maju Jaya">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-map-pin"></i> Alamat
                                </label>
                                <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat lengkap toko"></textarea>
                            </div>

                            <hr>
                            <p class="fw-bold mb-2">
                                <i class="fas fa-map-marked-alt" style="color: #2e7d32;"></i>
                                Input Titik Awal Lokasi Toko
                            </p>
                            <p class="text-muted small mb-3">Klik tombol di bawah untuk mengambil lokasi GPS toko secara otomatis, atau isi manual.</p>

                            <button type="button" class="btn btn-success mb-3" onclick="ambilLokasiToko()">
                                <i class="fas fa-satellite me-2"></i>Ambil Lokasi GPS Sekarang
                            </button>
                            <div id="status-lokasi" class="text-muted small mb-3"></div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">
                                        <i class="fas fa-arrow-up"></i> Latitude
                                    </label>
                                    <input type="number" name="latitude" id="input-lat" class="form-control"
                                           step="any" required placeholder="-6.2088">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">
                                        <i class="fas fa-arrow-right"></i> Longitude
                                    </label>
                                    <input type="number" name="longitude" id="input-lng" class="form-control"
                                           step="any" required placeholder="106.8456">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">
                                        <i class="fas fa-bullseye"></i> Accuracy (meter)
                                    </label>
                                    <input type="number" name="accuracy" id="input-acc" class="form-control"
                                           step="any" required placeholder="50">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Toko
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>{{-- /#farm-toko-page --}}
@endsection

@push('scripts')
<script>
function ambilLokasiToko() {
    const statusEl = document.getElementById('status-lokasi');
    statusEl.innerHTML = '⏳ Mengambil lokasi, harap tunggu...';

    getAccuratePosition(50, 20000)
        .then(pos => {
            document.getElementById('input-lat').value = pos.coords.latitude;
            document.getElementById('input-lng').value = pos.coords.longitude;
            document.getElementById('input-acc').value = Math.round(pos.coords.accuracy);
            statusEl.innerHTML = `✅ Lokasi berhasil diambil! Accuracy: <strong>${Math.round(pos.coords.accuracy)} meter</strong>`;
            statusEl.className = 'text-success small mb-3';
        })
        .catch(err => {
            statusEl.innerHTML = '❌ Gagal mengambil lokasi: ' + err.message;
            statusEl.className = 'text-danger small mb-3';
        });
}

// Fungsi getAccuratePosition dari modul (Lampiran 1)
function getAccuratePosition(targetAccuracy = 50, maxWait = 20000) {
    return new Promise((resolve, reject) => {
        let bestResult = null;
        const startTime = Date.now();

        const watchId = navigator.geolocation.watchPosition(
            (position) => {
                const acc = position.coords.accuracy;

                if (!bestResult || acc < bestResult.coords.accuracy) {
                    bestResult = position;
                    document.getElementById('status-lokasi').innerHTML =
                        `⏳ Mencari lokasi terbaik... accuracy saat ini: <strong>${Math.round(acc)}m</strong>`;
                }

                if (acc <= targetAccuracy) {
                    navigator.geolocation.clearWatch(watchId);
                    resolve(bestResult);
                }

                if (Date.now() - startTime >= maxWait) {
                    navigator.geolocation.clearWatch(watchId);
                    if (bestResult) resolve(bestResult);
                    else reject(new Error('Timeout, tidak dapat posisi'));
                }
            },
            (error) => reject(error),
            { enableHighAccuracy: true, maximumAge: 0, timeout: maxWait }
        );
    });
}
</script>
@endpush