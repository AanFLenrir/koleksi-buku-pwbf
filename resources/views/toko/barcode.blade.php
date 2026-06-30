<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Toko - {{ $toko->nama_toko }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(160deg, #e8f5e9 0%, #c8e6c9 40%, #a5d6a7 70%, #81c784 100%);
            padding: 20px;
            position: relative;
        }

        /* Dekorasi latar belakang (tidak akan tercetak) */
        body::before {
            content: '🐄 🐑 🐓 🐖';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2.5rem;
            opacity: 0.08;
            letter-spacing: 20px;
            pointer-events: none;
        }

        body::after {
            content: '🌾 🌿 🌾 🌿';
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 2rem;
            opacity: 0.08;
            letter-spacing: 15px;
            pointer-events: none;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            z-index: 2;
        }

        /* === LABEL BARCODE === */
        .label {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(4px);
            border: 2px solid #2e7d32;
            border-radius: 20px;
            padding: 28px 32px 24px;
            text-align: center;
            width: 380px;
            max-width: 100%;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(255, 215, 0, 0.2) inset;
            transition: transform 0.2s;
            position: relative;
            overflow: hidden;
        }

        /* Decorative corner accents */
        .label::before,
        .label::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            border-color: #ffd700;
            border-style: solid;
            border-width: 0;
            opacity: 0.25;
            pointer-events: none;
        }
        .label::before {
            top: 12px;
            left: 12px;
            border-top-width: 3px;
            border-left-width: 3px;
            border-radius: 8px 0 0 0;
        }
        .label::after {
            bottom: 12px;
            right: 12px;
            border-bottom-width: 3px;
            border-right-width: 3px;
            border-radius: 0 0 8px 0;
        }

        .label .farm-icon {
            font-size: 1.8rem;
            color: #2e7d32;
            display: block;
            margin-bottom: 4px;
        }

        .label h3 {
            font-size: 20px;
            font-weight: 700;
            color: #1b3a2b;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .label .sub-address {
            font-size: 13px;
            color: #4a6b4a;
            margin-bottom: 14px;
            font-weight: 400;
            line-height: 1.4;
        }

        .label .barcode-img {
            width: 100%;
            height: 80px;
            object-fit: contain;
            background: white;
            padding: 4px 0;
            border-top: 1px dashed #d0d0d0;
            border-bottom: 1px dashed #d0d0d0;
        }

        .label .barcode-code {
            font-size: 12px;
            color: #2e4a2e;
            margin-top: 10px;
            letter-spacing: 1.5px;
            font-weight: 600;
            background: rgba(46, 125, 50, 0.06);
            padding: 4px 12px;
            border-radius: 50px;
            display: inline-block;
        }

        .label .footer-note {
            font-size: 10px;
            color: #888;
            margin-top: 12px;
            border-top: 1px solid #e8e8e8;
            padding-top: 10px;
            letter-spacing: 0.3px;
        }

        /* === TOMBOL CETAK === */
        .btn-print {
            padding: 12px 32px;
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(46, 125, 50, 0.3);
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            letter-spacing: 0.5px;
        }

        .btn-print:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 30px rgba(46, 125, 50, 0.45);
            background: linear-gradient(135deg, #388e3c, #1b5e20);
        }

        .btn-print i {
            font-size: 1.2rem;
        }

        /* === RESPONSIVE === */
        @media (max-width: 420px) {
            .label {
                padding: 20px 18px 16px;
                width: 100%;
            }
            .label h3 {
                font-size: 17px;
            }
            .label .barcode-img {
                height: 60px;
            }
            .btn-print {
                padding: 10px 22px;
                font-size: 14px;
            }
            body::before,
            body::after {
                display: none;
            }
        }

        /* ============ PRINT STYLES ============ */
        @media print {
            body {
                background: white !important;
                padding: 0 !important;
                min-height: auto !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
            }

            body::before,
            body::after {
                display: none !important;
            }

            .container {
                gap: 0 !important;
                width: 100% !important;
            }

            .label {
                background: white !important;
                backdrop-filter: none !important;
                border: 1px solid #333 !important;
                border-radius: 8px !important;
                box-shadow: none !important;
                padding: 16px 20px !important;
                width: 340px !important;
                max-width: 100% !important;
                margin: 0 auto !important;
            }

            .label::before,
            .label::after {
                display: none !important;
            }

            .label .farm-icon {
                font-size: 1.4rem !important;
            }

            .label h3 {
                font-size: 18px !important;
                color: #000 !important;
            }

            .label .sub-address {
                font-size: 12px !important;
                color: #444 !important;
            }

            .label .barcode-img {
                height: 70px !important;
                border-top: 1px solid #ccc !important;
                border-bottom: 1px solid #ccc !important;
                padding: 2px 0 !important;
            }

            .label .barcode-code {
                font-size: 11px !important;
                background: none !important;
                padding: 2px 0 !important;
                color: #222 !important;
            }

            .label .footer-note {
                font-size: 9px !important;
                color: #999 !important;
                border-top-color: #ddd !important;
                padding-top: 6px !important;
                margin-top: 8px !important;
            }

            .btn-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<div class="container">

    {{-- LABEL BARCODE --}}
    <div class="label">
        <span class="farm-icon">🏪</span>
        <h3>{{ $toko->nama_toko }}</h3>
        <p class="sub-address">{{ $toko->alamat ?? 'Alamat tidak tersedia' }}</p>

        <img class="barcode-img"
             src="data:image/png;base64,{{ $barcode }}"
             alt="Barcode {{ $toko->barcode }}">

        <div class="barcode-code">{{ $toko->barcode }}</div>
        <div class="footer-note">
            <i class="fas fa-seedling" style="color: #2e7d32; margin-right: 4px;"></i>
            FarmNex • Sistem Manajemen Peternakan
        </div>
    </div>

    {{-- TOMBOL CETAK --}}
    <button class="btn-print" onclick="window.print()">
        <i class="fas fa-print"></i> Cetak Label
    </button>

</div>

</body>
</html>