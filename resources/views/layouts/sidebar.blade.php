{{--
=============================================================
SIDEBAR – Tema Peternakan Super Elegan
=============================================================
Peningkatan desain:
- Gradien latar belakang dengan animasi
- Glassmorphism premium
- Transisi halus (cubic-bezier)
- Aksen emas dengan efek neon
- Ikon interaktif (scale + rotate)
- Indikator aktif bercahaya
- Scrollbar kustom
- Profil dengan border animasi
=============================================================
--}}

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ----------------------------------------------
           SIDEBAR UTAMA – dengan gradien animasi
        ----------------------------------------------- */
        .sidebar {
            background: linear-gradient(145deg, #0f2a1a 0%, #1a3d2a 40%, #265a3a 100%);
            background-size: 200% 200%;
            animation: gradientShift 8s ease-in-out infinite alternate;
            border-right: 1px solid rgba(255, 215, 0, 0.15);
            box-shadow: 6px 0 40px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 0%; }
            100% { background-position: 100% 100%; }
        }

        /* Pola rumput dengan opacity lebih rendah */
        .sidebar::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: repeating-linear-gradient(75deg,
                rgba(46, 125, 50, 0.2) 0px, rgba(46, 125, 50, 0.2) 12px,
                rgba(56, 142, 60, 0.2) 12px, rgba(56, 142, 60, 0.2) 24px);
            clip-path: polygon(0% 100%, 5% 60%, 10% 100%, 15% 50%, 20% 100%, 25% 70%,
                30% 100%, 35% 40%, 40% 100%, 45% 80%, 50% 100%, 55% 50%,
                60% 100%, 65% 60%, 70% 100%, 75% 30%, 80% 100%, 85% 70%,
                90% 100%, 95% 50%, 100% 100%);
            pointer-events: none;
            z-index: 0;
        }

        /* Pagar lebih halus */
        .sidebar::after {
            content: '';
            position: absolute;
            bottom: 68px;
            left: 8%;
            right: 8%;
            height: 16px;
            background: repeating-linear-gradient(90deg,
                rgba(109, 76, 65, 0.3) 0px, rgba(109, 76, 65, 0.3) 6px,
                transparent 6px, transparent 18px);
            border-top: 2px solid rgba(141, 110, 99, 0.2);
            border-bottom: 2px solid rgba(141, 110, 99, 0.2);
            pointer-events: none;
            z-index: 0;
        }

        /* Hewan melayang dengan efek lebih lembut */
        .sidebar .floating-farm i {
            position: absolute;
            font-size: 2.5rem;
            color: rgba(255, 215, 0, 0.06);
            animation: floatAnimal 16s ease-in-out infinite;
            filter: blur(0.5px);
        }

        .sidebar .floating-farm i:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
        .sidebar .floating-farm i:nth-child(2) { top: 30%; right: 8%; animation-delay: 4s; font-size: 3rem; }
        .sidebar .floating-farm i:nth-child(3) { bottom: 25%; left: 8%; animation-delay: 8s; }
        .sidebar .floating-farm i:nth-child(4) { bottom: 45%; right: 4%; animation-delay: 12s; font-size: 2rem; }

        @keyframes floatAnimal {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.05; }
            50% { transform: translateY(-25px) rotate(6deg) scale(1.1); opacity: 0.15; }
            100% { transform: translateY(0) rotate(0deg) scale(1); opacity: 0.05; }
        }

        /* ----------------------------------------------
           PROFIL PENGGUNA – dengan border animasi
        ----------------------------------------------- */
        .nav-profile {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            margin: 18px 14px 22px;
            padding: 10px 14px !important;
            border: 1px solid rgba(255, 215, 0, 0.1);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.4);
            position: relative;
            z-index: 2;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Animasi border berputar (glow) */
        .nav-profile::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 26px;
            background: conic-gradient(from var(--angle, 0deg), transparent 0%, #ffd700 50%, transparent 100%);
            z-index: -1;
            animation: rotateBorder 6s linear infinite;
        }

        @property --angle {
            syntax: '<angle>';
            initial-value: 0deg;
            inherits: false;
        }

        @keyframes rotateBorder {
            to { --angle: 360deg; }
        }

        .nav-profile:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px -10px rgba(255, 215, 0, 0.2);
        }

        .nav-profile .nav-profile-image img {
            border: 2px solid #ffd700;
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.15);
            transition: box-shadow 0.3s;
        }

        .nav-profile:hover .nav-profile-image img {
            box-shadow: 0 0 40px rgba(255, 215, 0, 0.3);
        }

        .nav-profile .nav-profile-text .font-weight-bold {
            color: #fff;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
            letter-spacing: 0.3px;
        }

        .nav-profile .nav-profile-text .text-secondary {
            color: #ffd700 !important;
            font-weight: 500;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            font-size: 0.7rem;
            opacity: 0.8;
        }

        /* ----------------------------------------------
           MENU ITEMS – lebih halus dan elegan
        ----------------------------------------------- */
        .sidebar .nav .nav-item {
            position: relative;
            z-index: 2;
        }

        .sidebar .nav .nav-item .nav-link {
            color: rgba(255, 255, 255, 0.65);
            font-weight: 400;
            padding: 12px 22px;
            margin: 3px 12px;
            border-radius: 16px;
            transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        /* Efek hover: geser + bayangan */
        .sidebar .nav .nav-item .nav-link:hover {
            color: #ffd700;
            background: rgba(255, 215, 0, 0.06);
            transform: translateX(6px);
            box-shadow: 0 4px 20px rgba(255, 215, 0, 0.05);
        }

        /* Efek riak saat hover (opsional) */
        .sidebar .nav .nav-item .nav-link::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at var(--x, 50%) var(--y, 50%), rgba(255, 215, 0, 0.05), transparent 70%);
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .sidebar .nav .nav-item .nav-link:hover::after {
            opacity: 1;
        }

        /* Menu aktif – lebih bercahaya */
        .sidebar .nav .nav-item.active > .nav-link {
            color: #ffd700 !important;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.12), rgba(255, 215, 0, 0.02));
            border-right: 3px solid #ffd700;
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.06), inset 0 0 20px rgba(255, 215, 0, 0.02);
            transform: translateX(4px);
        }

        /* Ikon menu */
        .sidebar .nav .nav-item .nav-link .menu-icon {
            color: #a5d6a7;
            font-size: 1.4rem;
            margin-right: 14px;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            filter: drop-shadow(0 0 6px rgba(165, 214, 167, 0.1));
        }

        .sidebar .nav .nav-item .nav-link:hover .menu-icon {
            transform: scale(1.2) rotate(6deg);
            color: #ffd700;
            filter: drop-shadow(0 0 12px rgba(255, 215, 0, 0.3));
        }

        .sidebar .nav .nav-item.active .menu-icon {
            color: #ffd700;
            filter: drop-shadow(0 0 16px rgba(255, 215, 0, 0.4));
        }

        /* Sub-menu */
        .sidebar .nav .sub-menu {
            background: rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(6px);
            border-radius: 16px;
            margin: 2px 12px 10px 12px;
            padding: 6px 0;
            border: 1px solid rgba(255, 215, 0, 0.05);
        }

        .sidebar .nav .sub-menu .nav-item .nav-link {
            padding: 8px 20px 8px 44px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            border-radius: 12px;
            margin: 2px 6px;
        }

        .sidebar .nav .sub-menu .nav-item .nav-link:hover {
            color: #ffd700;
            background: rgba(255, 215, 0, 0.04);
            transform: translateX(4px);
        }

        .sidebar .nav .sub-menu .nav-item .nav-link.active {
            color: #ffd700;
            background: rgba(255, 215, 0, 0.06);
            border-right: 2px solid #ffd700;
        }

        /* Arrow icon pada menu dengan submenu */
        .sidebar .nav .nav-item .menu-arrow {
            color: #ffd700;
            opacity: 0.4;
            transition: transform 0.3s;
        }

        .sidebar .nav .nav-item .nav-link[aria-expanded="true"] .menu-arrow {
            transform: rotate(180deg);
            opacity: 0.8;
        }

        /* ----------------------------------------------
           SCROLLBAR – lebih minimalis
        ----------------------------------------------- */
        .sidebar::-webkit-scrollbar {
            width: 3px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 215, 0, 0.3);
            border-radius: 10px;
            transition: background 0.3s;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 215, 0, 0.5);
        }

        /* ----------------------------------------------
           RESPONSIF
        ----------------------------------------------- */
        @media (max-width: 991px) {
            .sidebar .floating-farm i { display: none; }
            .sidebar::before, .sidebar::after { display: none; }
            .nav-profile::before { display: none; }
        }
    </style>
