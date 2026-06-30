@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ==========================================================
           FARM THEME – Point of Sales (POS)
           ========================================================== */

        /* ---------- Background ---------- */
        #farm-pos-page,
        #farm-pos-page .main-panel,
        #farm-pos-page .content-wrapper,
        #farm-pos-page .container-fluid {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 25%, #a5d6a7 60%, #66bb6a 85%, #388e3c 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow-x: hidden !important;
        }

        /* ---------- Matahari ---------- */
        .sun-pos {
            position: fixed !important;
            top: 30px !important;
            right: 60px !important;
            width: 70px !important;
            height: 70px !important;
            background: radial-gradient(circle, #fff9c4, #ffd54f) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6) !important;
            animation: pulseSunPos 4s ease-in-out infinite alternate !important;
            z-index: 0 !important;
            pointer-events: none !important;
        }

        @keyframes pulseSunPos {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* ---------- Awan ---------- */
        .cloud-pos {
            position: fixed !important;
            background: rgba(255,255,255,0.7) !important;
            border-radius: 100px !important;
            filter: blur(1px) !important;
            z-index: 0 !important;
            pointer-events: none !important;
            animation: moveCloudPos 25s linear infinite !important;
        }

        .cloud-pos::before,
        .cloud-pos::after {
            content: '' !important;
            position: absolute !important;
            background: inherit !important;
            border-radius: 50% !important;
        }

        .cloud-pos-1 {
            width: 180px !important;
            height: 50px !important;
            top: 60px !important;
            left: -200px !important;
            animation-duration: 28s !important;
        }
        .cloud-pos-1::before {
            width: 70px !important;
            height: 70px !important;
            top: -30px !important;
            left: 20px !important;
        }
        .cloud-pos-1::after {
            width: 100px !important;
            height: 80px !important;
            top: -40px !important;
            left: 70px !important;
        }

        .cloud-pos-2 {
            width: 220px !important;
            height: 60px !important;
            top: 130px !important;
            left: -300px !important;
            animation-duration: 32s !important;
            animation-delay: 6s !important;
        }
        .cloud-pos-2::before {
            width: 90px !important;
            height: 90px !important;
            top: -40px !important;
            left: 30px !important;
        }
        .cloud-pos-2::after {
            width: 120px !important;
            height: 100px !important;
            top: -50px !important;
            left: 90px !important;
        }

        @keyframes moveCloudPos {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* ---------- Rumput ---------- */
        .grass-pos {
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

        .grass-pos::before {
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
            animation: swayGrassPos 3s ease-in-out infinite alternate !important;
        }

        @keyframes swayGrassPos {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* ---------- Pagar ---------- */
        .fence-pos {
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

        .fence-pos .post {
            width: 10px !important;
            height: 100% !important;
            background: #6d4c41 !important;
            border-radius: 4px 4px 0 0 !important;
            box-shadow: 0 -4px 0 #4e342e !important;
            position: relative !important;
        }

        .fence-pos .post::before {
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
        .walking-animals-pos {
            position: fixed !important;
            bottom: 55px !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 2 !important;
            pointer-events: none !important;
            display: flex !important;
            justify-content: space-around !important;
            animation: walkPos 20s linear infinite !important;
        }

        .walking-animals-pos i {
            font-size: 2.5rem !important;
            color: #4e342e !important;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)) !important;
            animation: bouncePos 1.2s ease-in-out infinite alternate !important;
        }

        .walking-animals-pos i:nth-child(1) { animation-delay: 0s; }
        .walking-animals-pos i:nth-child(2) { animation-delay: 0.4s; font-size: 2rem; }
        .walking-animals-pos i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walkPos {
            0% { transform: translateX(-150px); }
            100% { transform: translateX(calc(100vw + 150px)); }
        }

        @keyframes bouncePos {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-12px) rotate(3deg); }
        }

        /* ---------- Hewan Melayang ---------- */
        .floating-animals-pos {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            pointer-events: none !important;
            z-index: 0 !important;
            overflow: hidden !important;
        }

        .floating-animals-pos i {
            position: absolute !important;
            font-size: 3.5rem !important;
            color: rgba(255, 215, 0, 0.08) !important;
            animation: floatPos 18s ease-in-out infinite !important;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.1)) !important;
        }

        .floating-animals-pos i:nth-child(1) { top: 15%; left: 5%; animation-delay: 0s; font-size: 4rem; }
        .floating-animals-pos i:nth-child(2) { top: 30%; right: 10%; animation-delay: 4s; font-size: 5rem; }
        .floating-animals-pos i:nth-child(3) { bottom: 40%; left: 8%; animation-delay: 8s; }
        .floating-animals-pos i:nth-child(4) { bottom: 30%; right: 6%; animation-delay: 12s; font-size: 3.5rem; }

        @keyframes floatPos {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
            50% { transform: translateY(-30px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.06; }
        }

        /* ---------- Cards ---------- */
        #farm-pos-page .card {
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

        #farm-pos-page .card:hover {
            transform: translateY(-6px) scale(1.01) !important;
            box-shadow: 0 30px 60px -16px rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 215, 0, 0.4) !important;
        }

        #farm-pos-page .card-header {
            padding: 1rem 1.5rem !important;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2) !important;
            font-weight: 700 !important;
            border-radius: 32px 32px 0 0 !important;
            background: rgba(255, 255, 255, 0.15) !important;
            color: #1b3a2b !important;
        }

        #farm-pos-page .card-header.bg-primary {
            background: linear-gradient(135deg, #2e7d32, #1b5e20) !important;
            color: #fff !important;
        }

        #farm-pos-page .card-header.bg-white {
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(4px);
            color: #1b3a2b;
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }

        #farm-pos-page .card-body {
            padding: 1.5rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Form Elements ---------- */
        #farm-pos-page .form-control,
        #farm-pos-page .form-check-input {
            background: rgba(255, 255, 255, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 50px !important;
            padding: 0.6rem 1.2rem !important;
            color: #1b3a2b !important;
            transition: all 0.3s !important;
        }

        #farm-pos-page .form-control:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15) !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }

        #farm-pos-page .form-control.bg-warning-subtle {
            background: rgba(255, 215, 0, 0.1) !important;
        }

        #farm-pos-page .form-label {
            color: #1b3a2b !important;
            font-weight: 600 !important;
        }

        /* ---------- Buttons ---------- */
        #farm-pos-page .btn {
            border-radius: 50px !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border: none !important;
        }

        #farm-pos-page .btn-success {
            background: linear-gradient(135deg, #ffd700, #f57c00) !important;
            color: #1b3a2b !important;
            box-shadow: 0 6px 16px -4px rgba(255, 215, 0, 0.3) !important;
        }

        #farm-pos-page .btn-success:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 24px -6px rgba(255, 215, 0, 0.5) !important;
            background: linear-gradient(135deg, #ffe082, #f57c00) !important;
            color: #1b3a2b !important;
        }

        #farm-pos-page .btn-success:disabled {
            opacity: 0.6 !important;
            transform: none !important;
        }

        #farm-pos-page .btn-outline-primary {
            background: rgba(255,255,255,0.2) !important;
            color: #1b3a2b !important;
            border: 1px solid rgba(255,215,0,0.3) !important;
        }

        #farm-pos-page .btn-outline-primary:hover {
            background: #ffd700 !important;
            color: #1b3a2b !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(255,215,0,0.3);
        }

        #farm-pos-page .btn-danger {
            background: rgba(255,82,82,0.1) !important;
            color: #d32f2f !important;
            border: 1px solid rgba(255,82,82,0.15) !important;
        }

        #farm-pos-page .btn-danger:hover {
            background: #ff5252 !important;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(255,82,82,0.3);
        }

        /* ---------- Tables ---------- */
        #farm-pos-page .table {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            margin-top: -8px !important;
            color: #1b3a2b !important;
        }

        #farm-pos-page .table thead th {
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

        #farm-pos-page .table tbody tr {
            background: rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 16px !important;
            transition: all 0.2s !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02) !important;
        }

        #farm-pos-page .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.4) !important;
            transform: scale(1.005) !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04) !important;
        }

        #farm-pos-page .table tbody td {
            padding: 0.8rem 1rem !important;
            border: none !important;
            color: #1b3a2b !important;
            vertical-align: middle !important;
        }

        #farm-pos-page .table tbody td:first-child {
            border-radius: 16px 0 0 16px !important;
        }

        #farm-pos-page .table tbody td:last-child {
            border-radius: 0 16px 16px 0 !important;
        }

        #farm-pos-page .table tfoot tr {
            background: rgba(255, 215, 0, 0.1) !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 16px !important;
        }

        #farm-pos-page .table tfoot td {
            border: none !important;
            color: #1b3a2b !important;
            font-weight: 700 !important;
            font-size: 1.1rem !important;
            padding: 0.8rem 1rem !important;
        }

        #farm-pos-page .table code {
            background: rgba(255, 255, 255, 0.6) !important;
            padding: 0.2rem 0.6rem !important;
            border-radius: 50px !important;
            font-size: 0.8rem !important;
            color: #1b3a2b !important;
        }

        /* ---------- Form Check ---------- */
        #farm-pos-page .form-check-input {
            border-radius: 50px !important;
            margin-right: 6px !important;
        }

        #farm-pos-page .form-check-input:checked {
            background: #ffd700 !important;
            border-color: #ffd700 !important;
        }

        #farm-pos-page .form-check-label {
            color: #1b3a2b !important;
        }

        /* ---------- Responsif ---------- */
        @media (max-width: 768px) {
            #farm-pos-page .card-body { padding: 1rem !important; }
            #farm-pos-page .table thead th,
            #farm-pos-page .table tbody td { padding: 0.5rem 0.6rem !important; }
            #farm-pos-page .btn { padding: 0.4rem 1rem !important; font-size: 0.85rem !important; }
            .floating-animals-pos i { display: none !important; }
            .walking-animals-pos { display: none !important; }
            .fence-pos { display: none !important; }
            .grass-pos { height: 30px !important; }
            .cloud-pos { display: none !important; }
            .sun-pos { width: 40px !important; height: 40px !important; top: 15px !important; right: 20px !important; }
        }
    </style>
