{{--
=============================================================
SOFTWARE DESIGN DOCUMENT – Login Page (Farm Theme ++)
=============================================================
Tema        : Peternakan Hewan dengan sentuhan futuristik
Elemen CSS  : Rumput, pagar, awan, hewan berjalan, matahari
Animasi     : Awan bergerak, hewan berjalan, rumput bergoyang
Warna       : Hijau rumput (#2e7d32), biru langit (#4fc3f7), emas (#ffd700)
=============================================================
--}}

@extends('layouts.auth')

@section('title', 'Login - FarmNex')

@push('styles')
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* -----------------------------------------------
           1. GLOBAL & BACKGROUND (Langit + Rumput)
        ----------------------------------------------- */
        .auth-page {
            background: linear-gradient(180deg, #4fc3f7 0%, #81d4fa 30%, #a5d6a7 70%, #66bb6a 100%);
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Matahari */
        .sun {
            position: absolute;
            top: 40px;
            right: 60px;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, #fff9c4, #ffd54f);
            border-radius: 50%;
            box-shadow: 0 0 80px rgba(255, 213, 79, 0.6);
            animation: pulseSun 4s ease-in-out infinite alternate;
            z-index: 1;
        }

        @keyframes pulseSun {
            0% { transform: scale(1); box-shadow: 0 0 60px rgba(255, 213, 79, 0.4); }
            100% { transform: scale(1.1); box-shadow: 0 0 100px rgba(255, 213, 79, 0.8); }
        }

        /* Awan bergerak */
        .cloud {
            position: absolute;
            background: rgba(255,255,255,0.7);
            border-radius: 100px;
            filter: blur(1px);
            z-index: 1;
            animation: moveCloud 20s linear infinite;
        }

        .cloud::before, .cloud::after {
            content: '';
            position: absolute;
            background: inherit;
            border-radius: 50%;
        }

        .cloud1 {
            width: 180px;
            height: 50px;
            top: 60px;
            left: -200px;
            animation-duration: 25s;
        }
        .cloud1::before {
            width: 70px;
            height: 70px;
            top: -30px;
            left: 20px;
        }
        .cloud1::after {
            width: 100px;
            height: 80px;
            top: -40px;
            left: 70px;
        }

        .cloud2 {
            width: 220px;
            height: 60px;
            top: 120px;
            left: -300px;
            animation-duration: 30s;
            animation-delay: 5s;
        }
        .cloud2::before {
            width: 90px;
            height: 90px;
            top: -40px;
            left: 30px;
        }
        .cloud2::after {
            width: 120px;
            height: 100px;
            top: -50px;
            left: 90px;
        }

        @keyframes moveCloud {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(100vw + 400px)); }
        }

        /* -----------------------------------------------
           2. RUMPUT & PAGAR (di bagian bawah)
        ----------------------------------------------- */
        .grass {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: #2e7d32;
            z-index: 2;
            border-top: 4px solid #1b5e20;
        }

        .grass::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
            height: 40px;
            background: repeating-linear-gradient(75deg,
                #388e3c 0px, #388e3c 10px,
                #2e7d32 10px, #2e7d32 20px);
            clip-path: polygon(0% 100%, 10% 0%, 20% 100%, 30% 0%, 40% 100%, 50% 0%, 60% 100%, 70% 0%, 80% 100%, 90% 0%, 100% 100%);
            animation: swayGrass 3s ease-in-out infinite alternate;
        }

        @keyframes swayGrass {
            0% { transform: skewX(-2deg); }
            100% { transform: skewX(2deg); }
        }

        /* Pagar kayu */
        .fence {
            position: absolute;
            bottom: 70px;
            left: 0;
            right: 0;
            height: 40px;
            display: flex;
            justify-content: space-around;
            padding: 0 10px;
            z-index: 3;
            pointer-events: none;
        }

        .fence .post {
            width: 12px;
            height: 100%;
            background: #6d4c41;
            border-radius: 4px 4px 0 0;
            box-shadow: 0 -4px 0 #4e342e;
            position: relative;
        }

        .fence .post::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -20px;
            right: -20px;
            height: 8px;
            background: #8d6e63;
            border-radius: 4px;
            box-shadow: 0 -15px 0 #8d6e63, 0 15px 0 #8d6e63;
        }

        /* -----------------------------------------------
           3. HEWAN BERJALAN (di atas rumput)
        ----------------------------------------------- */
        .walking-animals {
            position: absolute;
            bottom: 80px;
            left: 0;
            right: 0;
            z-index: 4;
            pointer-events: none;
            display: flex;
            justify-content: space-around;
            animation: walk 18s linear infinite;
        }

        .walking-animals i {
            font-size: 2.8rem;
            color: #4e342e;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
            animation: bounceAnimal 1.2s ease-in-out infinite alternate;
        }

        .walking-animals i:nth-child(1) { animation-delay: 0s; }
        .walking-animals i:nth-child(2) { animation-delay: 0.4s; font-size: 2.2rem; }
        .walking-animals i:nth-child(3) { animation-delay: 0.8s; font-size: 3rem; }

        @keyframes walk {
            0% { transform: translateX(-100px); }
            100% { transform: translateX(100vw); }
        }

        @keyframes bounceAnimal {
            0% { transform: translateY(0) rotate(-3deg); }
            100% { transform: translateY(-15px) rotate(3deg); }
        }

        /* -----------------------------------------------
           4. KARTU LOGIN (Glassmorphism + tema)
        ----------------------------------------------- */
        .login-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 40px;
            padding: 2.5rem 2rem;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 30px 60px -20px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.1) inset;
            position: relative;
            z-index: 10;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 80px -20px rgba(0,0,0,0.7), 0 0 0 2px rgba(255,215,0,0.2) inset;
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.8rem;
        }

        .login-header .farm-logo {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            color: #fff;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            letter-spacing: 2px;
        }

        .login-header .farm-logo i {
            color: #ffd700;
            margin-right: 8px;
            filter: drop-shadow(0 0 10px rgba(255,215,0,0.5));
        }

        .login-header .subtitle {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 300;
            letter-spacing: 1px;
            background: rgba(0,0,0,0.2);
            display: inline-block;
            padding: 0.2rem 1.2rem;
            border-radius: 50px;
            backdrop-filter: blur(4px);
            margin-top: 0.3rem;
        }

        /* Form */
        .form-group {
            position: relative;
            margin-bottom: 1.6rem;
        }

        .form-group .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #ffd700;
            font-size: 1.1rem;
            opacity: 0.7;
            z-index: 5;
            transition: opacity 0.3s;
        }

        .form-control {
            background: rgba(255,255,255,0.1) !important;
            border: 1.5px solid rgba(255,255,255,0.2) !important;
            border-radius: 50px !important;
            padding: 0.9rem 1.2rem 0.9rem 3.2rem !important;
            color: #fff !important;
            font-size: 1rem;
            font-weight: 300;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        }

        .form-control:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 30px rgba(255,215,0,0.2), 0 0 0 2px rgba(255,215,0,0.1) inset !important;
            background: rgba(255,255,255,0.15) !important;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.5) !important;
        }

        .form-control:focus + .input-icon {
            opacity: 1;
        }

        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.8rem;
            padding-left: 1.2rem;
        }

        /* Tombol */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #ffd700, #f57c00);
            border: none;
            border-radius: 50px !important;
            padding: 0.9rem !important;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 2px;
            color: #1b1b1b !important;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px -6px rgba(255,215,0,0.4);
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .btn-gradient-primary:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 35px -6px rgba(255,215,0,0.6);
            background: linear-gradient(135deg, #ffe082, #f57c00);
        }

        .btn-google {
            background: rgba(255,255,255,0.08);
            border: 1.5px solid rgba(255,255,255,0.2);
            border-radius: 50px !important;
            padding: 0.9rem !important;
            font-weight: 500;
            color: #fff !important;
            transition: all 0.3s ease;
        }

        .btn-google:hover {
            background: rgba(255,255,255,0.18);
            border-color: #ff6b6b;
            box-shadow: 0 0 25px rgba(255,107,107,0.2);
        }

        .btn-google i {
            margin-right: 10px;
            color: #ff6b6b;
        }

        /* Divider */
        .divider-text {
            display: flex;
            align-items: center;
            color: rgba(255,255,255,0.4);
            font-size: 0.8rem;
            letter-spacing: 1px;
            margin: 1.5rem 0;
        }

        .divider-text::before,
        .divider-text::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .divider-text::before { margin-right: 1rem; }
        .divider-text::after { margin-left: 1rem; }

        .alert-danger {
            background: rgba(255,107,107,0.15);
            border: 1px solid rgba(255,107,107,0.3);
            border-radius: 50px;
            color: #ff6b6b;
            padding: 0.6rem 1.5rem;
            backdrop-filter: blur(4px);
        }

        /* -----------------------------------------------
           5. RESPONSIF
        ----------------------------------------------- */
        @media (max-width: 576px) {
            .login-card {
                padding: 1.8rem 1.2rem;
                margin: 1rem;
            }
            .login-header .farm-logo {
                font-size: 2rem;
            }
            .walking-animals i {
                font-size: 2rem !important;
            }
            .cloud1, .cloud2 { display: none; }
            .sun { width: 50px; height: 50px; top: 20px; right: 20px; }
        }
    </style>
