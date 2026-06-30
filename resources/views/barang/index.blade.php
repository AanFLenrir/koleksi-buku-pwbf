@extends('layouts.app')

@section('title', 'Tag Harga - FarmNex')

@push('styles')
    {{-- DataTables & Font Awesome --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* ==========================================================
           EPIC FARM THEME – Tag Harga
           ========================================================== */

        /* ---------- Background & Layout ---------- */
        .content-wrapper {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            padding-bottom: 40px;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* ---------- Matahari ---------- */
        .sun-tag {
            position: fixed;
            top: 30px;
            right: 60px;
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSunTag 4s ease-in-out infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes pulseSunTag {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan Bergerak ---------- */
        .cloud-tag {
            position: fixed;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
            animation: moveCloudTag 25s linear infinite;
        }

        .cloud-tag::before,
        .cloud-tag::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud-tag-1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 28s;
        }
        .cloud-tag-1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud-tag-1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud-tag-2 {
            width: 220px;
            height: 60px;
            top: 130px;
            left: -300px;
            animation-duration: 32s;
            animation-delay: 6s;
        }
        .cloud-tag-2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud-tag-2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloudTag {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput di Bawah ---------- */
        .grass-tag {
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

        .grass-tag::before {
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
            animation: swayGrassTag 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrassTag {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar Kayu ---------- */
        .fence-tag {
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

        .fence-tag .post {
            width: 10px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence-tag .post::before {
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
        .walking-animals-tag {
            position: fixed;
            bottom: 55px;
            left: 0;
            right: 0;
            z-index: 3;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walkTag 20s linear infinite;
        }

        .walking-animals-tag i {
            font-size: 2.5rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceTag 1.2s ease-in-out infinite alternate;
        }

        .walking-animals-tag i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-tag i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-tag i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkTag {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceTag {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-farm-barang {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-farm-barang i {
            position: absolute;
            font-size: 3.5rem;
            color: rgba(255, 215, 0, 0.08);
            animation: floatTag 18s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1));
        }

        .floating-farm-barang i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-barang i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-barang i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-barang i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatTag {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Cards ---------- */
        .card {
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 32px;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
            z-index: 5;
        }

        .card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 215, 0, 0.4);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.15);
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
            font-weight: 700;
            color: #1b3a2b;
            padding: 0.8rem 1.2rem;
            border-radius: 32px 32px 0 0 !important;
        }

        .card-header.bg-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        .card-header.bg-secondary {
            background: linear-gradient(135deg, #1b3a2b, #2a5a3a) !important;
            color: #fff !important;
        }

        .card-header.bg-white {
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(4px);
            color: #1b3a2b;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }

        .card-body {
            padding: 1.5rem;
            color: #1b3a2b;
        }

        /* ---------- Form Elements ---------- */
        .form-control {
            background: rgba(255, 255, 255, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.2rem !important;
            color: #1b3a2b;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15) !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }

        .form-label {
            color: #1b3a2b;
            font-weight: 600;
        }

        .input-group-text {
            background: rgba(27, 58, 43, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px 0 0 50px;
            color: #1b3a2b;
            font-weight: 600;
        }

        .input-group .form-control {
            border-radius: 0 50px 50px 0 !important;
        }

        /* ---------- Buttons ---------- */
        .btn {
            border-radius: 50px;
            padding: 0.6rem 1.8rem;
            font-weight: 700;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            color: #fff;
            box-shadow: 0 6px 16px -4px rgba(46, 125, 50, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px -6px rgba(46, 125, 50, 0.5);
            background: linear-gradient(135deg, #388e3c, #1b5e20);
            color: #fff;
        }

        .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00);
            color: #1b3a2b;
            box-shadow: 0 6px 16px -4px rgba(255, 215, 0, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px -6px rgba(255, 215, 0, 0.5);
            background: linear-gradient(135deg, #ffe082, #f57c00);
            color: #1b3a2b;
        }

        .btn-warning {
            background: rgba(255, 215, 0, 0.15);
            color: #b8860b;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .btn-warning:hover {
            background: #ffd700;
            color: #1b3a2b;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(255, 215, 0, 0.3);
        }

        .btn-danger {
            background: rgba(255, 82, 82, 0.1);
            color: #d32f2f;
            border: 1px solid rgba(255, 82, 82, 0.15);
        }

        .btn-danger:hover {
            background: #ff5252;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(255, 82, 82, 0.3);
        }

        .btn-secondary {
            background: rgba(0, 0, 0, 0.06);
            color: #333;
        }

        .btn-secondary:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .btn-dark {
            background: #1b3a2b;
            color: #ffd700;
        }

        .btn-dark:hover {
            background: #2a5a3a;
            color: #ffd700;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 0.3rem 0.9rem;
            font-size: 0.8rem;
        }

        /* ---------- Alert ---------- */
        .alert-success {
            background: rgba(46, 125, 50, 0.15);
            border: 1px solid rgba(46, 125, 50, 0.3);
            border-radius: 50px;
            color: #1b3a2b;
            backdrop-filter: blur(4px);
            padding: 0.8rem 1.6rem;
            font-weight: 500;
        }

        .alert-success i {
            color: #2e7d32;
            margin-right: 10px;
        }

        /* ---------- Tables ---------- */
        .table {
            border-collapse: separate;
            border-spacing: 0 8px;
            margin-top: -8px;
            color: #1b3a2b;
        }

        .table thead th {
            background: rgba(27, 58, 43, 0.08);
            backdrop-filter: blur(4px);
            color: #1b3a2b;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.8rem;
            padding: 0.9rem 1rem;
            border: none;
            border-radius: 16px 16px 0 0;
        }

        .table tbody tr {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(4px);
            border-radius: 16px;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: scale(1.005);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
        }

        .table tbody td {
            padding: 0.8rem 1rem;
            border: none;
            color: #1b3a2b;
            vertical-align: middle;
        }

        .table tbody td:first-child {
            border-radius: 16px 0 0 16px;
        }

        .table tbody td:last-child {
            border-radius: 0 16px 16px 0;
        }

        .table .fw-semibold.text-success {
            color: #2e7d32 !important;
        }

        .table code {
            background: rgba(255, 255, 255, 0.6) !important;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.8rem;
            color: #1b3a2b;
        }

        /* ---------- Modals ---------- */
        .modal-content {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 28px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-bottom: 2px solid rgba(255, 215, 0, 0.2);
            border-radius: 28px 28px 0 0;
            padding: 1rem 1.5rem;
        }

        .modal-header.bg-warning {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
        }

        .modal-header.bg-danger {
            background: linear-gradient(135deg, #ff5252, #d32f2f) !important;
            color: #fff !important;
        }

        .modal-header.bg-success {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 215, 0, 0.1);
            padding: 1rem 1.5rem;
            border-radius: 0 0 28px 28px;
        }

        /* ---------- Grid Preview ---------- */
        #gridSidebar div, #gridModal div {
            transition: all 0.2s;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            .card-body { padding: 1rem; }
            .table thead th, .table tbody td { padding: 0.5rem 0.6rem; }
            .btn { padding: 0.4rem 1rem; font-size: 0.85rem; }
            .floating-farm-barang i { display: none; }
            .walking-animals-tag { display: none; }
            .fence-tag { display: none; }
            .grass-tag { height: 30px; }
            .cloud-tag { display: none; }
            .sun-tag { width: 40px; height: 40px; top: 15px; right: 20px; }
        }
    </style>
@endpush

@section('content')
    {{-- ===== DEKORASI ===== --}}
    <div class="sun-tag"></div>
    <div class="cloud-tag cloud-tag-1"></div>
    <div class="cloud-tag cloud-tag-2"></div>
    <div class="grass-tag"></div>
    <div class="fence-tag">
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
    <div class="walking-animals-tag">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>
    <div class="floating-farm-barang">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    {{-- ===== KONTEN UTAMA ===== --}}
    <div class="container-fluid py-4">
        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">

            {{-- ===== FORM TAMBAH ===== --}}
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4 fw-semibold">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Barang
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Barang</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                       maxlength="50" placeholder="Nama barang..." value="{{ old('nama') }}" required>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Harga (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                                           min="1" placeholder="0" value="{{ old('harga') }}" required>
                                    @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save me-2"></i>Simpan
                            </button>
                        </form>
                    </div>
                </div>

                {{-- INFO GRID KERTAS --}}
                <div class="card shadow-sm border-0 rounded-4 mt-4">
                    <div class="card-header bg-secondary text-white rounded-top-4 fw-semibold">
                        <i class="fas fa-th me-2"></i>Kertas Label TnJ No.108
                    </div>
                    <div class="card-body text-center">
                        <p class="text-muted small mb-2">
                            Layout: <strong>5 kolom × 8 baris = 40 label/lembar</strong>
                        </p>
                        <div id="gridSidebar" style="display:grid;grid-template-columns:repeat(5,1fr);gap:3px;max-width:220px;margin:0 auto">
                            @for($r = 1; $r <= 8; $r++)
                                @for($c = 1; $c <= 5; $c++)
                                    @php $n = ($r-1)*5+$c; @endphp
                                    <div style="border:1px solid #dee2e6;border-radius:3px;height:22px;
                                                font-size:9px;display:flex;align-items:center;
                                                justify-content:center;background:#fff;color:#aaa">
                                        {{ $n }}
                                    </div>
                                @endfor
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== TABEL DATA ===== --}}
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-white rounded-top-4 d-flex align-items-center justify-content-between border-bottom">
                        <span class="fw-semibold text-primary">
                            <i class="fas fa-tags me-2"></i>Data Barang
                        </span>
                        <button id="btnCetakTerpilih" class="btn btn-success btn-sm d-none"
                                data-bs-toggle="modal" data-bs-target="#modalCetak">
                            <i class="fas fa-print me-1"></i>Cetak Terpilih
                            (<span id="jumlahTerpilih">0</span>)
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="tblBarang" class="table table-hover align-middle w-100">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:40px">
                                        <input type="checkbox" id="checkAll" class="form-check-input">
                                    </th>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Waktu Input</th>
                                    <th style="width:110px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangs as $b)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input chk-barang"
                                               value="{{ $b->id_barang }}"
                                               data-nama="{{ $b->nama }}"
                                               data-harga="{{ $b->harga }}">
                                    </td>
                                    <td>
                                        <code class="bg-light px-2 py-1 rounded small">{{ $b->id_barang }}</code>
                                    </td>
                                    <td>{{ $b->nama }}</td>
                                    <td class="fw-semibold text-success">
                                        Rp {{ number_format($b->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="text-muted small">{{ $b->tgl_input }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm me-1"
                                                onclick="openEdit('{{ $b->id_barang }}','{{ addslashes($b->nama) }}',{{ $b->harga }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="confirmHapus('{{ $b->id_barang }}','{{ addslashes($b->nama) }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>{{-- /row --}}
    </div>

    {{-- ===== MODAL EDIT ===== --}}
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <form id="formEdit" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title fw-semibold"><i class="fas fa-edit me-2"></i>Edit Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">ID Barang</label>
                            <input type="text" id="editIdDisplay" class="form-control bg-light" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Barang</label>
                            <input type="text" name="nama" id="editNama" class="form-control" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="harga" id="editHarga" class="form-control" min="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ===== MODAL HAPUS ===== --}}
    <div class="modal fade" id="modalHapus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content rounded-4">
                <form id="formHapus" method="POST">
                    @csrf @method('DELETE')
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title fw-semibold"><i class="fas fa-trash me-2"></i>Hapus Barang</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Hapus <strong id="hapusNama"></strong>?</p>
                        <p class="text-muted small">Tindakan ini tidak bisa dibatalkan.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash me-1"></i>Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ===== MODAL CETAK ===== --}}
    <div class="modal fade" id="modalCetak" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-semibold"><i class="fas fa-print me-2"></i>Cetak Tag Harga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4 align-items-start">

                        {{-- Kiri: koordinat --}}
                        <div class="col-md-5">
                            <h6 class="fw-semibold"><i class="fas fa-crosshairs me-2 text-success"></i>Koordinat Awal Cetak</h6>
                            <p class="text-muted small">Tentukan posisi label <strong>pertama</strong> di kertas.
                               Berguna jika sebagian label sudah terpakai sebelumnya.</p>
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <label class="form-label fw-semibold small">Kolom X (1–5)</label>
                                    <input type="number" id="inputX" class="form-control" min="1" max="5" value="1">
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-semibold small">Baris Y (1–8)</label>
                                    <input type="number" id="inputY" class="form-control" min="1" max="8" value="1">
                                </div>
                            </div>
                            <div class="alert alert-info small py-2">
                                <i class="fas fa-lightbulb me-1"></i>
                                Mulai cetak dari label ke-<strong id="nomorLabel">1</strong>
                            </div>

                            <h6 class="fw-semibold mt-3 mb-2 small">
                                <i class="fas fa-tag me-1 text-primary"></i>Barang yang Dipilih:
                            </h6>
                            <ul id="listTerpilih" class="list-group list-group-flush small"
                                style="max-height:180px;overflow-y:auto"></ul>
                        </div>

                        {{-- Kanan: preview grid --}}
                        <div class="col-md-7">
                            <h6 class="fw-semibold text-center mb-3">
                                <i class="fas fa-th me-2 text-secondary"></i>Preview Posisi di Kertas
                            </h6>
                            <div id="gridModal"
                                 style="display:grid;grid-template-columns:repeat(5,1fr);gap:4px;max-width:320px;margin:0 auto">
                                @for($r = 1; $r <= 8; $r++)
                                    @for($c = 1; $c <= 5; $c++)
                                        @php $n = ($r-1)*5+$c; @endphp
                                        <div id="mc-{{ $r }}-{{ $c }}"
                                             style="border:1px solid #dee2e6;border-radius:4px;height:34px;
                                                    font-size:9px;display:flex;align-items:center;
                                                    justify-content:center;background:#fff;color:#aaa">
                                            {{ $n }}
                                        </div>
                                    @endfor
                                @endfor
                            </div>
                            <p class="text-center text-muted small mt-2">
                                <span class="badge bg-success">■</span> Mulai cetak &nbsp;
                                <span class="badge bg-primary">■</span> Label berikutnya &nbsp;
                                <span class="badge bg-light text-dark border">■</span> Kosong
                            </p>
                        </div>

                    </div>
                </div>

                {{-- Tombol cetak --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" onclick="doCetak()">
                        <i class="fas fa-file-pdf me-2"></i>Tanpa Barcode
                    </button>
                    <button type="button" class="btn btn-dark" onclick="doCetakBarcode()">
                        <i class="fas fa-barcode me-2"></i>Dengan Barcode
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Form hidden untuk cetak (tanpa barcode) --}}
    <form id="formCetak" method="POST" action="{{ route('barang.cetakPdf') }}" target="_blank">
        @csrf
        <input type="hidden" name="ids"    id="cetakIds">
        <input type="hidden" name="coordX" id="cetakX">
        <input type="hidden" name="coordY" id="cetakY">
    </form>

    {{-- Form hidden untuk cetak dengan barcode --}}
    <form id="formCetakBarcode" method="POST" action="{{ route('barang.cetakPdfBarcode') }}" target="_blank">
        @csrf
        <input type="hidden" name="ids"    id="cetakIdsBarcode">
        <input type="hidden" name="coordX" id="cetakXBarcode">
        <input type="hidden" name="coordY" id="cetakYBarcode">
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tblBarang').DataTable({
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
                columnDefs: [{ orderable: false, targets: [0, 5] }],
                pageLength: 10,
            });
        });

        // ── Checkbox ──────────────────────────────────
        document.getElementById('checkAll').addEventListener('change', function () {
            document.querySelectorAll('.chk-barang').forEach(c => c.checked = this.checked);
            updateCetakBtn();
        });
        document.querySelectorAll('.chk-barang').forEach(c =>
            c.addEventListener('change', updateCetakBtn)
        );

        function updateCetakBtn() {
            const n = document.querySelectorAll('.chk-barang:checked').length;
            document.getElementById('jumlahTerpilih').textContent = n;
            document.getElementById('btnCetakTerpilih').classList.toggle('d-none', n === 0);
        }

        // ── Modal Edit ─────────────────────────────────
        function openEdit(id, nama, harga) {
            document.getElementById('editIdDisplay').value = id;
            document.getElementById('editNama').value      = nama;
            document.getElementById('editHarga').value     = harga;
            document.getElementById('formEdit').action     = `/barang/${id}`;
            new bootstrap.Modal(document.getElementById('modalEdit')).show();
        }

        // ── Modal Hapus ────────────────────────────────
        function confirmHapus(id, nama) {
            document.getElementById('hapusNama').textContent = nama;
            document.getElementById('formHapus').action      = `/barang/${id}`;
            new bootstrap.Modal(document.getElementById('modalHapus')).show();
        }

        // ── Preview Grid Modal Cetak ───────────────────
        function updatePreview() {
            const x = Math.min(5, Math.max(1, parseInt(document.getElementById('inputX').value) || 1));
            const y = Math.min(8, Math.max(1, parseInt(document.getElementById('inputY').value) || 1));
            const startIdx = (y - 1) * 5 + x; // 1-based nomor label

            document.getElementById('nomorLabel').textContent = startIdx;

            const checked = [...document.querySelectorAll('.chk-barang:checked')];

            // Reset semua cell
            for (let r = 1; r <= 8; r++) {
                for (let c = 1; c <= 5; c++) {
                    const el = document.getElementById(`mc-${r}-${c}`);
                    el.style.cssText = 'border:1px solid #dee2e6;border-radius:4px;height:34px;' +
                                       'font-size:9px;display:flex;align-items:center;' +
                                       'justify-content:center;background:#fff;color:#aaa';
                    el.textContent = (r - 1) * 5 + c;
                }
            }

            // Warnai slot yang akan diisi
            checked.forEach((chk, i) => {
                const slot = startIdx + i; // 1-based
                if (slot > 40) return;
                const r = Math.ceil(slot / 5);
                const c = slot - (r - 1) * 5;
                const el = document.getElementById(`mc-${r}-${c}`);
                if (i === 0) {
                    el.style.background = '#198754'; el.style.color = '#fff'; el.style.borderColor = '#198754';
                } else {
                    el.style.background = '#cfe2ff'; el.style.color = '#0d6efd'; el.style.borderColor = '#0d6efd';
                }
                el.textContent = chk.dataset.nama.substring(0, 4) + '..';
            });

            // Update list terpilih
            const ul = document.getElementById('listTerpilih');
            ul.innerHTML = '';
            if (checked.length === 0) {
                ul.innerHTML = '<li class="list-group-item text-muted text-center small">Tidak ada barang dipilih</li>';
                return;
            }
            checked.forEach((c, i) => {
                const slotNo = startIdx + i;
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center py-1 px-2';
                li.innerHTML = `<span class="small">${i + 1}. ${c.dataset.nama}</span>
                    <span class="badge ${slotNo > 40 ? 'bg-danger' : 'bg-success'} rounded-pill small">
                        ${slotNo <= 40 ? '#' + slotNo : 'Melebihi!'}
                    </span>`;
                ul.appendChild(li);
            });
        }

        document.getElementById('modalCetak').addEventListener('show.bs.modal', updatePreview);
        document.getElementById('inputX').addEventListener('input', updatePreview);
        document.getElementById('inputY').addEventListener('input', updatePreview);

        // ── Submit Cetak PDF (tanpa barcode) ───────────
        function doCetak() {
            const checked = [...document.querySelectorAll('.chk-barang:checked')];
            if (checked.length === 0) { alert('Pilih minimal 1 barang!'); return; }

            document.getElementById('cetakIds').value = checked.map(c => c.value).join(',');
            document.getElementById('cetakX').value   = document.getElementById('inputX').value;
            document.getElementById('cetakY').value   = document.getElementById('inputY').value;
            document.getElementById('formCetak').submit();

            bootstrap.Modal.getInstance(document.getElementById('modalCetak')).hide();
        }

        // ── Submit Cetak PDF (dengan barcode) ─────────
        function doCetakBarcode() {
            const checked = [...document.querySelectorAll('.chk-barang:checked')];
            if (checked.length === 0) { alert('Pilih minimal 1 barang!'); return; }

            document.getElementById('cetakIdsBarcode').value = checked.map(c => c.value).join(',');
            document.getElementById('cetakXBarcode').value   = document.getElementById('inputX').value;
            document.getElementById('cetakYBarcode').value   = document.getElementById('inputY').value;
            document.getElementById('formCetakBarcode').submit();

            bootstrap.Modal.getInstance(document.getElementById('modalCetak')).hide();
        }
    </script>
@endpush