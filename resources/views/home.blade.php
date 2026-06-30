{{--
=============================================================
DASHBOARD – Epic Farm Futuristik (Super Wow)
=============================================================
Tambahan desain :
- Langit gradasi + awan bergerak + matahari berdenyut
- Rumput bergoyang + pagar kayu + hewan berjalan di bawah
- Kartu statistik dengan efek glassmorphism & ikon hewan
- Efek hover 3D pada kartu
- Animasi bintang/partikel halus
- Footer dekoratif dengan ikon peternakan
Semua data statistik tetap ditampilkan dengan benar.
=============================================================
--}}

@extends('layouts.app')

@section('title', 'Dashboard - FarmNex')

@push('styles')
    {{-- Font Awesome untuk ikon hewan --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ==========================================================
           GLOBAL & BACKGROUND – Langit & Rumput
        ========================================================== */

        /* ---------- Background Utama ---------- */
        .content-wrapper {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            padding-bottom: 80px; /* ruang untuk rumput */
        }

        /* ---------- Matahari ---------- */
        .sun-dash {
            position: absolute;
            top: 30px;
            right: 60px;
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSun 4s ease-in-out infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes pulseSun {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan Bergerak ---------- */
        .cloud-dash {
            position: absolute;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
            animation: moveCloud 25s linear infinite;
        }

        .cloud-dash::before,
        .cloud-dash::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud-dash-1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 28s;
        }
        .cloud-dash-1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud-dash-1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud-dash-2 {
            width: 220px;
            height: 60px;
            top: 130px;
            left: -300px;
            animation-duration: 32s;
            animation-delay: 6s;
        }
        .cloud-dash-2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud-dash-2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloud {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput di Bawah ---------- */
        .grass-dash {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: #2e7d32;
            z-index: 1;
            border-top: 4px solid #1b5e20;
            pointer-events: none;
        }

        .grass-dash::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
            height: 40px;
            background: repeating-linear-gradient(75deg,
                #388e3c 0px, #388e3c 10px,
                #2e7d32 10px, #2e7d32 20px);
            clip-path: polygon(0% 100%, 10% 0%, 20% 100%, 30% 0%, 40% 100%, 50% 0%,
                60% 100%, 70% 0%, 80% 100%, 90% 0%, 100% 100%);
            animation: swayGrass 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrass {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar Kayu ---------- */
        .fence-dash {
            position: absolute;
            bottom: 50px;
            left: 0;
            right: 0;
            height: 30px;
            display: flex;
            justify-content: space-around;
            padding: 0 10px;
            z-index: 2;
            pointer-events: none;
        }

        .fence-dash .post {
            width: 10px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence-dash .post::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -15px;
            right: -15px;
            height: 6px;
            background: #8d6e63;
            border-radius: 4px;
            box-shadow: 0 -12px 0 #8d6e63, 0 12px 0 #8d6e63;
        }

        /* ---------- Hewan Berjalan ---------- */
        .walking-animals-dash {
            position: absolute;
            bottom: 55px;
            left: 0;
            right: 0;
            z-index: 3;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walkAnimal 20s linear infinite;
        }

        .walking-animals-dash i {
            font-size: 2.5rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceAnimal 1.2s ease-in-out infinite alternate;
        }

        .walking-animals-dash i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-dash i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-dash i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkAnimal {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceAnimal {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang (di langit) ---------- */
        .floating-farm-dashboard {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-farm-dashboard i {
            position: absolute;
            font-size: 3.5rem;
            color: rgba(255, 215, 0, 0.08);
            animation: floatAnimalDash 18s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1));
        }

        .floating-farm-dashboard i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-dashboard i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-dashboard i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-dashboard i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatAnimalDash {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ==========================================================
           KARTU STATISTIK (Glassmorphism + Efek 3D)
        ========================================================== */

        .dashboard-card {
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 32px;
            padding: 1.8rem 1.5rem;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
            color: #1b3a2b;
            position: relative;
            z-index: 5;
            overflow: hidden;
        }

        .dashboard-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3), 0 0 40px rgba(255, 215, 0, 0.05);
            border-color: rgba(255, 215, 0, 0.4);
        }

        .dashboard-card .card-icon {
            font-size: 3rem;
            opacity: 0.4;
            float: right;
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover .card-icon {
            transform: scale(1.15) rotate(6deg);
            opacity: 0.8;
        }

        .dashboard-card .card-title {
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
            color: #1b3a2b;
        }

        .dashboard-card .card-value {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1b3a2b;
            margin-bottom: 0.25rem;
        }

        .dashboard-card .card-sub {
            font-size: 0.9rem;
            opacity: 0.7;
            font-weight: 500;
        }

        /* Warna khusus tiap kartu */
        .card-buku {
            background: linear-gradient(135deg, rgba(46, 125, 50, 0.25), rgba(27, 94, 32, 0.1));
            border-left: 4px solid #2e7d32;
        }
        .card-buku .card-icon { color: #2e7d32; }

        .card-kategori {
            background: linear-gradient(135deg, rgba(21, 101, 192, 0.25), rgba(13, 71, 161, 0.1));
            border-left: 4px solid #1565c0;
        }
        .card-kategori .card-icon { color: #1565c0; }

        .card-user {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.25), rgba(255, 193, 7, 0.1));
            border-left: 4px solid #ffd700;
        }
        .card-user .card-icon { color: #ffd700; }

        /* ==========================================================
           PAGE HEADER
        ========================================================== */

        .page-header {
            position: relative;
            z-index: 5;
            color: #fff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .page-header h3 {
            font-weight: 700;
            font-size: 2rem;
        }

        .page-header h3 i {
            color: #ffd700;
            filter: drop-shadow(0 0 15px rgba(255, 215, 0, 0.3));
        }

        /* ==========================================================
           FOOTER DEKORATIF
        ========================================================== */

        .footer-farm {
            position: relative;
            z-index: 5;
            margin-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .footer-farm i {
            color: #ffd700;
            margin: 0 4px;
        }

        /* ==========================================================
           RESPONSIF
        ========================================================== */

        @media (max-width: 768px) {
            .dashboard-card .card-value {
                font-size: 2rem;
            }
            .floating-farm-dashboard i {
                display: none;
            }
            .walking-animals-dash {
                display: none;
            }
            .fence-dash {
                display: none;
            }
            .grass-dash {
                height: 30px;
            }
            .cloud-dash {
                display: none;
            }
            .sun-dash {
                width: 40px;
                height: 40px;
                top: 15px;
                right: 20px;
            }
            .page-header h3 {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    {{-- ===== DEKORASI ===== --}}

    {{-- Matahari --}}
    <div class="sun-dash"></div>

    {{-- Awan --}}
    <div class="cloud-dash cloud-dash-1"></div>
    <div class="cloud-dash cloud-dash-2"></div>

    {{-- Rumput --}}
    <div class="grass-dash"></div>

    {{-- Pagar --}}
    <div class="fence-dash">
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

    {{-- Hewan Berjalan --}}
    <div class="walking-animals-dash">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>

    {{-- Hewan Melayang --}}
    <div class="floating-farm-dashboard">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    {{-- ===== KONTEN UTAMA ===== --}}

    <div class="page-header">
        <h3 class="page-title">
            <i class="fas fa-tractor"></i> Dashboard Peternakan
        </h3>
    </div>

    <div class="row">

        {{-- TOTAL BUKU --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="dashboard-card card-buku">
                <div class="card-body" style="padding: 0;">
                    <h4 class="card-title">
                        <i class="fas fa-book-open card-icon"></i>
                        Total Buku
                    </h4>
                    <div class="card-value">{{ $totalBuku }}</div>
                    <div class="card-sub">
                        <i class="fas fa-seedling" style="margin-right: 6px;"></i>
                        Data buku tersedia
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL KATEGORI --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="dashboard-card card-kategori">
                <div class="card-body" style="padding: 0;">
                    <h4 class="card-title">
                        <i class="fas fa-tags card-icon"></i>
                        Total Kategori
                    </h4>
                    <div class="card-value">{{ $totalKategori }}</div>
                    <div class="card-sub">
                        <i class="fas fa-layer-group" style="margin-right: 6px;"></i>
                        Kategori terdaftar
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL USER --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="dashboard-card card-user">
                <div class="card-body" style="padding: 0;">
                    <h4 class="card-title">
                        <i class="fas fa-users card-icon"></i>
                        User Login
                    </h4>
                    <div class="card-value">{{ $totalUser }}</div>
                    <div class="card-sub">
                        <i class="fas fa-user-check" style="margin-right: 6px;"></i>
                        Total pengguna aktif
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Footer Dekoratif --}}
    <div class="footer-farm">
        <i class="fas fa-farm"></i> FarmNex &bull; Futuristic Livestock Management <i class="fas fa-leaf"></i>
    </div>
@endsection