@endpush

@section('content')
    {{-- Elemen dekoratif --}}
    <div class="sun"></div>
    <div class="cloud cloud1"></div>
    <div class="cloud cloud2"></div>

    {{-- Hewan berjalan di atas rumput --}}
    <div class="walking-animals">
        <i class="fas fa-cow"></i>
        <i class="fas fa-horse"></i>
        <i class="fas fa-kiwi-bird"></i>
    </div>

    {{-- Pagar dan rumput --}}
    <div class="grass"></div>
    <div class="fence">
        <span class="post"></span>
        <span class="post"></span>
        <span class="post"></span>
        <span class="post"></span>
        <span class="post"></span>
        <span class="post"></span>
        <span class="post"></span>
    </div>

    {{-- Kartu Login --}}
    <div class="login-card">
        <div class="login-header">
            <div class="farm-logo">
                <i class="fas fa-gate"></i> FARM<span style="color: #ffd700;">NEX</span>
            </div>
            <div class="subtitle">
                <i class="fas fa-seedling" style="margin-right: 6px;"></i>
                Smart Livestock • Futuristic
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                <i class="fas fa-exclamation-triangle" style="margin-right: 10px;"></i>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email"
                    name="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password"
                    name="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    placeholder="Password"
                    required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                    <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i> Sign In
                </button>
            </div>

            <div class="divider-text"><span>OR</span></div>

            <div class="mt-2">
                <a href="{{ route('google.login') }}" class="btn btn-block btn-google btn-lg font-weight-medium">
                    <i class="fab fa-google"></i> Login with Google
                </a>
            </div>

            <div class="text-center mt-3" style="color: rgba(255,255,255,0.3); font-size: 0.75rem;">
                <i class="fas fa-shield-alt" style="margin-right: 4px;"></i> Secure • 256-bit encryption
            </div>
        </form>
    </div>
@endsection