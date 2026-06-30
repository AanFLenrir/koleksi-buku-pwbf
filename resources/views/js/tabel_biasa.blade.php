@extends('layouts.app')

@section('title', 'Data Barang - FarmNex')

@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           EPIC FARM THEME – Data Barang (CRUD)
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
        .sun-crud {
            position: fixed;
            top: 30px;
            right: 60px;
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSunCrud 4s ease-in-out infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes pulseSunCrud {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-crud {
            position: fixed;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
            animation: moveCloudCrud 25s linear infinite;
        }

        .cloud-crud::before,
        .cloud-crud::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud-crud-1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 28s;
        }
        .cloud-crud-1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud-crud-1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud-crud-2 {
            width: 220px;
            height: 60px;
            top: 130px;
            left: -300px;
            animation-duration: 32s;
            animation-delay: 6s;
        }
        .cloud-crud-2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud-crud-2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloudCrud {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-crud {
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

        .grass-crud::before {
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
            animation: swayGrassCrud 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrassCrud {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-crud {
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

        .fence-crud .post {
            width: 10px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence-crud .post::before {
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
        .walking-animals-crud {
            position: fixed;
            bottom: 55px;
            left: 0;
            right: 0;
            z-index: 3;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walkCrud 20s linear infinite;
        }

        .walking-animals-crud i {
            font-size: 2.5rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceCrud 1.2s ease-in-out infinite alternate;
        }

        .walking-animals-crud i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-crud i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-crud i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkCrud {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bounceCrud {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-farm-crud {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-farm-crud i {
            position: absolute;
            font-size: 3.5rem;
            color: rgba(255, 215, 0, 0.08);
            animation: floatCrud 18s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1));
        }

        .floating-farm-crud i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-farm-crud i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-farm-crud i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-farm-crud i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatCrud {
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

        .card-header.bg-white {
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(4px);
            color: #1b3a2b;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }

        .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Form Elements ---------- */
        .form-control {
            background: rgba(255, 255, 255, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.2rem !important;
            color: #1b3a2b !important;
            transition: all 0.3s !important;
        }

        .form-control:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15) !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }

        .form-label {
            color: #1b3a2b !important;
            font-weight: 600 !important;
        }

        /* ---------- Buttons ---------- */
        .btn {
            border-radius: 50px !important;
            padding: 0.6rem 1.8rem !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
            box-shadow: 0 6px 16px -4px rgba(46, 125, 50, 0.3) !important;
        }

        .btn-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(46, 125, 50, 0.5) !important;
            background: linear-gradient(135deg, #388e3c, #1b5e20) !important;
            color: #fff !important;
        }

        .btn-primary:disabled {
            opacity: 0.6 !important;
            transform: none !important;
        }

        .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 16px -4px rgba(255, 215, 0, 0.3) !important;
        }

        .btn-success:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(255, 215, 0, 0.5) !important;
            background: linear-gradient(135deg, #ffe082, #f57c00) !important;
            color: #1b3a2b !important;
        }

        .btn-success:disabled {
            opacity: 0.6 !important;
            transform: none !important;
        }

        .btn-danger {
            background: rgba(255, 82, 82, 0.1) !important;
            color: #d32f2f !important;
            border: 1px solid rgba(255, 82, 82, 0.15) !important;
        }

        .btn-danger:hover {
            background: #ff5252 !important;
            color: #fff !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 14px rgba(255, 82, 82, 0.3) !important;
        }

        .btn-danger:disabled {
            opacity: 0.6 !important;
            transform: none !important;
        }

        /* ---------- Tables ---------- */
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
            padding: 0.9rem 1rem !important;
            border: none !important;
            border-radius: 16px 16px 0 0 !important;
        }

        .table tbody tr {
            background: rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 16px !important;
            transition: all 0.2s !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02) !important;
            cursor: pointer !important;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.4) !important;
            transform: scale(1.005) !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04) !important;
        }

        .table tbody td {
            padding: 0.8rem 1rem !important;
            border: none !important;
            color: #1b3a2b !important;
            vertical-align: middle !important;
        }

        .table tbody td:first-child {
            border-radius: 16px 0 0 16px !important;
        }

        .table tbody td:last-child {
            border-radius: 0 16px 16px 0 !important;
        }

        .table tbody td code {
            background: rgba(255, 255, 255, 0.6) !important;
            padding: 0.2rem 0.6rem !important;
            border-radius: 50px !important;
            font-size: 0.8rem !important;
            color: #1b3a2b !important;
        }

        .table .text-success {
            color: #2e7d32 !important;
        }

        /* ---------- Modals ---------- */
        .modal-content {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            border-radius: 28px !important;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2) !important;
        }

        .modal-header {
            border-bottom: 2px solid rgba(255, 215, 0, 0.2) !important;
            border-radius: 28px 28px 0 0 !important;
            padding: 1rem 1.5rem !important;
        }

        .modal-header.bg-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 215, 0, 0.1) !important;
            padding: 1rem 1.5rem !important;
            border-radius: 0 0 28px 28px !important;
        }

        .modal-footer .btn {
            min-width: 100px !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            .card-body { padding: 1rem !important; }
            .table thead th, .table tbody td { padding: 0.5rem 0.6rem !important; }
            .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-farm-crud i { display: none; }
            .walking-animals-crud { display: none; }
            .fence-crud { display: none; }
            .grass-crud { height: 30px; }
            .cloud-crud { display: none; }
            .sun-crud { width: 40px; height: 40px; top: 15px; right: 20px; }
        }
    </style>
@endpush

@section('content')
    {{-- ===== DEKORASI ===== --}}
    <div class="sun-crud"></div>
    <div class="cloud-crud cloud-crud-1"></div>
    <div class="cloud-crud cloud-crud-2"></div>
    <div class="grass-crud"></div>
    <div class="fence-crud">
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
    <div class="walking-animals-crud">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>
    <div class="floating-farm-crud">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    {{-- ===== KONTEN UTAMA ===== --}}
    <div class="container-fluid py-4">
        <div class="row g-4">
            {{-- FORM TAMBAH --}}
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4 fw-semibold">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Barang
                    </div>
                    <div class="card-body">
                        <form id="formTambah">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold">Nama Barang</label>
                                    <input type="text" id="inputNama" class="form-control" placeholder="Nama barang..." required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Harga Barang (Rp)</label>
                                    <input type="number" id="inputHarga" class="form-control" placeholder="0" min="1" required>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" id="btnSimpan" class="btn btn-primary w-100" onclick="tambahBarang()">
                                        <i class="fas fa-save me-2"></i>Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- TABEL DATA --}}
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-white border-bottom fw-semibold text-primary">
                        <i class="fas fa-table me-2"></i>Data Barang (Tabel HTML Biasa)
                    </div>
                    <div class="card-body">
                        <table class="table table-hover align-middle" id="tabelBarang" style="cursor:pointer">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyBarang">
                                <tr id="emptyRow">
                                    <td colspan="3" class="text-center text-muted">Belum ada data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT/HAPUS --}}
    <div class="modal fade" id="modalAksi" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-semibold"><i class="fas fa-edit me-2"></i>Edit / Hapus Barang</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formModal">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">ID Barang</label>
                            <input type="text" id="modalId" class="form-control bg-light" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Barang</label>
                            <input type="text" id="modalNama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga Barang</label>
                            <input type="number" id="modalHarga" class="form-control" min="1" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btnHapusModal" class="btn btn-danger" onclick="hapusRow()">
                        <i class="fas fa-trash me-1"></i>Hapus
                    </button>
                    <button type="button" id="btnUbahModal" class="btn btn-success" onclick="ubahRow()">
                        <i class="fas fa-save me-1"></i>Ubah
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let counter = 1;
        let selectedRow = null;

        function tambahBarang() {
            const form  = document.getElementById('formTambah');
            const btn   = document.getElementById('btnSimpan');
            const nama  = document.getElementById('inputNama');
            const harga = document.getElementById('inputHarga');

            if (!form.checkValidity()) { form.reportValidity(); return; }

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';

            setTimeout(function () {
                const now = new Date();
                const id  = String(now.getFullYear()).slice(2) + 
                           String(now.getMonth()+1).padStart(2,'0') + 
                           String(now.getDate()).padStart(2,'0') + 
                           String(counter).padStart(2,'0');

                const emptyRow = document.getElementById('emptyRow');
                if (emptyRow) emptyRow.remove();

                const tr = document.createElement('tr');
                tr.style.cursor = 'pointer';
                tr.dataset.id    = id;
                tr.dataset.nama  = nama.value;
                tr.dataset.harga = harga.value;
                tr.innerHTML = `
                    <td><code>${id}</code></td>
                    <td>${nama.value}</td>
                    <td class="fw-semibold text-success">Rp ${parseInt(harga.value).toLocaleString('id-ID')}</td>
                `;
                tr.addEventListener('click', function () { openModal(this); });

                document.getElementById('tbodyBarang').appendChild(tr);
                counter++;
                nama.value = '';
                harga.value = '';

                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save me-2"></i>Submit';
            }, 500);
        }

        function openModal(row) {
            selectedRow = row;
            document.getElementById('modalId').value    = row.dataset.id;
            document.getElementById('modalNama').value  = row.dataset.nama;
            document.getElementById('modalHarga').value = row.dataset.harga;

            document.getElementById('btnHapusModal').disabled = false;
            document.getElementById('btnHapusModal').innerHTML = '<i class="fas fa-trash me-1"></i>Hapus';
            document.getElementById('btnUbahModal').disabled = false;
            document.getElementById('btnUbahModal').innerHTML = '<i class="fas fa-save me-1"></i>Ubah';

            new bootstrap.Modal(document.getElementById('modalAksi')).show();
        }

        function ubahRow() {
            const form = document.getElementById('formModal');
            if (!form.checkValidity()) { form.reportValidity(); return; }

            const btn = document.getElementById('btnUbahModal');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';

            setTimeout(function () {
                const nama  = document.getElementById('modalNama').value;
                const harga = document.getElementById('modalHarga').value;

                selectedRow.dataset.nama  = nama;
                selectedRow.dataset.harga = harga;
                selectedRow.cells[1].textContent = nama;
                selectedRow.cells[2].innerHTML = `<span class="fw-semibold text-success">Rp ${parseInt(harga).toLocaleString('id-ID')}</span>`;

                bootstrap.Modal.getInstance(document.getElementById('modalAksi')).hide();
            }, 500);
        }

        function hapusRow() {
            const btn = document.getElementById('btnHapusModal');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';

            setTimeout(function () {
                selectedRow.remove();

                if (document.getElementById('tbodyBarang').rows.length === 0) {
                    const tr = document.createElement('tr');
                    tr.id = 'emptyRow';
                    tr.innerHTML = '<td colspan="3" class="text-center text-muted">Belum ada data</td>';
                    document.getElementById('tbodyBarang').appendChild(tr);
                }

                bootstrap.Modal.getInstance(document.getElementById('modalAksi')).hide();
            }, 500);
        }
    </script>
@endpush