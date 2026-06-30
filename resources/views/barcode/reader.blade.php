@extends('layouts.app')

@section('title', 'Barcode Reader - FarmNex')

@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           EPIC FARM THEME – Barcode Reader
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
        .sun-barcode {
            position: fixed;
            top: 30px;
            right: 60px;
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSunBarcode 4s ease-in-out infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes pulseSunBarcode {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-barcode {
            position: fixed;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
            animation: moveCloudBarcode 25s linear infinite;
        }

        .cloud-barcode::before,
        .cloud-barcode::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud-barcode-1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 28s;
        }
        .cloud-barcode-1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud-barcode-1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud-barcode-2 {
            width: 220px;
            height: 60px;
            top: 130px;
            left: -300px;
            animation-duration: 32s;
            animation-delay: 6s;
        }
        .cloud-barcode-2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud-barcode-2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloudBarcode {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-barcode {
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

        .grass-barcode::before {
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
            animation: swayGrassBarcode 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrassBarcode {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-barcode {
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

        .fence-barcode .post {
            width: 10px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence-barcode .post::before {
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
        .walking-animals-barcode {
            position: fixed;
            bottom: 55px;
            left: 0;
            right: 0;
            z-index: 3;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walkBarcode 20s linear infinite;
        }

        .walking-animals-barcode i {
            font-size: 2.5rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceBarcode 1.2s ease-in-out infinite alternate;
        }

        .walking-animals-barcode i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-barcode i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-barcode i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkBarcode {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceBarcode {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-farm-barcode {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-farm-barcode i {
            position: absolute;
            font-size: 3.5rem;
            color: rgba(255, 215, 0, 0.08);
            animation: floatBarcode 18s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1));
        }

        .floating-farm-barcode i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-barcode i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-barcode i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-barcode i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatBarcode {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Card ---------- */
        .card-scanner {
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
            padding: 2rem !important;
            max-width: 700px !important;
            margin: 0 auto !important;
        }

        .card-scanner:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        .card-scanner .header {
            text-align: center;
            border-bottom: 2px solid rgba(255, 215, 0, 0.2);
            padding-bottom: 1.2rem;
            margin-bottom: 2rem;
        }

        .card-scanner .header h2 {
            font-weight: 700;
            color: #1b3a2b;
            font-size: 1.8rem;
        }

        .card-scanner .header h2 i {
            color: #ffd700;
            margin-right: 10px;
        }

        .card-scanner .header p {
            color: rgba(27, 58, 43, 0.6);
            font-size: 0.95rem;
            margin-top: 0.2rem;
        }

        /* ---------- Scanner ---------- */
        #scanner-container {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            background: #1b3a2b;
            box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.2), 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 480px;
            margin: 0 auto 1.5rem auto;
            aspect-ratio: 4 / 3;
        }

        #scanner-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        #scanner-container::before,
        #scanner-container::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-color: #ffd700;
            border-style: solid;
            border-width: 0;
            pointer-events: none;
            z-index: 3;
            opacity: 0.8;
        }
        #scanner-container::before {
            top: 12px;
            left: 12px;
            border-top-width: 3px;
            border-left-width: 3px;
            border-radius: 4px 0 0 0;
        }
        #scanner-container::after {
            bottom: 12px;
            right: 12px;
            border-bottom-width: 3px;
            border-right-width: 3px;
            border-radius: 0 0 4px 0;
        }

        #scanner-container .scan-line {
            position: absolute;
            left: 10%;
            right: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ffd700, transparent);
            z-index: 4;
            animation: scanMove 2.5s ease-in-out infinite;
            opacity: 0.7;
        }

        @keyframes scanMove {
            0% { top: 10%; opacity: 0.3; }
            50% { top: 90%; opacity: 1; }
            100% { top: 10%; opacity: 0.3; }
        }

        /* ---------- Hasil Scan ---------- */
        #hasil {
            margin-top: 1.5rem;
        }

        .alert-scan {
            border-radius: 20px;
            padding: 1.2rem 1.6rem;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-weight: 500;
        }

        .alert-scan-success {
            background: rgba(46, 125, 50, 0.15);
            border-color: rgba(46, 125, 50, 0.3);
            color: #1b3a2b;
        }

        .alert-scan-success i {
            color: #2e7d32;
            margin-right: 10px;
        }

        .alert-scan-danger {
            background: rgba(255, 82, 82, 0.12);
            border-color: rgba(255, 82, 82, 0.25);
            color: #b71c1c;
        }

        .alert-scan-danger i {
            color: #d32f2f;
            margin-right: 10px;
        }

        .alert-scan .detail {
            margin-top: 6px;
            font-weight: 400;
            color: #1b3a2b;
            opacity: 0.8;
            font-size: 0.95rem;
        }

        .alert-scan .detail strong {
            color: #1b3a2b;
            font-weight: 600;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            .card-scanner { padding: 1.2rem !important; }
            .card-scanner .header h2 { font-size: 1.4rem; }
            #scanner-container { max-width: 100%; }
            .floating-farm-barcode i { display: none; }
            .walking-animals-barcode { display: none; }
            .fence-barcode { display: none; }
            .grass-barcode { height: 30px; }
            .cloud-barcode { display: none; }
            .sun-barcode { width: 40px; height: 40px; top: 15px; right: 20px; }
        }
    </style>
@endpush

@section('content')
    {{-- ===== DEKORASI ===== --}}
    <div class="sun-barcode"></div>
    <div class="cloud-barcode cloud-barcode-1"></div>
    <div class="cloud-barcode cloud-barcode-2"></div>
    <div class="grass-barcode"></div>
    <div class="fence-barcode">
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
    <div class="walking-animals-barcode">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>
    <div class="floating-farm-barcode">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    {{-- ===== KONTEN UTAMA ===== --}}
    <div class="container">
        <div class="card-scanner">

            <div class="header">
                <h2>
                    <i class="fas fa-qrcode"></i> Barcode Reader
                </h2>
                <p>
                    <i class="fas fa-camera" style="color: #2e7d32;"></i>
                    Arahkan kamera ke kode batang / QR
                </p>
            </div>

            {{-- Scanner --}}
            <div id="scanner-container">
                <video id="video" width="100%" height="100%" style="border: none;"></video>
                <div class="scan-line"></div>
            </div>

            {{-- Hasil --}}
            <div id="hasil">
                {{-- Pesan default --}}
                <div class="alert-scan alert-scan-info" style="background: rgba(0,0,0,0.03); border-color: rgba(0,0,0,0.05); color: #555; text-align: center;">
                    <i class="fas fa-info-circle"></i> Menunggu pemindaian...
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    {{-- ZXing Library --}}
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script>
        (function() {
            const codeReader = new ZXing.BrowserQRCodeReader();
            const hasilDiv = document.getElementById('hasil');

            codeReader.decodeFromVideoDevice(null, 'video', (result, err) => {
                if (result) {
                    const kode = result.getText();

                    // Tampilkan status scanning
                    hasilDiv.innerHTML = `
                        <div class="alert-scan alert-scan-info" style="background: rgba(255,215,0,0.1); border-color: rgba(255,215,0,0.2); color: #b8860b; text-align: center;">
                            <i class="fas fa-spinner fa-spin"></i> Mencari data...
                        </div>
                    `;

                    fetch(`/barcode-reader/cari/${kode}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'found') {
                                hasilDiv.innerHTML = `
                                    <div class="alert-scan alert-scan-success">
                                        <i class="fas fa-check-circle"></i> Barang Ditemukan!
                                        <div class="detail">
                                            <strong>ID:</strong> ${data.id_barang} &nbsp;|&nbsp;
                                            <strong>Nama:</strong> ${data.nama_barang} &nbsp;|&nbsp;
                                            <strong>Harga:</strong> Rp ${data.harga}
                                        </div>
                                    </div>
                                `;
                            } else {
                                hasilDiv.innerHTML = `
                                    <div class="alert-scan alert-scan-danger">
                                        <i class="fas fa-exclamation-circle"></i> Barang tidak ditemukan.
                                        <div class="detail">Kode: <strong>${kode}</strong></div>
                                    </div>
                                `;
                            }
                        })
                        .catch(() => {
                            hasilDiv.innerHTML = `
                                <div class="alert-scan alert-scan-danger">
                                    <i class="fas fa-times-circle"></i> Gagal menghubungi server.
                                </div>
                            `;
                        });
                }
            });

            // Opsional: handle error kamera
            codeReader.decodeFromVideoDevice(null, 'video', (result, err) => {
                if (err && !result) {
                    // Jika error kamera, tampilkan pesan
                    if (err.message && err.message.includes('NotAllowedError')) {
                        hasilDiv.innerHTML = `
                            <div class="alert-scan alert-scan-danger">
                                <i class="fas fa-ban"></i> Akses kamera ditolak. Izinkan akses kamera di browser Anda.
                            </div>
                        `;
                    }
                }
            });
        })();
    </script>
@endpush