@endpush

@section('content')
    {{-- Bungkus semua konten dengan ID --}}
    <div id="farm-pos-page">

        {{-- Dekorasi --}}
        <div class="sun-pos"></div>
        <div class="cloud-pos cloud-pos-1"></div>
        <div class="cloud-pos cloud-pos-2"></div>
        <div class="grass-pos"></div>
        <div class="fence-pos">
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
        <div class="walking-animals-pos">
            <i class="fas fa-cow"></i>
            <i class="fas fa-horse"></i>
            <i class="fas fa-kiwi-bird"></i>
        </div>
        <div class="floating-animals-pos">
            <i class="fas fa-cow"></i>
            <i class="fas fa-kiwi-bird"></i>
            <i class="fas fa-horse-head"></i>
            <i class="fas fa-piggy-bank"></i>
        </div>

        {{-- ===== KONTEN ASLI ===== --}}
        <div class="container-fluid py-4">
            <div class="row g-4">

                {{-- FORM INPUT BARANG --}}
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header bg-primary text-white rounded-top-4 fw-semibold">
                            <i class="fas fa-cash-register me-2"></i>Point of Sales
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kode Barang</label>
                                <input type="text" id="inputKode" class="form-control"
                                       placeholder="Scan / ketik kode barang..." autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Barang</label>
                                <input type="text" id="inputNama" class="form-control bg-warning-subtle" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Harga Barang</label>
                                <input type="text" id="inputHarga" class="form-control bg-warning-subtle" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Jumlah</label>
                                <input type="number" id="inputJumlah" class="form-control" value="1" min="1">
                            </div>
                            <button type="button" id="btnTambah" class="btn btn-success w-100" disabled onclick="tambahItem()">
                                <i class="fas fa-plus me-2"></i>Tambahkan
                            </button>
                        </div>
                    </div>

                    {{-- PILIH METODE PEMBAYARAN --}}
                    <div class="card shadow-sm border-0 rounded-4 mt-4">
                        <div class="card-header bg-white border-bottom fw-semibold text-primary">
                            <i class="fas fa-wallet me-2"></i>Metode Pembayaran
                        </div>
                        <div class="card-body d-flex flex-column gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                       id="pmTunai" value="tunai" checked>
                                <label class="form-check-label fw-semibold" for="pmTunai">
                                    💵 Tunai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                       id="pmVA" value="virtual_account">
                                <label class="form-check-label fw-semibold" for="pmVA">
                                    🏦 Virtual Account <small class="text-muted">(BCA, BNI, BRI, Mandiri)</small>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                       id="pmQRIS" value="qris">
                                <label class="form-check-label fw-semibold" for="pmQRIS">
                                    📱 QRIS / GoPay
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TABEL TRANSAKSI --}}
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header bg-white border-bottom fw-semibold text-primary d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja</span>
                            <a href="{{ route('pos.riwayat') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-history me-1"></i>Riwayat Transaksi
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover align-middle" id="tabelPOS">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyPOS">
                                    <tr id="emptyRow">
                                        <td colspan="6" class="text-center text-muted">Belum ada item</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="table-success fw-bold">
                                        <td colspan="4" class="text-end">Total</td>
                                        <td colspan="2" id="totalHarga">Rp 0</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="text-end mt-3">
                                <button type="button" id="btnBayar" class="btn btn-success px-4" disabled onclick="bayar()">
                                    <i class="fas fa-money-bill-wave me-2"></i>Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>{{-- /#farm-pos-page --}}
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        let hargaBarang     = 0;
        let namaBarang      = '';
        let kodeBarang      = '';
        let idBarang        = null;
        let barangDitemukan = false;

        // CARI BARANG
        document.getElementById('inputKode').addEventListener('keydown', function (e) {
            if (e.key !== 'Enter') return;
            const kode = this.value.trim();
            if (!kode) return;

            document.getElementById('inputNama').value   = '';
            document.getElementById('inputHarga').value  = '';
            document.getElementById('inputJumlah').value = 1;
            document.getElementById('btnTambah').disabled = true;
            barangDitemukan = false;

            axios.post('{{ route("pos.cari") }}', {
                kode:   kode,
                _token: '{{ csrf_token() }}'
            })
            .then(function (res) {
                const b     = res.data.data;
                namaBarang  = b.nama;
                hargaBarang = b.harga;
                kodeBarang  = b.id_barang;
                idBarang    = b.id_barang;
                barangDitemukan = true;

                document.getElementById('inputNama').value  = b.nama;
                document.getElementById('inputHarga').value = 'Rp ' + parseInt(b.harga).toLocaleString('id-ID');
                document.getElementById('inputJumlah').value = 1;
                document.getElementById('btnTambah').disabled = false;
            })
            .catch(function () {
                Swal.fire('Tidak Ditemukan', 'Kode barang tidak ada di database.', 'error');
            });
        });

        // TAMBAH ITEM
        function tambahItem() {
            if (!barangDitemukan) return;

            const jumlah = parseInt(document.getElementById('inputJumlah').value);
            if (jumlah < 1) { alert('Jumlah minimal 1'); return; }

            const btn = document.getElementById('btnTambah');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';

            setTimeout(function () {
                const subtotal = hargaBarang * jumlah;
                const existing = document.querySelector(`tr[data-kode="${kodeBarang}"]`);

                if (existing) {
                    const tdJumlah    = existing.querySelector('.td-jumlah');
                    const tdSubtotal  = existing.querySelector('.td-subtotal');
                    const newJumlah   = parseInt(tdJumlah.querySelector('input').value) + jumlah;
                    const newSubtotal = hargaBarang * newJumlah;
                    tdJumlah.querySelector('input').value = newJumlah;
                    tdSubtotal.textContent = 'Rp ' + newSubtotal.toLocaleString('id-ID');
                    tdSubtotal.dataset.val = newSubtotal;
                } else {
                    const emptyRow = document.getElementById('emptyRow');
                    if (emptyRow) emptyRow.remove();

                    const tr = document.createElement('tr');
                    tr.dataset.kode     = kodeBarang;
                    tr.dataset.id       = idBarang;
                    tr.dataset.harga    = hargaBarang;
                    tr.innerHTML = `
                        <td><code>${kodeBarang}</code></td>
                        <td>${namaBarang}</td>
                        <td>Rp ${parseInt(hargaBarang).toLocaleString('id-ID')}</td>
                        <td class="td-jumlah">
                            <input type="number" class="form-control form-control-sm" value="${jumlah}" min="1"
                                   style="width:80px" onchange="updateSubtotal(this)">
                        </td>
                        <td class="td-subtotal" data-val="${subtotal}">Rp ${subtotal.toLocaleString('id-ID')}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="hapusRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;
                    document.getElementById('tbodyPOS').appendChild(tr);
                }

                updateTotal();

                document.getElementById('inputKode').value   = '';
                document.getElementById('inputNama').value   = '';
                document.getElementById('inputHarga').value  = '';
                document.getElementById('inputJumlah').value = 1;
                barangDitemukan = false;
                idBarang        = null;
                btn.disabled    = true;
                btn.innerHTML   = '<i class="fas fa-plus me-2"></i>Tambahkan';
                document.getElementById('inputKode').focus();
                document.getElementById('btnBayar').disabled = false;
            }, 300);
        }

        // UPDATE SUBTOTAL
        function updateSubtotal(input) {
            const tr       = input.closest('tr');
            const harga    = parseInt(tr.dataset.harga);
            const jumlah   = parseInt(input.value) || 1;
            const subtotal = harga * jumlah;
            const tdSub    = tr.querySelector('.td-subtotal');
            tdSub.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            tdSub.dataset.val = subtotal;
            updateTotal();
        }

        // HAPUS ROW
        function hapusRow(btn) {
            btn.closest('tr').remove();
            if (document.getElementById('tbodyPOS').rows.length === 0) {
                const tr = document.createElement('tr');
                tr.id = 'emptyRow';
                tr.innerHTML = '<td colspan="6" class="text-center text-muted">Belum ada item</td>';
                document.getElementById('tbodyPOS').appendChild(tr);
                document.getElementById('btnBayar').disabled = true;
            }
            updateTotal();
        }

        // UPDATE TOTAL
        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.td-subtotal').forEach(function (td) {
                total += parseInt(td.dataset.val) || 0;
            });
            document.getElementById('totalHarga').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        // RESET KERANJANG
        function resetKeranjang() {
            document.getElementById('tbodyPOS').innerHTML =
                '<tr id="emptyRow"><td colspan="6" class="text-center text-muted">Belum ada item</td></tr>';
            document.getElementById('totalHarga').textContent = 'Rp 0';
            document.getElementById('inputKode').value   = '';
            document.getElementById('inputNama').value   = '';
            document.getElementById('inputHarga').value  = '';
            document.getElementById('inputJumlah').value = 1;
            barangDitemukan = false;
            idBarang        = null;
            const btn = document.getElementById('btnBayar');
            btn.disabled  = true;
            btn.innerHTML = '<i class="fas fa-money-bill-wave me-2"></i>Bayar';
        }

        // BAYAR
        function bayar() {
            const rows = document.querySelectorAll('#tbodyPOS tr[data-kode]');
            if (rows.length === 0) return;

            const items = [];
            let total   = 0;
            rows.forEach(function (tr) {
                const jumlah   = parseInt(tr.querySelector('.td-jumlah input').value);
                const subtotal = parseInt(tr.querySelector('.td-subtotal').dataset.val);
                total += subtotal;
                items.push({
                    id:  tr.dataset.id,
                    qty: jumlah,
                });
            });

            const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
            const btn = document.getElementById('btnBayar');
            btn.disabled  = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';

            // TUNAI
            if (paymentMethod === 'tunai') {
                axios.post('{{ route("pos.bayar") }}', {
                    items:          items,
                    payment_method: 'tunai',
                    _token:         '{{ csrf_token() }}'
                })
                .then(function (res) {
                    Swal.fire({
                        icon:  'success',
                        title: 'Berhasil!',
                        html:  `Transaksi tunai berhasil!<br>
                                <b>Order:</b> ${res.data.order_code}<br>
                                <b>Customer:</b> ${res.data.customer}<br>
                                <b>Total:</b> Rp ${parseInt(res.data.total).toLocaleString('id-ID')}`,
                    });
                    resetKeranjang();
                })
                .catch(function () {
                    Swal.fire('Error!', 'Transaksi gagal disimpan.', 'error');
                    btn.disabled  = false;
                    btn.innerHTML = '<i class="fas fa-money-bill-wave me-2"></i>Bayar';
                });
                return;
            }

            // VIRTUAL ACCOUNT / QRIS
            axios.post('{{ route("pos.bayar") }}', {
                items:          items,
                payment_method: paymentMethod,
                _token:         '{{ csrf_token() }}'
            })
            .then(function (res) {
                snap.pay(res.data.snap_token, {

                    // ── SC2: Tampilkan QR Code setelah pembayaran berhasil ──
                    onSuccess: function (result) {
                        Swal.fire({
                            icon:  'success',
                            title: '✅ Pembayaran Berhasil!',
                            html:  `<b>Order:</b> ${res.data.order_code}<br>
                                    <b>Customer:</b> ${res.data.customer}<br>
                                    <b>Total:</b> Rp ${parseInt(res.data.total).toLocaleString('id-ID')}<br><br>
                                    <p class="mb-1"><small class="text-muted">QR Code Pesanan:</small></p>
                                    <img src="/qrcode/${res.data.order_code}"
                                         alt="QR Code"
                                         style="width:180px;height:180px;border:1px solid #eee;border-radius:8px;padding:6px;">`,
                        });
                        resetKeranjang();
                    },

                    onPending: function (result) {
                        Swal.fire({
                            icon:  'info',
                            title: '⏳ Menunggu Pembayaran',
                            html:  `Order <b>${res.data.order_code}</b> menunggu pembayaran.`,
                        });
                        resetKeranjang();
                    },
                    onError: function (result) {
                        Swal.fire('❌ Gagal!', 'Pembayaran gagal. Silakan coba lagi.', 'error');
                        btn.disabled  = false;
                        btn.innerHTML = '<i class="fas fa-money-bill-wave me-2"></i>Bayar';
                    },
                    onClose: function () {
                        Swal.fire({
                            icon:  'warning',
                            title: 'Popup Ditutup',
                            text:  'Kamu menutup popup sebelum pembayaran selesai.',
                        });
                        btn.disabled  = false;
                        btn.innerHTML = '<i class="fas fa-money-bill-wave me-2"></i>Bayar';
                    }
                });
            })
            .catch(function () {
                Swal.fire('Error!', 'Gagal menghubungi server pembayaran.', 'error');
                btn.disabled  = false;
                btn.innerHTML = '<i class="fas fa-money-bill-wave me-2"></i>Bayar';
            });
        }
    </script>
@endpush