@endpush

{{-- ============================================================= --}}
{{-- SIDEBAR HTML (struktur tetap sama, hanya CSS yang ditingkatkan) --}}
{{-- ============================================================= --}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    {{-- Hiasan hewan melayang --}}
    <div class="floating-farm">
        <i class="fas fa-cow"></i>
        <i class="fas fa-kiwi-bird"></i>
        <i class="fas fa-horse-head"></i>
        <i class="fas fa-piggy-bank"></i>
    </div>

    <ul class="nav">
        {{-- PROFILE --}}
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                    <span class="text-secondary text-small">{{ auth()->user()->role }}</span>
                </div>
            </a>
        </li>

        {{-- DASHBOARD --}}
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        {{-- KATEGORI --}}
        <li class="nav-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kategori.index') }}">
                <span class="menu-title">Kategori</span>
                <i class="mdi mdi-shape menu-icon"></i>
            </a>
        </li>

        {{-- BUKU --}}
        <li class="nav-item {{ request()->routeIs('buku.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('buku.index') }}">
                <span class="menu-title">Buku</span>
                <i class="mdi mdi-book-open-page-variant menu-icon"></i>
            </a>
        </li>

        {{-- SERTIFIKAT --}}
        <li class="nav-item {{ request()->routeIs('pdf.sertifikat') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pdf.sertifikat') }}" target="_blank">
                <span class="menu-title">Sertifikat</span>
                <i class="mdi mdi-certificate-outline menu-icon"></i>
            </a>
        </li>

        {{-- UNDANGAN --}}
        <li class="nav-item {{ request()->routeIs('pdf.undangan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pdf.undangan') }}" target="_blank">
                <span class="menu-title">Undangan</span>
                <i class="mdi mdi-email-outline menu-icon"></i>
            </a>
        </li>

        {{-- TAG HARGA + BARCODE READER --}}
        <li class="nav-item {{ request()->routeIs('barang.*') || request()->routeIs('barcode.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#menuTagHarga"
               aria-expanded="{{ request()->routeIs('barang.*') || request()->routeIs('barcode.*') ? 'true' : 'false' }}">
                <span class="menu-title">Tag Harga</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-tag-outline menu-icon"></i>
            </a>
            <div class="collapse {{ request()->routeIs('barang.*') || request()->routeIs('barcode.*') ? 'show' : '' }}" id="menuTagHarga">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                           href="{{ route('barang.index') }}">Cetak Tag Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('barcode.reader') ? 'active' : '' }}"
                           href="{{ route('barcode.reader') }}">Barcode Reader</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- TABEL BIASA --}}
        <li class="nav-item {{ request()->routeIs('js.tabel_biasa') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('js.tabel_biasa') }}">
                <span class="menu-title">Tabel Biasa</span>
                <i class="mdi mdi-table menu-icon"></i>
            </a>
        </li>

        {{-- TABEL DATATABLES --}}
        <li class="nav-item {{ request()->routeIs('js.tabel_datatables') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('js.tabel_datatables') }}">
                <span class="menu-title">Tabel DataTables</span>
                <i class="mdi mdi-table-search menu-icon"></i>
            </a>
        </li>

        {{-- SELECT & SELECT2 --}}
        <li class="nav-item {{ request()->routeIs('js.select') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('js.select') }}">
                <span class="menu-title">Select & Select2</span>
                <i class="mdi mdi-form-select menu-icon"></i>
            </a>
        </li>

        {{-- WILAYAH AJAX --}}
        <li class="nav-item {{ request()->routeIs('js.wilayah_ajax') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('js.wilayah_ajax') }}">
                <span class="menu-title">Wilayah Ajax</span>
                <i class="mdi mdi-map-marker menu-icon"></i>
            </a>
        </li>

        {{-- WILAYAH AXIOS --}}
        <li class="nav-item {{ request()->routeIs('js.wilayah_axios') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('js.wilayah_axios') }}">
                <span class="menu-title">Wilayah Axios</span>
                <i class="mdi mdi-map-marker-outline menu-icon"></i>
            </a>
        </li>

        {{-- POS / KASIR --}}
        <li class="nav-item {{ request()->routeIs('pos.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pos.index') }}">
                <span class="menu-title">Point of Sales</span>
                <i class="mdi mdi-cash-register menu-icon"></i>
            </a>
        </li>

        {{-- RIWAYAT TRANSAKSI --}}
        <li class="nav-item {{ request()->routeIs('pos.riwayat') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pos.riwayat') }}">
                <span class="menu-title">Riwayat Transaksi</span>
                <i class="mdi mdi-history menu-icon"></i>
            </a>
        </li>

        {{-- VENDOR SCAN QR --}}
        <li class="nav-item {{ request()->routeIs('vendor.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('vendor.scan') }}">
                <span class="menu-title">Vendor Scan QR</span>
                <i class="mdi mdi-qrcode-scan menu-icon"></i>
            </a>
        </li>

        {{-- KUNJUNGAN TOKO --}}
        <li class="nav-item {{ request()->routeIs('toko.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#menuToko"
               aria-expanded="{{ request()->routeIs('toko.*') ? 'true' : 'false' }}">
                <span class="menu-title">Kunjungan Toko</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-store menu-icon"></i>
            </a>
            <div class="collapse {{ request()->routeIs('toko.*') ? 'show' : '' }}" id="menuToko">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('toko.index') ? 'active' : '' }}"
                           href="{{ route('toko.index') }}">Data Toko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('toko.kunjungan') ? 'active' : '' }}"
                           href="{{ route('toko.kunjungan') }}">Kunjungan Toko</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- CUSTOMER --}}
        <li class="nav-item {{ request()->routeIs('customer.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#menuCustomer"
               aria-expanded="{{ request()->routeIs('customer.*') ? 'true' : 'false' }}">
                <span class="menu-title">Customer</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-group menu-icon"></i>
            </a>
            <div class="collapse {{ request()->routeIs('customer.*') ? 'show' : '' }}" id="menuCustomer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('customer.index') ? 'active' : '' }}"
                           href="{{ route('customer.index') }}">Data Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('customer.create1') ? 'active' : '' }}"
                           href="{{ route('customer.create1') }}">Tambah Customer 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('customer.create2') ? 'active' : '' }}"
                           href="{{ route('customer.create2') }}">Tambah Customer 2</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- ANTRIAN --}}
        <li class="nav-item {{ request()->is('guest*') || request()->is('admin*') || request()->is('papan*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#menuAntrian"
               aria-expanded="{{ request()->is('guest*') || request()->is('admin*') || request()->is('papan*') ? 'true' : 'false' }}">
                <span class="menu-title">Antrian</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-ticket-confirmation-outline menu-icon"></i>
            </a>
            <div class="collapse {{ request()->is('guest*') || request()->is('admin*') || request()->is('papan*') ? 'show' : '' }}" id="menuAntrian">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('guest') ? 'active' : '' }}" href="/guest">
                            Daftar Antrian (Guest)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" href="/admin">
                            Admin Antrian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('papan') ? 'active' : '' }}" href="/papan" target="_blank">
                            Papan Antrian
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- NFC ABSENSI --}}
        <li class="nav-item {{ request()->routeIs('nfc.*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#menuNfc"
               aria-expanded="{{ request()->routeIs('nfc.*') ? 'true' : 'false' }}">
                <span class="menu-title">NFC Absensi</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-card-account-details-outline menu-icon"></i>
            </a>
            <div class="collapse {{ request()->routeIs('nfc.*') ? 'show' : '' }}" id="menuNfc">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nfc.index') ? 'active' : '' }}"
                           href="{{ route('nfc.index') }}">Data Kartu NFC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nfc.rekap') ? 'active' : '' }}"
                           href="{{ route('nfc.rekap') }}">Rekap Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nfc.scanner') ? 'active' : '' }}"
                           href="{{ route('nfc.scanner') }}" target="_blank">Scanner NFC</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>