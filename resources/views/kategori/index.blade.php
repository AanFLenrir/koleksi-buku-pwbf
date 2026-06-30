@extends('layouts.app')

@section('title', 'Data Kategori - FarmNex')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ==========================================================
           EPIC FARM THEME – Data Kategori
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
        .sun-kategori {
            position: fixed;
            top: 30px;
            right: 60px;
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSunKategori 4s ease-in-out infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes pulseSunKategori {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-kategori {
            position: fixed;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
            animation: moveCloudKategori 25s linear infinite;
        }

        .cloud-kategori::before,
        .cloud-kategori::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud-kategori-1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 28s;
        }
        .cloud-kategori-1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud-kategori-1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud-kategori-2 {
            width: 220px;
            height: 60px;
            top: 130px;
            left: -300px;
            animation-duration: 32s;
            animation-delay: 6s;
        }
        .cloud-kategori-2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud-kategori-2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloudKategori {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-kategori {
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

        .grass-kategori::before {
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
            animation: swayGrassKategori 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrassKategori {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-kategori {
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

        .fence-kategori .post {
            width: 10px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence-kategori .post::before {
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
        .walking-animals-kategori {
            position: fixed;
            bottom: 55px;
            left: 0;
            right: 0;
            z-index: 3;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walkKategori 20s linear infinite;
        }

        .walking-animals-kategori i {
            font-size: 2.5rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceKategori 1.2s ease-in-out infinite alternate;
        }

        .walking-animals-kategori i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-kategori i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-kategori i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkKategori {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceKategori {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-farm-kategori {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-farm-kategori i {
            position: absolute;
            font-size: 3.5rem;
            color: rgba(255, 215, 0, 0.08);
            animation: floatKategori 18s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1));
        }

        .floating-farm-kategori i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-kategori i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-kategori i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-kategori i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatKategori {
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

        .card-body {
            padding: 2rem 2rem 2.5rem !important;
            color: #1b3a2b !important;
        }

        .card-title {
            font-weight: 700 !important;
            color: #1b3a2b !important;
            font-size: 1.6rem !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            border-bottom: 2px solid rgba(255, 215, 0, 0.2) !important;
            padding-bottom: 0.75rem !important;
            margin-bottom: 1.5rem !important;
        }

        .card-title i {
            color: #ffd700 !important;
            font-size: 1.8rem !important;
        }

        /* ---------- Alert ---------- */
        .alert-success {
            background: rgba(46, 125, 50, 0.15) !important;
            border: 1px solid rgba(46, 125, 50, 0.3) !important;
            border-radius: 50px !important;
            color: #1b3a2b !important;
            backdrop-filter: blur(4px) !important;
            padding: 0.8rem 1.6rem !important;
            font-weight: 500 !important;
        }

        .alert-success i {
            color: #2e7d32 !important;
            margin-right: 10px !important;
        }

        /* ---------- Tombol ---------- */
        .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            border: none !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.8rem !important;
            font-weight: 700 !important;
            color: #fff !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            box-shadow: 0 6px 16px -4px rgba(46, 125, 50, 0.3) !important;
        }

        .btn-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(46, 125, 50, 0.5) !important;
            background: linear-gradient(135deg, #388e3c, #1b5e20) !important;
            color: #fff !important;
        }

        .btn-primary i {
            margin-right: 8px !important;
        }

        /* ---------- Tabel ---------- */
        .table {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            margin-top: -8px !important;
            color: #1b3a2b !important;
        }

        .table thead th {
            background: rgba(27, 58, 43, 0.08) !important;
            backdrop-filter: blur(4px) !important;
            color: #1b3a2b !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            font-size: 0.8rem !important;
            padding: 1rem 1.2rem !important;
            border: none !important;
            border-radius: 16px 16px 0 0 !important;
        }

        .table tbody tr {
            background: rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 16px !important;
            transition: all 0.2s !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02) !important;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.4) !important;
            transform: scale(1.005) !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04) !important;
        }

        .table tbody td {
            padding: 0.9rem 1.2rem !important;
            border: none !important;
            color: #1b3a2b !important;
            font-weight: 400 !important;
            vertical-align: middle !important;
        }

        .table tbody td:first-child {
            border-radius: 16px 0 0 16px !important;
            font-weight: 600 !important;
            color: #2e7d32 !important;
        }

        .table tbody td:last-child {
            border-radius: 0 16px 16px 0 !important;
        }

        /* ---------- Tombol Aksi ---------- */
        .btn-aksi {
            border: none !important;
            border-radius: 50px !important;
            padding: 0.4rem 1.2rem !important;
            font-weight: 600 !important;
            font-size: 0.8rem !important;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
        }

        .btn-aksi i {
            font-size: 0.9rem !important;
        }

        .btn-edit {
            background: rgba(255, 215, 0, 0.15) !important;
            color: #b8860b !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
        }

        .btn-edit:hover {
            background: #ffd700 !important;
            color: #1b3a2b !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 14px rgba(255, 215, 0, 0.3) !important;
        }

        .btn-delete {
            background: rgba(255, 82, 82, 0.1) !important;
            color: #d32f2f !important;
            border: 1px solid rgba(255, 82, 82, 0.15) !important;
        }

        .btn-delete:hover {
            background: #ff5252 !important;
            color: #fff !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 14px rgba(255, 82, 82, 0.3) !important;
        }

        /* ---------- Modal Konfirmasi ---------- */
        .modal-confirm {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(6px);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .modal-confirm.show {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .modal-confirm .modal-box {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 32px;
            padding: 2.5rem 2rem;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.3);
            text-align: center;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal-confirm.show .modal-box {
            transform: scale(1);
        }

        .modal-box .icon-warning {
            font-size: 3.5rem;
            color: #ff5252;
            margin-bottom: 0.5rem;
        }

        .modal-box h5 {
            font-weight: 700;
            color: #1b3a2b;
            margin-bottom: 0.5rem;
        }

        .modal-box p {
            color: #555;
            font-size: 0.95rem;
            margin-bottom: 1.8rem;
        }

        .modal-box .btn-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .modal-box .btn-group .btn {
            border-radius: 50px;
            padding: 0.6rem 2rem;
            font-weight: 600;
            border: none;
            transition: all 0.2s;
        }

        .modal-box .btn-cancel {
            background: rgba(0, 0, 0, 0.06);
            color: #333;
        }

        .modal-box .btn-cancel:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .modal-box .btn-danger-confirm {
            background: #ff5252;
            color: #fff;
            box-shadow: 0 6px 16px rgba(255, 82, 82, 0.25);
        }

        .modal-box .btn-danger-confirm:hover {
            background: #d32f2f;
            transform: scale(1.02);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            .card-body { padding: 1.2rem !important; }
            .table thead th, .table tbody td { padding: 0.6rem 0.8rem !important; }
            .btn-aksi { padding: 0.3rem 0.8rem !important; font-size: 0.7rem !important; }
            .floating-farm-kategori i { display: none; }
            .walking-animals-kategori { display: none; }
            .fence-kategori { display: none; }
            .grass-kategori { height: 30px; }
            .cloud-kategori { display: none; }
            .sun-kategori { width: 40px; height: 40px; top: 15px; right: 20px; }
        }
    </style>
@endpush

@section('content')
    {{-- ===== DEKORASI ===== --}}
    <div class="sun-kategori"></div>
    <div class="cloud-kategori cloud-kategori-1"></div>
    <div class="cloud-kategori cloud-kategori-2"></div>
    <div class="grass-kategori"></div>
    <div class="fence-kategori">
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
    <div class="walking-animals-kategori">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>
    <div class="floating-farm-kategori">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    {{-- ===== KONTEN UTAMA ===== --}}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">
                        <i class="fas fa-tags"></i> Data Kategori
                    </h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus-circle"></i> Tambah Kategori
                        </a>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Kategori</th>
                                    @if(auth()->user()->role == 'admin')
                                        <th width="180" class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategori as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        @if(auth()->user()->role == 'admin')
                                        <td class="text-center">
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('kategori.edit', $item->idkategori) }}" 
                                               class="btn-aksi btn-edit">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>

                                            {{-- Tombol Hapus dengan modal --}}
                                            <button type="button" 
                                                    class="btn-aksi btn-delete"
                                                    onclick="openDeleteModal('{{ $item->idkategori }}', '{{ $item->nama_kategori }}')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>

                                            {{-- Form delete tersembunyi --}}
                                            <form id="delete-form-{{ $item->idkategori }}" 
                                                  action="{{ route('kategori.destroy', $item->idkategori) }}" 
                                                  method="POST" 
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- MODAL KONFIRMASI HAPUS --}}
    <div class="modal-confirm" id="deleteModal">
        <div class="modal-box">
            <div class="icon-warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h5>Hapus Kategori?</h5>
            <p id="deleteModalMessage">Apakah Anda yakin ingin menghapus kategori <strong>"..."</strong>? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="btn-group">
                <button class="btn btn-cancel" onclick="closeDeleteModal()">Batal</button>
                <button class="btn btn-danger-confirm" id="confirmDeleteBtn">Ya, Hapus</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let deleteId = null;

    function openDeleteModal(id, name) {
        deleteId = id;
        document.getElementById('deleteModalMessage').innerHTML = 
            'Apakah Anda yakin ingin menghapus kategori <strong>"' + name + '"</strong>? Tindakan ini tidak dapat dibatalkan.';
        document.getElementById('deleteModal').classList.add('show');
        document.getElementById('confirmDeleteBtn').onclick = function() {
            if (deleteId) {
                document.getElementById('delete-form-' + deleteId).submit();
            }
        };
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
        deleteId = null;
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && document.getElementById('deleteModal').classList.contains('show')) {
            closeDeleteModal();
        }
    });
</script>
@endpush