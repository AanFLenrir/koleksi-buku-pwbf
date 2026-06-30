@extends('layouts.app')

@section('title', 'Wilayah Ajax - FarmNex')

@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           EPIC FARM THEME – Wilayah Ajax
           ========================================================== */

        /* ---------- Background ---------- */
        .content-wrapper {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh;
            padding: 30px 0;
            position: relative;
            overflow-x: hidden;
        }

        /* ---------- Matahari ---------- */
        .sun-wilayah {
            position: fixed;
            top: 30px;
            right: 60px;
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSunWilayah 4s ease-in-out infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes pulseSunWilayah {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-wilayah {
            position: fixed;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
            animation: moveCloudWilayah 25s linear infinite;
        }

        .cloud-wilayah::before,
        .cloud-wilayah::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud-wilayah-1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 28s;
        }
        .cloud-wilayah-1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud-wilayah-1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud-wilayah-2 {
            width: 220px;
            height: 60px;
            top: 130px;
            left: -300px;
            animation-duration: 32s;
            animation-delay: 6s;
        }
        .cloud-wilayah-2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud-wilayah-2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloudWilayah {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-wilayah {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: #2e7d32;
            z-index: 1;
            border-top: 4px solid #1b5e20;
            pointer-events: none;
        }

        .grass-wilayah::before {
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
            animation: swayGrassWilayah 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrassWilayah {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-wilayah {
            position: fixed;
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

        .fence-wilayah .post {
            width: 10px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence-wilayah .post::before {
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
        .walking-animals-wilayah {
            position: fixed;
            bottom: 55px;
            left: 0;
            right: 0;
            z-index: 3;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walkWilayah 20s linear infinite;
        }

        .walking-animals-wilayah i {
            font-size: 2.5rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceWilayah 1.2s ease-in-out infinite alternate;
        }

        .walking-animals-wilayah i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-wilayah i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-wilayah i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkWilayah {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceWilayah {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-farm-wilayah {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-farm-wilayah i {
            position: absolute;
            font-size: 3.5rem;
            color: rgba(255, 215, 0, 0.08);
            animation: floatWilayah 18s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1));
        }

        .floating-farm-wilayah i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-wilayah i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-wilayah i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-wilayah i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatWilayah {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Cards ---------- */
        .card {
            background: rgba(255, 255, 255, 0.18) !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            border-radius: 32px !important;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.2) !important;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease !important;
            overflow: hidden !important;
            position: relative !important;
            z-index: 5 !important;
        }

        .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        .card-header {
            padding: 1rem 1.5rem !important;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2) !important;
            font-weight: 700 !important;
            border-radius: 32px 32px 0 0 !important;
            background: rgba(255, 255, 255, 0.15) !important;
            color: #1b3a2b !important;
        }

        .card-header.bg-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Form Elements ---------- */
        .form-select {
            background: rgba(255, 255, 255, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.2rem !important;
            color: #1b3a2b !important;
            transition: all 0.3s !important;
            cursor: pointer !important;
        }

        .form-select:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15) !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }

        .form-select:disabled {
            opacity: 0.5 !important;
            cursor: not-allowed !important;
        }

        .form-label {
            color: #1b3a2b !important;
            font-weight: 600 !important;
        }

        .form-label i {
            margin-right: 6px !important;
            color: #ffd700 !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            .card-body { padding: 1rem !important; }
            .floating-farm-wilayah i { display: none; }
            .walking-animals-wilayah { display: none; }
            .fence-wilayah { display: none; }
            .grass-wilayah { height: 30px; }
            .cloud-wilayah { display: none; }
            .sun-wilayah { width: 40px; height: 40px; top: 15px; right: 20px; }
        }
    </style>
@endpush

@section('content')
    {{-- ===== DEKORASI ===== --}}
    <div class="sun-wilayah"></div>
    <div class="cloud-wilayah cloud-wilayah-1"></div>
    <div class="cloud-wilayah cloud-wilayah-2"></div>
    <div class="grass-wilayah"></div>
    <div class="fence-wilayah">
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
    <div class="walking-animals-wilayah">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>
    <div class="floating-farm-wilayah">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    {{-- ===== KONTEN UTAMA ===== --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4 fw-semibold">
                        <i class="fas fa-map-marker-alt me-2"></i>Wilayah Administrasi Indonesia (Ajax jQuery)
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-flag"></i> Provinsi
                            </label>
                            <select id="provinsi" class="form-select">
                                <option value="">-- Pilih Provinsi --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-city"></i> Kota / Kabupaten
                            </label>
                            <select id="kota" class="form-select" disabled>
                                <option value="">-- Pilih Kota --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-road"></i> Kecamatan
                            </label>
                            <select id="kecamatan" class="form-select" disabled>
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-home"></i> Kelurahan
                            </label>
                            <select id="kelurahan" class="form-select" disabled>
                                <option value="">-- Pilih Kelurahan --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#provinsi').html('<option value="">-- Pilih Provinsi --</option>');
            $.ajax({ url: '/api/provinsi', type: 'GET',
                success: function (data) {
                    $.each(data, function (i, item) {
                        $('#provinsi').append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                }
            });

            $('#provinsi').on('change', function () {
                const id = $(this).val();
                $('#kota').html('<option value="">-- Pilih Kota --</option>').prop('disabled', true);
                $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>').prop('disabled', true);
                $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>').prop('disabled', true);
                if (!id) return;
                $.ajax({ url: '/api/kota/' + id, type: 'GET',
                    success: function (data) {
                        $('#kota').prop('disabled', false);
                        $.each(data, function (i, item) {
                            $('#kota').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    }
                });
            });

            $('#kota').on('change', function () {
                const id = $(this).val();
                $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>').prop('disabled', true);
                $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>').prop('disabled', true);
                if (!id) return;
                $.ajax({ url: '/api/kecamatan/' + id, type: 'GET',
                    success: function (data) {
                        $('#kecamatan').prop('disabled', false);
                        $.each(data, function (i, item) {
                            $('#kecamatan').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    }
                });
            });

            $('#kecamatan').on('change', function () {
                const id = $(this).val();
                $('#kelurahan').html('<option value="">-- Pilih Kelurahan --</option>').prop('disabled', true);
                if (!id) return;
                $.ajax({ url: '/api/kelurahan/' + id, type: 'GET',
                    success: function (data) {
                        $('#kelurahan').prop('disabled', false);
                        $.each(data, function (i, item) {
                            $('#kelurahan').append('<option value="' + item.id + '">' + item.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush