@extends('layouts.app')

@section('title', 'Kunjungan Toko - FarmNex')

@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM NEX – Kunjungan Toko (Natural + Futuristik)
           ========================================================== */

        /* ---------- Background Langit & Rumput ---------- */
        #farm-kunjungan-page,
        #farm-kunjungan-page .main-panel,
        #farm-kunjungan-page .content-wrapper,
        #farm-kunjungan-page .container-fluid {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-farm-kunjungan {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSunKunjungan 4s ease-in-out infinite alternate !important;
            z-index: 1 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSunKunjungan {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan Bergerak ---------- */
        .cloud-farm-kunjungan {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 1 !important;
            pointer-events: none !important;
            animation: moveCloudKunjungan 25s linear infinite !important;
        }
        .cloud-farm-kunjungan::before,
        .cloud-farm-kunjungan::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }
        .cloud-farm-kunjungan-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-farm-kunjungan-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-farm-kunjungan-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }
        .cloud-farm-kunjungan-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-farm-kunjungan-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-farm-kunjungan-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloudKunjungan {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-farm-kunjungan {
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
        .grass-farm-kunjungan::before {
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
            animation: swayGrassKunjungan 3s ease-in-out infinite alternate !important;
        }
        @keyframes swayGrassKunjungan {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar Kayu ---------- */
        .fence-farm-kunjungan {
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
        .fence-farm-kunjungan .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }
        .fence-farm-kunjungan .post::before {
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
        .walking-animals-kunjungan {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 3 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkKunjungan 20s linear infinite !important;
        }
        .walking-animals-kunjungan i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bounceAnimalKunjungan 1.2s ease-in-out infinite alternate !important;
        }
        .walking-animals-kunjungan i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-kunjungan i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-kunjungan i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkKunjungan {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }
        @keyframes bounceAnimalKunjungan {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang (langit) ---------- */
        .floating-farm-kunjungan {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-farm-kunjungan i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatKunjungan 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-farm-kunjungan i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-kunjungan i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-kunjungan i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-kunjungan i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatKunjungan {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Cards ---------- */
        #farm-kunjungan-page .card {
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

        #farm-kunjungan-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-kunjungan-page .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        #farm-kunjungan-page .card-header {
            background: rgba(255, 255, 255, 0.15) !important;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2) !important;
            font-weight: 700 !important;
            color: #1b3a2b !important;
            padding: 0.8rem 1.2rem !important;
            border-radius: 32px 32px 0 0 !important;
        }

        #farm-kunjungan-page .card-header.bg-success {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        /* ---------- Header Halaman ---------- */
        #farm-kunjungan-page .page-title {
            font-weight: 700 !important;
            color: #fff !important;
            text-shadow: 0 2px 20px rgba(0,0,0,0.3) !important;
            position: relative;
            z-index: 5;
        }

        #farm-kunjungan-page .page-title i {
            color: #ffd700 !important;
            filter: drop-shadow(0 0 15px rgba(255,215,0,0.3));
        }

        /* ---------- Tombol ---------- */
        #farm-kunjungan-page .btn {
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

        #farm-kunjungan-page .btn::after {
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

        #farm-kunjungan-page .btn:hover::after {
            opacity: 1 !important;
        }

        #farm-kunjungan-page .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
            box-shadow: 0 6px 20px rgba(46, 125, 50, 0.4) !important;
        }

        #farm-kunjungan-page .btn-primary:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 12px 30px rgba(46, 125, 50, 0.6) !important;
        }

        #farm-kunjungan-page .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-kunjungan-page .btn-success:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.5) !important;
        }

        /* ---------- Tabel ---------- */
        #farm-kunjungan-page .table {
            border-collapse: separate !important;
            border-spacing: 0 4px !important;
            color: #1b3a2b !important;
        }

        #farm-kunjungan-page .table thead th {
            background: rgba(27, 58, 43, 0.1) !important;
            backdrop-filter: blur(4px) !important;
            color: #1b3a2b !important;
            font-weight: 700 !important;
            font-size: 0.75rem !important;
            text-transform: uppercase !important;
            border: none !important;
            padding: 0.6rem 0.8rem !important;
        }

        #farm-kunjungan-page .table tbody tr {
            background: rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 12px !important;
            transition: all 0.2s !important;
        }

        #farm-kunjungan-page .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.4) !important;
            transform: scale(1.01) !important;
        }

        #farm-kunjungan-page .table tbody td {
            padding: 0.6rem 0.8rem !important;
            border: none !important;
            color: #1b3a2b !important;
            vertical-align: middle !important;
        }

        #farm-kunjungan-page .badge {
            border-radius: 50px !important;
            padding: 0.3rem 0.8rem !important;
            font-weight: 600 !important;
        }

        #farm-kunjungan-page .badge.bg-success {
            background: #2e7d32 !important;
        }

        #farm-kunjungan-page .badge.bg-danger {
            background: #d32f2f !important;
        }

        /* ---------- Scanner ---------- */
        #reader {
            border-radius: 20px !important;
            overflow: hidden !important;
            border: 2px solid rgba(255, 215, 0, 0.3) !important;
            background: rgba(0,0,0,0.05) !important;
        }

        #reader video {
            border-radius: 20px !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-kunjungan-page .card-body { padding: 1rem !important; }
            #farm-kunjungan-page .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-farm-kunjungan i { display: none !important; }
            .walking-animals-kunjungan { display: none !important; }
            .fence-farm-kunjungan { display: none !important; }
            .grass-farm-kunjungan { height: 30px !important; }
            .cloud-farm-kunjungan { display: none !important; }
            .sun-farm-kunjungan { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-kunjungan-page">

        {{-- Elemen Dekoratif --}}
        <div class="sun-farm-kunjungan"></div>
        <div class="cloud-farm-kunjungan cloud-farm-kunjungan-1"></div>
        <div class="cloud-farm-kunjungan cloud-farm-kunjungan-2"></div>
        <div class="grass-farm-kunjungan"></div>
        <div class="fence-farm-kunjungan">
            <span class="post"></span><span class="post"></span><span class="post"></span>
            <span class="post"></span><span class="post"></span><span class="post"></span>
            <span class="post"></span><span class="post"></span><span class="post"></span>
            <span class="post"></span>
        </div>
        <div class="walking-animals-kunjungan">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>

        {{-- Hewan Melayang --}}
        <div class="floating-farm-kunjungan">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        <div class="container-fluid py-4">
            <h4 class="fw-bold mb-4 page-title">
                <i class="fas fa-map-marker-alt"></i> Kunjungan Toko
            </h4>

            <div class="row">
                {{-- PANEL SCAN + KUNJUNGAN --}}
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header fw-bold">
                            <i class="fas fa-qrcode me-2"></i>Step 1: Scan Barcode Toko
                        </div>
                        <div class="card-body text-center">
                            <p class="text-muted small">Arahkan kamera ke barcode pada label toko</p>
                            <div id="reader" style="width:100%;"></div>
                            <audio id="beep-sound" src="{{ asset('sounds/beep.mp3') }}" preload="auto"></audio>
                        </div>
                    </div>

                    {{-- INFO TOKO --}}
                    <div class="card shadow-sm mb-4" id="card-toko" style="display:none;">
                        <div class="card-header fw-bold bg-success text-white">
                            <i class="fas fa-store me-2"></i>Informasi Toko
                        </div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <tr><td width="40%"><strong>Nama Toko</strong></td><td id="info-nama">-</td></tr>
                                <tr><td><strong>Alamat</strong></td><td id="info-alamat">-</td></tr>
                                <tr><td><strong>Lat/Lng Toko</strong></td><td id="info-latlng">-</td></tr>
                                <tr><td><strong>Accuracy Toko</strong></td><td id="info-acc-toko">-</td></tr>
                            </table>
                        </div>
                    </div>

                    {{-- AMBIL LOKASI SALES --}}
                    <div class="card shadow-sm mb-4" id="card-lokasi" style="display:none;">
                        <div class="card-header fw-bold">
                            <i class="fas fa-satellite me-2"></i>Step 2: Ambil Lokasi Sales
                        </div>
                        <div class="card-body text-center">
                            <button class="btn btn-primary" onclick="ambilLokasiSales()">
                                <i class="fas fa-location-dot me-2"></i>Ambil Lokasi Saya Sekarang
                            </button>
                            <div id="status-sales" class="mt-3 text-muted small"></div>

                            <div id="info-sales" class="mt-3" style="display:none;">
                                <table class="table table-sm text-start">
                                    <tr><td width="50%"><strong>Lat/Lng Sales</strong></td><td id="sales-latlng">-</td></tr>
                                    <tr><td><strong>Accuracy Sales</strong></td><td id="sales-acc">-</td></tr>
                                </table>
                                <button class="btn btn-success w-100 mt-2" onclick="kirimKunjungan()">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Laporan Kunjungan
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- HASIL KUNJUNGAN --}}
                    <div class="card shadow-sm mb-4" id="card-hasil" style="display:none;">
                        <div class="card-body text-center">
                            <h4 id="hasil-icon">-</h4>
                            <h5 id="hasil-teks">-</h5>
                            <p class="text-muted small" id="hasil-detail">-</p>
                            <button class="btn btn-primary mt-2" onclick="scanLagi()">
                                <i class="fas fa-sync me-2"></i>Scan Toko Lain
                            </button>
                        </div>
                    </div>
                </div>

                {{-- RIWAYAT KUNJUNGAN --}}
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold">
                            <i class="fas fa-history me-2"></i>Riwayat Kunjungan Saya
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Toko</th>
                                        <th>Jarak</th>
                                        <th>Status</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($riwayat as $r)
                                    <tr>
                                        <td>{{ $r->toko->nama_toko }}</td>
                                        <td>{{ number_format($r->jarak_meter, 1) }} m</td>
                                        <td>
                                            @if($r->status === 'diterima')
                                                <span class="badge bg-success">✅ Diterima</span>
                                            @else
                                                <span class="badge bg-danger">❌ Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="small text-muted">{{ $r->created_at->format('d/m H:i') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-3">Belum ada riwayat kunjungan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hidden input untuk data toko hasil scan --}}
        <input type="hidden" id="toko-id" value="">
        <input type="hidden" id="toko-lat" value="">
        <input type="hidden" id="toko-lng" value="">
        <input type="hidden" id="toko-acc" value="">
        <input type="hidden" id="sales-latitude" value="">
        <input type="hidden" id="sales-longitude" value="">
        <input type="hidden" id="sales-accuracy" value="">

    </div>{{-- /#farm-kunjungan-page --}}
@endsection

@push('scripts')
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        let scanner   = null;
        let sudahScan = false;

        // ── Auto start scanner ──
        window.onload = function () { mulaiScan(); };

        function mulaiScan() {
            sudahScan = false;
            document.getElementById('card-toko').style.display   = 'none';
            document.getElementById('card-lokasi').style.display = 'none';
            document.getElementById('card-hasil').style.display  = 'none';
            document.getElementById('reader').innerHTML          = '';

            scanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: { width: 300, height: 150 } });
            scanner.render(onScanSuccess, () => {});
        }

        function onScanSuccess(decodedText) {
            if (sudahScan) return;
            sudahScan = true;

            document.getElementById('beep-sound').play();
            scanner.clear();

            fetch(`{{ url('/toko/cari') }}/${encodeURIComponent(decodedText)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'found') {
                        // Simpan data toko ke hidden input
                        document.getElementById('toko-id').value  = data.id;
                        document.getElementById('toko-lat').value = data.latitude;
                        document.getElementById('toko-lng').value = data.longitude;
                        document.getElementById('toko-acc').value = data.accuracy;

                        // Tampilkan info toko
                        document.getElementById('info-nama').innerText   = data.nama_toko;
                        document.getElementById('info-alamat').innerText = data.alamat;
                        document.getElementById('info-latlng').innerText = `${data.latitude}, ${data.longitude}`;
                        document.getElementById('info-acc-toko').innerText = `${data.accuracy} meter`;

                        document.getElementById('card-toko').style.display   = 'block';
                        document.getElementById('card-lokasi').style.display = 'block';
                    } else {
                        alert('Toko tidak ditemukan! Pastikan barcode terdaftar.');
                        scanLagi();
                    }
                })
                .catch(() => {
                    alert('Gagal menghubungi server!');
                    scanLagi();
                });
        }

        // ── Ambil lokasi sales (pakai getAccuratePosition) ──
        function ambilLokasiSales() {
            const statusEl = document.getElementById('status-sales');
            statusEl.innerHTML = '⏳ Mengambil lokasi, harap tunggu...';
            statusEl.className = 'mt-3 text-muted small';

            getAccuratePosition(50, 20000)
                .then(pos => {
                    const lat = pos.coords.latitude;
                    const lng = pos.coords.longitude;
                    const acc = Math.round(pos.coords.accuracy);

                    document.getElementById('sales-latitude').value  = lat;
                    document.getElementById('sales-longitude').value = lng;
                    document.getElementById('sales-accuracy').value  = acc;

                    document.getElementById('sales-latlng').innerText = `${lat}, ${lng}`;
                    document.getElementById('sales-acc').innerText    = `${acc} meter`;

                    statusEl.innerHTML = `✅ Lokasi berhasil! Accuracy: <strong>${acc}m</strong>`;
                    statusEl.className = 'mt-3 text-success small';
                    document.getElementById('info-sales').style.display = 'block';
                })
                .catch(err => {
                    statusEl.innerHTML = '❌ Gagal: ' + err.message;
                    statusEl.className = 'mt-3 text-danger small';
                });
        }

        // ── Kirim laporan kunjungan ke server ──
        function kirimKunjungan() {
            const payload = {
                toko_id:         document.getElementById('toko-id').value,
                latitude_sales:  document.getElementById('sales-latitude').value,
                longitude_sales: document.getElementById('sales-longitude').value,
                accuracy_sales:  document.getElementById('sales-accuracy').value,
                _token:          '{{ csrf_token() }}'
            };

            fetch('{{ route("toko.simpanKunjungan") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('card-toko').style.display   = 'none';
                document.getElementById('card-lokasi').style.display = 'none';
                document.getElementById('card-hasil').style.display  = 'block';

                if (data.status === 'diterima') {
                    document.getElementById('hasil-icon').innerText  = '✅';
                    document.getElementById('hasil-teks').innerText  = 'Kunjungan DITERIMA!';
                    document.getElementById('hasil-teks').className  = 'text-success';
                } else {
                    document.getElementById('hasil-icon').innerText  = '❌';
                    document.getElementById('hasil-teks').innerText  = 'Kunjungan DITOLAK!';
                    document.getElementById('hasil-teks').className  = 'text-danger';
                }

                document.getElementById('hasil-detail').innerText =
                    `Jarak: ${data.jarak} m | Threshold: ${data.threshold} m`;
            })
            .catch(() => alert('Gagal mengirim laporan!'));
        }

        function scanLagi() {
            document.getElementById('info-sales').style.display  = 'none';
            document.getElementById('status-sales').innerHTML    = '';
            mulaiScan();
        }

        // ── Fungsi getAccuratePosition (Lampiran 1 modul) ──
        function getAccuratePosition(targetAccuracy = 50, maxWait = 20000) {
            return new Promise((resolve, reject) => {
                let bestResult = null;
                const startTime = Date.now();

                const watchId = navigator.geolocation.watchPosition(
                    (position) => {
                        const acc = position.coords.accuracy;

                        if (!bestResult || acc < bestResult.coords.accuracy) {
                            bestResult = position;
                            const statusEl = document.getElementById('status-sales');
                            if (statusEl) statusEl.innerHTML =
                                `⏳ Mencari lokasi terbaik... accuracy: <strong>${Math.round(acc)}m</strong>`;
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