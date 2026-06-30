@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM THEME – Data Customer
           ========================================================== */

        /* ---------- Background ---------- */
        #farm-customer-index-page,
        #farm-customer-index-page .main-panel,
        #farm-customer-index-page .content-wrapper,
        #farm-customer-index-page .container-fluid {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-customer-index {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSunCustomerIndex 4s ease-in-out infinite alternate !important;
            z-index: 0 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSunCustomerIndex {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-customer-index {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 0 !important;
            pointer-events: none !important;
            animation: moveCloudCustomerIndex 25s linear infinite !important;
        }

        .cloud-customer-index::before,
        .cloud-customer-index::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }

        .cloud-customer-index-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-customer-index-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-customer-index-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }

        .cloud-customer-index-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-customer-index-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-customer-index-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloudCustomerIndex {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-customer-index {
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

        .grass-customer-index::before {
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
            animation: swayGrassCustomerIndex 3s ease-in-out infinite alternate !important;
        }

        @keyframes swayGrassCustomerIndex {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-customer-index {
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

        .fence-customer-index .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }

        .fence-customer-index .post::before {
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
        .walking-animals-customer-index {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 2 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkCustomerIndex 20s linear infinite !important;
        }

        .walking-animals-customer-index i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bounceCustomerIndex 1.2s ease-in-out infinite alternate !important;
        }

        .walking-animals-customer-index i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-customer-index i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-customer-index i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkCustomerIndex {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceCustomerIndex {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-animals-customer-index {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-animals-customer-index i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatCustomerIndex 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-animals-customer-index i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-animals-customer-index i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-animals-customer-index i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-animals-customer-index i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatCustomerIndex {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Card ---------- */
        #farm-customer-index-page .card {
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

        #farm-customer-index-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-customer-index-page .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Buttons ---------- */
        #farm-customer-index-page .btn {
            border-radius: 50px !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
            padding: 0.4rem 1.2rem !important;
        }

        #farm-customer-index-page .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
            box-shadow: 0 6px 16px -4px rgba(46, 125, 50, 0.3) !important;
        }

        #farm-customer-index-page .btn-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(46, 125, 50, 0.5) !important;
            background: linear-gradient(135deg, #388e3c, #1b5e20) !important;
            color: #fff !important;
        }

        #farm-customer-index-page .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 16px -4px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-customer-index-page .btn-success:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(255, 215, 0, 0.5) !important;
            background: linear-gradient(135deg, #ffe082, #f57c00) !important;
            color: #1b3a2b !important;
        }

        /* ---------- Alert ---------- */
        #farm-customer-index-page .alert-success {
            background: rgba(46, 125, 50, 0.15) !important;
            border: 1px solid rgba(46, 125, 50, 0.3) !important;
            border-radius: 50px !important;
            color: #1b3a2b !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }

        /* ---------- Table ---------- */
        #farm-customer-index-page .table {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            margin-top: -8px !important;
            color: #1b3a2b !important;
        }

        #farm-customer-index-page .table thead th {
            background: rgba(27, 58, 43, 0.08) !important;
            backdrop-filter: blur(4px) !important;
            color: #1b3a2b !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            font-size: 0.8rem !important;
            padding: 0.9rem 1rem !important;
            border: none !important;
            border-radius: 16px 16px 0 0 !important;
        }

        #farm-customer-index-page .table tbody tr {
            background: rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 16px !important;
            transition: all 0.2s !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02) !important;
        }

        #farm-customer-index-page .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.4) !important;
            transform: scale(1.005) !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04) !important;
        }

        #farm-customer-index-page .table tbody td {
            padding: 0.8rem 1rem !important;
            border: none !important;
            color: #1b3a2b !important;
            vertical-align: middle !important;
        }

        #farm-customer-index-page .table tbody td:first-child {
            border-radius: 16px 0 0 16px !important;
        }

        #farm-customer-index-page .table tbody td:last-child {
            border-radius: 0 16px 16px 0 !important;
        }

        /* ---------- Badge ---------- */
        #farm-customer-index-page .badge {
            border-radius: 50px !important;
            font-weight: 600 !important;
            padding: 0.3rem 0.8rem !important;
        }

        #farm-customer-index-page .badge.bg-primary {
            background: #2e7d32 !important;
        }

        #farm-customer-index-page .badge.bg-success {
            background: #ffd700 !important;
            color: #1b3a2b !important;
        }

        #farm-customer-index-page .badge.bg-secondary {
            background: rgba(27,58,43,0.3) !important;
        }

        /* ---------- Image ---------- */
        #farm-customer-index-page img.rounded-circle {
            border: 2px solid rgba(255, 215, 0, 0.3) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
            transition: transform 0.3s !important;
        }

        #farm-customer-index-page img.rounded-circle:hover {
            transform: scale(1.1) !important;
        }

        .bg-secondary {
            background-color: rgba(27,58,43,0.2) !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-customer-index-page .card-body { padding: 1rem !important; }
            #farm-customer-index-page .table thead th,
            #farm-customer-index-page .table tbody td { padding: 0.5rem 0.6rem !important; }
            #farm-customer-index-page .btn { padding: 0.3rem 0.8rem !important; font-size: 0.8rem !important; }
            .floating-animals-customer-index i { display: none !important; }
            .walking-animals-customer-index { display: none !important; }
            .fence-customer-index { display: none !important; }
            .grass-customer-index { height: 30px !important; }
            .cloud-customer-index { display: none !important; }
            .sun-customer-index { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-customer-index-page">

        {{-- Dekorasi --}}
        <div class="sun-customer-index"></div>
        <div class="cloud-customer-index cloud-customer-index-1"></div>
        <div class="cloud-customer-index cloud-customer-index-2"></div>
        <div class="grass-customer-index"></div>
        <div class="fence-customer-index">
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
        <div class="walking-animals-customer-index">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>
        <div class="floating-animals-customer-index">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        {{-- ===== KONTEN ASLI ===== --}}
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">
                    <i class="fas fa-users me-2" style="color: #ffd700;"></i> Data Customer
                </h4>
                <div class="d-flex gap-2">
                    <a href="{{ route('customer.create1') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-camera me-1"></i> Tambah Customer 1 (Blob)
                    </a>
                    <a href="{{ route('customer.create2') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-camera-plus me-1"></i> Tambah Customer 2 (File)
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>No. Telepon</th>
                                    <th>Jenis Foto</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customers as $i => $customer)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        @if($customer->photo_blob)
                                            <img src="{{ $customer->photo_blob }}"
                                                 alt="foto" class="rounded-circle"
                                                 style="width:50px;height:50px;object-fit:cover;">
                                        @elseif($customer->photo_path)
                                            <img src="{{ asset('storage/' . $customer->photo_path) }}"
                                                 alt="foto" class="rounded-circle"
                                                 style="width:50px;height:50px;object-fit:cover;">
                                        @else
                                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                                                 style="width:50px;height:50px;">
                                                <i class="fas fa-user text-white fs-4"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone ?? '-' }}</td>
                                    <td>
                                        @if($customer->photo_blob)
                                            <span class="badge bg-primary">Blob</span>
                                        @elseif($customer->photo_path)
                                            <span class="badge bg-success">File</span>
                                        @else
                                            <span class="badge bg-secondary">Guest</span>
                                        @endif
                                    </td>
                                    <td>{{ $customer->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block text-secondary"></i>
                                        Belum ada data customer
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /#farm-customer-index-page --}}
@endsection