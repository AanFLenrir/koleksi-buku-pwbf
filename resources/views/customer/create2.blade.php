@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM THEME – Tambah Customer 2 (Foto File)
           ========================================================== */

        /* ---------- Background ---------- */
        #farm-customer2-page,
        #farm-customer2-page .main-panel,
        #farm-customer2-page .content-wrapper,
        #farm-customer2-page .container-fluid {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-customer2 {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSunCustomer2 4s ease-in-out infinite alternate !important;
            z-index: 0 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSunCustomer2 {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-customer2 {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 0 !important;
            pointer-events: none !important;
            animation: moveCloudCustomer2 25s linear infinite !important;
        }

        .cloud-customer2::before,
        .cloud-customer2::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }

        .cloud-customer2-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-customer2-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-customer2-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }

        .cloud-customer2-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-customer2-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-customer2-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloudCustomer2 {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-customer2 {
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

        .grass-customer2::before {
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
            animation: swayGrassCustomer2 3s ease-in-out infinite alternate !important;
        }

        @keyframes swayGrassCustomer2 {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-customer2 {
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

        .fence-customer2 .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }

        .fence-customer2 .post::before {
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
        .walking-animals-customer2 {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 2 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkCustomer2 20s linear infinite !important;
        }

        .walking-animals-customer2 i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bounceCustomer2 1.2s ease-in-out infinite alternate !important;
        }

        .walking-animals-customer2 i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-customer2 i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-customer2 i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkCustomer2 {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceCustomer2 {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-animals-customer2 {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-animals-customer2 i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatCustomer2 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-animals-customer2 i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-animals-customer2 i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-animals-customer2 i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-animals-customer2 i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatCustomer2 {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Card ---------- */
        #farm-customer2-page .card {
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

        #farm-customer2-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-customer2-page .card-header {
            padding: 0.8rem 1.2rem !important;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2) !important;
            font-weight: 700 !important;
            border-radius: 32px 32px 0 0 !important;
            background: rgba(255, 255, 255, 0.15) !important;
            color: #1b3a2b !important;
        }

        #farm-customer2-page .card-header.bg-success {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        #farm-customer2-page .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Form Elements ---------- */
        #farm-customer2-page .form-control {
            background: rgba(255, 255, 255, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.2rem !important;
            color: #1b3a2b !important;
            transition: all 0.3s !important;
        }

        #farm-customer2-page .form-control:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15) !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }

        #farm-customer2-page .form-label {
            color: #1b3a2b !important;
            font-weight: 600 !important;
        }

        /* ---------- Buttons ---------- */
        #farm-customer2-page .btn {
            border-radius: 50px !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
            padding: 0.5rem 1.2rem !important;
        }

        #farm-customer2-page .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 16px -4px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-customer2-page .btn-success:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(255, 215, 0, 0.5) !important;
            background: linear-gradient(135deg, #ffe082, #f57c00) !important;
            color: #1b3a2b !important;
        }

        #farm-customer2-page .btn-success:disabled {
            opacity: 0.6 !important;
            transform: none !important;
        }

        #farm-customer2-page .btn-outline-secondary {
            background: rgba(255,255,255,0.2) !important;
            color: #1b3a2b !important;
            border: 1px solid rgba(255,215,0,0.2) !important;
        }

        #farm-customer2-page .btn-outline-secondary:hover {
            background: rgba(255,255,255,0.4) !important;
            transform: translateY(-2px) !important;
        }

        /* ---------- Alert ---------- */
        #farm-customer2-page .alert-danger {
            background: rgba(255,82,82,0.12) !important;
            border: 1px solid rgba(255,82,82,0.25) !important;
            border-radius: 50px !important;
            color: #d32f2f !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }

        #farm-customer2-page .alert-info {
            background: rgba(46, 125, 50, 0.15) !important;
            border: 1px solid rgba(46, 125, 50, 0.3) !important;
            border-radius: 50px !important;
            color: #1b3a2b !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }

        /* ---------- Video & Preview ---------- */
        #farm-customer2-page video {
            border-radius: 24px !important;
            border: 2px solid rgba(255, 215, 0, 0.3) !important;
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.05), 0 10px 30px rgba(0, 0, 0, 0.1) !important;
            max-height: 300px !important;
            background: #1b3a2b !important;
        }

        #farm-customer2-page #previewImg {
            border-radius: 24px !important;
            border: 2px solid rgba(255, 215, 0, 0.3) !important;
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.05), 0 10px 30px rgba(0, 0, 0, 0.1) !important;
            max-width: 100% !important;
            max-height: 250px !important;
            object-fit: cover !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-customer2-page .card-body { padding: 1rem !important; }
            #farm-customer2-page .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-animals-customer2 i { display: none !important; }
            .walking-animals-customer2 { display: none !important; }
            .fence-customer2 { display: none !important; }
            .grass-customer2 { height: 30px !important; }
            .cloud-customer2 { display: none !important; }
            .sun-customer2 { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-customer2-page">

        {{-- Dekorasi --}}
        <div class="sun-customer2"></div>
        <div class="cloud-customer2 cloud-customer2-1"></div>
        <div class="cloud-customer2 cloud-customer2-2"></div>
        <div class="grass-customer2"></div>
        <div class="fence-customer2">
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
        <div class="walking-animals-customer2">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>
        <div class="floating-animals-customer2">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        {{-- ===== KONTEN ASLI ===== --}}
        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header bg-success text-white fw-semibold rounded-top-4">
                            <i class="fas fa-camera-plus me-2"></i>Tambah Customer 2 — Foto sebagai File
                        </div>
                        <div class="card-body">

                            @if($errors->any())
                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                            @endif

                            {{-- Preview Kamera --}}
                            <div class="mb-3 text-center">
                                <video id="video" autoplay playsinline
                                       class="rounded-3 border w-100"
                                       style="max-height:300px;background:#000;"></video>
                                <canvas id="canvas" style="display:none;"></canvas>
                            </div>

                            {{-- Preview Foto --}}
                            <div class="mb-3 text-center" id="previewContainer" style="display:none;">
                                <img id="previewImg" src="" alt="preview"
                                     class="rounded-3 border"
                                     style="max-width:100%;max-height:250px;object-fit:cover;">
                            </div>

                            {{-- Tombol Kamera --}}
                            <div class="d-flex gap-2 mb-4">
                                <button type="button" id="btnCapture" class="btn btn-success w-100">
                                    <i class="fas fa-camera me-1"></i> Ambil Foto
                                </button>
                                <button type="button" id="btnRetake" class="btn btn-outline-secondary w-100"
                                        style="display:none;">
                                    <i class="fas fa-redo me-1"></i> Ulangi
                                </button>
                            </div>

                            {{-- Info perbedaan --}}
                            <div class="alert alert-info small mb-3">
                                <i class="fas fa-info-circle me-1"></i>
                                <strong>Tambah Customer 2:</strong> Foto disimpan sebagai <strong>file .jpg</strong>
                                di storage, database hanya menyimpan <strong>path file</strong>-nya.
                            </div>

                            {{-- Form --}}
                            <form action="{{ route('customer.store2') }}" method="POST" id="form2">
                                @csrf
                                <input type="hidden" name="photo" id="photoData">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Customer</label>
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Masukkan nama..." value="{{ old('name') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">No. Telepon</label>
                                    <input type="text" name="phone" class="form-control"
                                           placeholder="Masukkan nomor telepon..." value="{{ old('phone') }}">
                                </div>

                                <button type="submit" id="btnSimpan" class="btn btn-success w-100" disabled>
                                    <i class="fas fa-save me-1"></i> Simpan Customer
                                </button>
                            </form>

                            <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /#farm-customer2-page --}}
@endsection

@push('scripts')
<script>
const video       = document.getElementById('video');
const canvas      = document.getElementById('canvas');
const previewImg  = document.getElementById('previewImg');
const previewCont = document.getElementById('previewContainer');
const btnCapture  = document.getElementById('btnCapture');
const btnRetake   = document.getElementById('btnRetake');
const btnSimpan   = document.getElementById('btnSimpan');
const photoData   = document.getElementById('photoData');

// Akses kamera
navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' }, audio: false })
    .then(stream => { video.srcObject = stream; })
    .catch(err => {
        alert('Tidak dapat mengakses kamera: ' + err.message);
    });

// Ambil foto
btnCapture.addEventListener('click', function () {
    canvas.width  = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    const dataUrl = canvas.toDataURL('image/jpeg', 0.8);

    // Simpan base64 ke hidden input
    // Controller akan decode & simpan sebagai file fisik
    photoData.value = dataUrl;

    previewImg.src = dataUrl;
    previewCont.style.display = 'block';
    video.style.display = 'none';

    btnCapture.style.display = 'none';
    btnRetake.style.display  = 'block';
    btnSimpan.disabled = false;
});

// Ulangi foto
btnRetake.addEventListener('click', function () {
    photoData.value = '';
    previewCont.style.display = 'none';
    video.style.display = 'block';
    btnCapture.style.display = 'block';
    btnRetake.style.display  = 'none';
    btnSimpan.disabled = true;
});
</script>
@endpush