{{--
=============================================================
NAVBAR – Tema Peternakan Futuristik
=============================================================
Semua fungsi toggle, search, dropdown, fullscreen, dan logout
tetap berjalan normal. Hanya CSS dan ikon dekoratif yang
ditambahkan untuk menyelaraskan dengan tema peternakan.
=============================================================
--}}

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ----------------------------------------------
           NAVBAR UTAMA
        ----------------------------------------------- */
        .default-layout-navbar {
            background: linear-gradient(135deg, #1b3a2b 0%, #2a5a3a 50%, #1e4d2f 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            border-bottom: 2px solid rgba(255, 215, 0, 0.2);
            position: relative;
            z-index: 1030;
        }

        /* Logo */
        .navbar-brand-wrapper .navbar-brand {
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.2));
            transition: filter 0.3s;
        }
        .navbar-brand-wrapper .navbar-brand:hover {
            filter: drop-shadow(0 0 20px rgba(255,215,0,0.5));
        }

        /* Tambahan ikon hewan di samping logo (hanya dekorasi) */
        .navbar-brand-wrapper::after {
            content: '\f6ba'; /* Font Awesome cow */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: rgba(255,215,0,0.15);
            font-size: 2rem;
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        /* Toggle button */
        .navbar-toggler {
            color: #ffd700 !important;
            border: none;
            transition: transform 0.3s;
        }
        .navbar-toggler:hover {
            transform: scale(1.1);
            color: #fff !important;
        }

        /* Search field */
        .search-field .input-group {
            background: rgba(255,255,255,0.06);
            border-radius: 50px;
            padding: 0 15px;
            border: 1px solid rgba(255,215,0,0.1);
            transition: all 0.3s;
            backdrop-filter: blur(4px);
        }
        .search-field .input-group:focus-within {
            border-color: #ffd700;
            box-shadow: 0 0 20px rgba(255,215,0,0.1);
            background: rgba(255,255,255,0.1);
        }
        .search-field .input-group-text {
            color: #ffd700;
            background: transparent !important;
            border: none !important;
        }
        .search-field .form-control {
            color: #e6f1ff;
            font-weight: 300;
        }
        .search-field .form-control::placeholder {
            color: rgba(255,255,255,0.4);
        }
        .search-field .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        /* Navbar right icons */
        .navbar-nav-right .nav-link {
            color: rgba(255,255,255,0.7) !important;
            transition: all 0.3s;
            position: relative;
        }
        .navbar-nav-right .nav-link:hover {
            color: #ffd700 !important;
            transform: translateY(-2px);
        }
        .navbar-nav-right .nav-link i {
            font-size: 1.3rem;
        }

        /* Profile section */
        .nav-profile .nav-profile-img img {
            border: 2px solid #ffd700;
            box-shadow: 0 0 15px rgba(255,215,0,0.2);
        }
        .nav-profile .availability-status.online {
            background: #00e676;
            box-shadow: 0 0 10px #00e676;
        }
        .nav-profile .nav-profile-text p {
            color: #fff !important;
            font-weight: 500;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        /* Dropdown menu */
        .navbar-dropdown {
            background: rgba(27, 58, 43, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,215,0,0.2);
            border-radius: 16px;
            box-shadow: 0 20px 40px -8px rgba(0,0,0,0.5);
            padding: 8px 0;
        }
        .navbar-dropdown .dropdown-item {
            color: #e6f1ff;
            padding: 10px 20px;
            transition: all 0.2s;
            border-radius: 8px;
        }
        .navbar-dropdown .dropdown-item:hover {
            background: rgba(255,215,0,0.1);
            color: #ffd700;
        }
        .navbar-dropdown .dropdown-item i {
            color: #ffd700;
        }

        /* Count indicator (notifikasi) */
        .count-indicator .count-symbol {
            border: 2px solid #1b3a2b;
            box-shadow: 0 0 10px rgba(255,215,0,0.3);
        }
        .count-indicator .count-symbol.bg-warning {
            background: #ffd700 !important;
        }
        .count-indicator .count-symbol.bg-danger {
            background: #ff6b6b !important;
        }

        /* Fullscreen & power icons */
        .nav-item.d-none.d-lg-block .nav-link {
            color: rgba(255,255,255,0.6) !important;
        }
        .nav-item.d-none.d-lg-block .nav-link:hover {
            color: #ffd700 !important;
        }

        /* Responsif */
        @media (max-width: 991px) {
            .navbar-brand-wrapper::after {
                display: none;
            }
        }
    </style>
@endpush

{{-- ============================================================= --}}
{{-- NAVBAR HTML (dengan tambahan dekorasi)                        --}}
{{-- ============================================================= --}}

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    {{-- LOGO --}}
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" />
        </a>
        {{-- Tambahan ikon hewan kecil di sisi logo (opsional) --}}
        <span style="position: absolute; right: -10px; top: 50%; transform: translateY(-50%); font-size: 1.8rem; color: rgba(255,215,0,0.1); pointer-events: none;">
            <i class="fas fa-cow"></i>
        </span>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch">

        {{-- SIDEBAR TOGGLE --}}
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        {{-- SEARCH --}}
        <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="Cari di peternakan...">
                </div>
            </form>
        </div>

        <ul class="navbar-nav navbar-nav-right">

            {{-- PROFILE --}}
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <div class="nav-profile-img">
                        <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" style="border: none; background: transparent; width: 100%; text-align: left;">
                            <i class="mdi mdi-logout mr-2 text-primary"></i> Signout
                        </button>
                    </form>
                </div>
            </li>

            {{-- FULLSCREEN --}}
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="#" id="fullscreen-button">
                    <i class="mdi mdi-fullscreen"></i>
                </a>
            </li>

            {{-- MESSAGE --}}
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-email-outline"></i>
                    <span class="count-symbol bg-warning"></span>
                </a>
            </li>

            {{-- NOTIFICATION --}}
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
            </li>

            {{-- POWER --}}
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-power"></i>
                </a>
            </li>

            {{-- RIGHT SIDEBAR TOGGLE --}}
            <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-format-line-spacing"></i>
                </a>
            </li>

        </ul>
    </div>
</nav>