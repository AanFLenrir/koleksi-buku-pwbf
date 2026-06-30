@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM THEME – Vendor Scan QR Pesanan
           ========================================================== */

        /* ---------- Background ---------- */
        #farm-vendor-scan-page,
        #farm-vendor-scan-page .main-panel,
        #farm-vendor-scan-page .content-wrapper,
        #farm-vendor-scan-page .row {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-vendor-scan {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSunVendorScan 4s ease-in-out infinite alternate !important;
            z-index: 0 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSunVendorScan {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-vendor-scan {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 0 !important;
            pointer-events: none !important;
            animation: moveCloudVendorScan 25s linear infinite !important;
        }

        .cloud-vendor-scan::before,
        .cloud-vendor-scan::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }

        .cloud-vendor-scan-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-vendor-scan-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-vendor-scan-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }

        .cloud-vendor-scan-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-vendor-scan-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-vendor-scan-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloudVendorScan {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-vendor-scan {
            position: fixed !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 60px !important;
            background: #2e7d32 !important;
            z-index: 0 !important;
            border-top: 4px solid #1b5e20 !important;
            pointer-events: none !important;
        }

        .grass-vendor-scan::before {
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
            animation: swayGrassVendorScan 3s ease-in-out infinite alternate !important;
        }

        @keyframes swayGrassVendorScan {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-vendor-scan {
            position: fixed !important;
            bottom: 50px !important;
            left: 0 !important;
            right: 0 !important;
            height: 30px !important;
            display: flex !important;
            justify-content: space-around !important;
            padding: 0 10px !important;
            z-index: 1 !important;
            pointer-events: none !important;
        }

        .fence-vendor-scan .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }

        .fence-vendor-scan .post::before {
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

        /* ---------- Hewan Berjalan ---------- */
        .walking-animals-vendor-scan {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 2 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkVendorScan 20s linear infinite !important;
        }

        .walking-animals-vendor-scan i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bounceVendorScan 1.2s ease-in-out infinite alternate !important;
        }

        .walking-animals-vendor-scan i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-vendor-scan i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-vendor-scan i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkVendorScan {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceVendorScan {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-animals-vendor-scan {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-animals-vendor-scan i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatVendorScan 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-animals-vendor-scan i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-animals-vendor-scan i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-animals-vendor-scan i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-animals-vendor-scan i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatVendorScan {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Card ---------- */
        #farm-vendor-scan-page .card {
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

        #farm-vendor-scan-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-vendor-scan-page .card-header {
            padding: 0.8rem 1.2rem !important;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2) !important;
            font-weight: 700 !important;
            border-radius: 32px 32px 0 0 !important;
            background: rgba(255, 255, 255, 0.15) !important;
            color: #1b3a2b !important;
        }

        #farm-vendor-scan-page .card-header.bg-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        #farm-vendor-scan-page .card-body {
            padding: 1.2rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Tombol ---------- */
        #farm-vendor-scan-page .btn {
            border-radius: 50px !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
            padding: 0.5rem 1.2rem !important;
        }

        #farm-vendor-scan-page .btn-secondary {
            background: rgba(255,255,255,0.2) !important;
            color: #1b3a2b !important;
            border: 1px solid rgba(255,215,0,0.2) !important;
        }

        #farm-vendor-scan-page .btn-secondary:hover {
            background: rgba(255,255,255,0.4) !important;
            transform: translateY(-2px) !important;
        }

        /* ---------- Scanner ---------- */
        #farm-vendor-scan-page #reader {
            border-radius: 24px !important;
            overflow: hidden !important;
            border: 2px solid rgba(255, 215, 0, 0.3) !important;
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.05), 0 20px 40px -12px rgba(0, 0, 0, 0.2) !important;
            background: rgba(0,0,0,0.1) !important;
            backdrop-filter: blur(8px) !important;
        }

        #farm-vendor-scan-page #reader video {
            border-radius: 20px !important;
        }

        /* ---------- Result ---------- */
        #farm-vendor-scan-page #result {
            margin-top: 1rem !important;
            padding: 1rem !important;
            border-radius: 20px !important;
            background: rgba(255,255,255,0.15) !important;
            backdrop-filter: blur(8px) !important;
            border: 1px solid rgba(255,215,0,0.2) !important;
        }

        #farm-vendor-scan-page #result h5 {
            color: #1b3a2b !important;
            font-weight: 700 !important;
        }

        #farm-vendor-scan-page #result ul {
            color: #1b3a2b !important;
            list-style: none;
            padding-left: 0;
        }

        #farm-vendor-scan-page #result ul li {
            padding: 0.2rem 0;
            border-bottom: 1px solid rgba(255,215,0,0.1);
        }

        #farm-vendor-scan-page .text-danger {
            color: #d32f2f !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-vendor-scan-page .card-body { padding: 1rem !important; }
            #farm-vendor-scan-page .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-animals-vendor-scan i { display: none !important; }
            .walking-animals-vendor-scan { display: none !important; }
            .fence-vendor-scan { display: none !important; }
            .grass-vendor-scan { height: 30px !important; }
            .cloud-vendor-scan { display: none !important; }
            .sun-vendor-scan { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
            #farm-vendor-scan-page #reader { width: 100% !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-vendor-scan-page">

        {{-- Dekorasi --}}
        <div class="sun-vendor-scan"></div>
        <div class="cloud-vendor-scan cloud-vendor-scan-1"></div>
        <div class="cloud-vendor-scan cloud-vendor-scan-2"></div>
        <div class="grass-vendor-scan"></div>
        <div class="fence-vendor-scan">
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
        <div class="walking-animals-vendor-scan">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>
        <div class="floating-animals-vendor-scan">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        {{-- ===== KONTEN ASLI ===== --}}
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-qrcode me-2"></i> Vendor Scan QR Pesanan
                        </h5>
                    </div>
                    <div class="card-body p-2">
                        <div id="reader" style="width:100%;"></div>
                    </div>
                    <div class="card-body" id="result" style="display:none;"></div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /#farm-vendor-scan-page --}}
@endsection

@push('scripts')
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start(
            { facingMode: "environment" },
            { fps: 10, qrbox: 200 },
            (decodedText) => {
                fetch(`/vendor/scan-qr/cek/${decodedText}`)
                    .then(res => res.json())
                    .then(data => {
                        const resultDiv = document.getElementById('result');
                        resultDiv.style.display = 'block';
                        if (data.status === 'found') {
                            let menu = data.menu.map(m => `<li><i class="fas fa-tag me-2" style="color:#ffd700;"></i>${m.nama_menu} <span class="badge bg-light text-dark ms-1">×${m.qty}</span> - Rp${m.harga}</li>`).join('');
                            resultDiv.innerHTML = `
                                <h5><i class="fas fa-receipt me-2" style="color:#2e7d32;"></i> Order: ${data.order_code}</h5>
                                <ul>${menu}</ul>
                                <p><strong>Status:</strong> <span class="badge bg-success">${data.status_bayar}</span></p>
                            `;
                        } else {
                            resultDiv.innerHTML = '<p class="text-danger"><i class="fas fa-exclamation-circle me-2"></i> Pesanan tidak ditemukan</p>';
                        }
                    });
            }
        );
    </script>
@endpush