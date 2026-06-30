@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM THEME – Riwayat Transaksi Lunas
           ========================================================== */

        /* ---------- Background ---------- */
        #farm-riwayat-page,
        #farm-riwayat-page .main-panel,
        #farm-riwayat-page .content-wrapper,
        #farm-riwayat-page .container-fluid {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-riwayat {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSunRiwayat 4s ease-in-out infinite alternate !important;
            z-index: 0 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSunRiwayat {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-riwayat {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 0 !important;
            pointer-events: none !important;
            animation: moveCloudRiwayat 25s linear infinite !important;
        }

        .cloud-riwayat::before,
        .cloud-riwayat::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }

        .cloud-riwayat-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-riwayat-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-riwayat-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }

        .cloud-riwayat-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-riwayat-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-riwayat-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloudRiwayat {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-riwayat {
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

        .grass-riwayat::before {
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
            animation: swayGrassRiwayat 3s ease-in-out infinite alternate !important;
        }

        @keyframes swayGrassRiwayat {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-riwayat {
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

        .fence-riwayat .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }

        .fence-riwayat .post::before {
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
        .walking-animals-riwayat {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 2 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkRiwayat 20s linear infinite !important;
        }

        .walking-animals-riwayat i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bounceRiwayat 1.2s ease-in-out infinite alternate !important;
        }

        .walking-animals-riwayat i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-riwayat i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-riwayat i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkRiwayat {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceRiwayat {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-animals-riwayat {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-animals-riwayat i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatRiwayat 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-animals-riwayat i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-animals-riwayat i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-animals-riwayat i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-animals-riwayat i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatRiwayat {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Cards ---------- */
        #farm-riwayat-page .card {
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

        #farm-riwayat-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-riwayat-page .card-header {
            padding: 0.8rem 1.2rem !important;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2) !important;
            font-weight: 700 !important;
            border-radius: 32px 32px 0 0 !important;
            background: rgba(255, 255, 255, 0.15) !important;
            color: #1b3a2b !important;
        }

        #farm-riwayat-page .card-body {
            padding: 1.2rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Buttons ---------- */
        #farm-riwayat-page .btn {
            border-radius: 50px !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
            padding: 0.5rem 1.2rem !important;
        }

        #farm-riwayat-page .btn-warning {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 16px -4px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-riwayat-page .btn-warning:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(255, 215, 0, 0.5) !important;
            background: linear-gradient(135deg, #ffe082, #f57c00) !important;
            color: #1b3a2b !important;
        }

        /* ---------- Badges ---------- */
        #farm-riwayat-page .badge {
            border-radius: 50px !important;
            font-weight: 600 !important;
            padding: 0.4rem 0.8rem !important;
        }

        #farm-riwayat-page .badge.bg-info {
            background: rgba(46, 125, 50, 0.2) !important;
            color: #1b3a2b !important;
        }

        #farm-riwayat-page .badge.bg-success {
            background: #2e7d32 !important;
        }

        /* ---------- Alert ---------- */
        #farm-riwayat-page .alert-info {
            background: rgba(46, 125, 50, 0.15) !important;
            border: 1px solid rgba(46, 125, 50, 0.3) !important;
            border-radius: 50px !important;
            color: #1b3a2b !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }

        /* ---------- Text & Colors ---------- */
        #farm-riwayat-page .text-danger {
            color: #d32f2f !important;
        }

        #farm-riwayat-page .text-success {
            color: #2e7d32 !important;
        }

        #farm-riwayat-page .text-muted {
            color: rgba(27, 58, 43, 0.6) !important;
        }

        #farm-riwayat-page .fw-bold {
            color: #1b3a2b !important;
        }

        #farm-riwayat-page .alert-info {
            background: rgba(46, 125, 50, 0.15) !important;
            border: 1px solid rgba(46, 125, 50, 0.3) !important;
            border-radius: 50px !important;
            color: #1b3a2b !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }

        /* ---------- Pagination ---------- */
        #farm-riwayat-page .pagination .page-link {
            border-radius: 50px !important;
            background: rgba(255, 255, 255, 0.2) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            color: #1b3a2b !important;
            transition: all 0.3s !important;
        }

        #farm-riwayat-page .pagination .page-link:hover {
            background: rgba(255, 215, 0, 0.3) !important;
        }

        #farm-riwayat-page .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            border-color: #2e7d32 !important;
            color: #fff !important;
        }

        /* ---------- QR Code ---------- */
        #farm-riwayat-page img {
            border-radius: 12px !important;
            background: rgba(255,255,255,0.3) !important;
            padding: 6px !important;
            border: 1px solid rgba(255,215,0,0.2) !important;
            transition: transform 0.3s !important;
        }

        #farm-riwayat-page img:hover {
            transform: scale(1.05) !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-riwayat-page .card-body { padding: 1rem !important; }
            #farm-riwayat-page .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-animals-riwayat i { display: none !important; }
            .walking-animals-riwayat { display: none !important; }
            .fence-riwayat { display: none !important; }
            .grass-riwayat { height: 30px !important; }
            .cloud-riwayat { display: none !important; }
            .sun-riwayat { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-riwayat-page">

        {{-- Dekorasi --}}
        <div class="sun-riwayat"></div>
        <div class="cloud-riwayat cloud-riwayat-1"></div>
        <div class="cloud-riwayat cloud-riwayat-2"></div>
        <div class="grass-riwayat"></div>
        <div class="fence-riwayat">
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
        <div class="walking-animals-riwayat">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>
        <div class="floating-animals-riwayat">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        {{-- ===== KONTEN ASLI ===== --}}
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">
                    <i class="fas fa-history me-2" style="color: #ffd700;"></i>Riwayat Transaksi Lunas
                </h4>
                <a href="{{ route('pos.index') }}" class="btn btn-warning">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke POS
                </a>
            </div>

            @if($orders->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> Belum ada transaksi lunas.
                </div>
            @else
                @foreach($orders as $order)
                <div class="card mb-3 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fw-bold">
                            <i class="fas fa-receipt me-2" style="color: #2e7d32;"></i>
                            {{ $order->order_code }}
                        </span>
                        <div>
                            @if($order->payment)
                            <span class="badge bg-info me-1">
                                <i class="fas fa-credit-card me-1"></i>
                                {{ strtoupper(str_replace('_', ' ', $order->payment->payment_type ?? 'tunai')) }}
                            </span>
                            @endif
                            <span class="badge bg-success">
                                <i class="fas fa-check-circle me-1"></i> LUNAS
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p class="mb-1">
                                    <i class="fas fa-user me-2" style="color: #2e7d32;"></i>
                                    <strong>{{ $order->customer->name }}</strong>
                                </p>
                                <ul class="mb-0 small text-muted" style="list-style: none; padding-left: 0;">
                                    @foreach($order->items as $item)
                                    <li>
                                        <i class="fas fa-tag me-1" style="color: #ffd700;"></i>
                                        {{ $item->barang->nama }}
                                        <span class="badge bg-light text-dark ms-1">× {{ $item->quantity }}</span>
                                        &mdash;
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- QR CODE --}}
                            <div class="col-md-3 text-center">
                                <img src="{{ route('qrcode.generate', $order->order_code) }}"
                                     alt="QR {{ $order->order_code }}"
                                     style="width: 100px; height: 100px;"
                                     title="QR Code: {{ $order->order_code }}">
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-qrcode me-1"></i> Scan QR
                                </small>
                            </div>

                            <div class="col-md-3 text-end">
                                <p class="fw-bold text-danger fs-5 mb-1">
                                    <i class="fas fa-coins me-1"></i>
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </p>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $order->updated_at->format('d/m/Y H:i') }}
                                </small>
                                @if($order->payment && $order->payment->paid_at)
                                <br>
                                <small class="text-success">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Dibayar: {{ $order->payment->paid_at->format('d/m/Y H:i') }}
                                </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>

    </div>{{-- /#farm-riwayat-page --}}
@endsection