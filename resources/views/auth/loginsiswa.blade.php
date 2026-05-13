<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa | SMK Negeri 1 Karang Baru</title>

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- ADMINLTE --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        :root {
            --primary-green: #10b981;
            --dark-green: #059669;
            --soft-green: #ecfdf5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 950px;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 25px 50px rgba(0,0,0,0.12);
        }

        /* SIDEBAR */
        .login-sidebar {
            flex: 1;
            background: linear-gradient(180deg,
                    var(--primary-green) 0%,
                    var(--dark-green) 100%);
            padding: 45px;
            color: white;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .login-sidebar::before,
        .login-sidebar::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }

        .login-sidebar::before {
            width: 250px;
            height: 250px;
            top: -80px;
            right: -80px;
        }

        .login-sidebar::after {
            width: 180px;
            height: 180px;
            bottom: -60px;
            left: -60px;
            background: rgba(255,255,255,0.05);
        }

        .login-sidebar img {
            max-width: 280px;
            width: 100%;
            margin-bottom: 25px;
            z-index: 2;
            animation: float 4s ease-in-out infinite;
            filter: drop-shadow(0 12px 20px rgba(0,0,0,0.15));
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        .login-sidebar h3 {
            font-weight: 700;
            margin-bottom: 10px;
            z-index: 2;
        }

        .login-sidebar p {
            font-size: 0.95rem;
            opacity: .9;
            line-height: 1.7;
            z-index: 2;
        }

        /* FORM AREA */
        .login-form-area {
            flex: 1;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-logo {
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--dark-green);
            margin-bottom: 35px;
            text-align: center;
            letter-spacing: 1px;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: #6b7280;
            margin-bottom: 35px;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .form-group label {
            font-size: 0.85rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 14px;
            border: 2px solid #e5e7eb;
            background: #f9fafb;
            padding: 14px 18px;
            transition: .3s;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            background: #fff;
            box-shadow: 0 0 0 5px rgba(16,185,129,0.12);
        }

        .btn-login {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 14px;
            background: linear-gradient(135deg,
                    var(--primary-green),
                    var(--dark-green));
            color: white;
            font-weight: 700;
            margin-top: 10px;
            transition: .3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px rgba(16,185,129,0.35);
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: #6b7280;
            text-decoration: none;
        }

        /* LOGO FIX */
        .login-logo {
            width: 95px;
            height: 95px;
            object-fit: contain;
            background: transparent !important;
            border: none;
            filter: drop-shadow(0 8px 18px rgba(0,0,0,0.15));
            transition: 0.3s ease;
        }

        .login-logo:hover {
            transform: scale(1.08);
        }

        /* RESPONSIVE */
        @media(max-width:768px){
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }

            .login-sidebar {
                padding: 35px 25px;
            }

            .login-form-area {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    {{-- SIDEBAR --}}
    <div class="login-sidebar d-none d-md-flex">

        <h3>Halo Sobat SMKN 1 👋</h3>

        <p>
            Ayo lakukan absensi hari ini dan tingkatkan
            kedisiplinan untuk masa depan yang lebih baik.
        </p>

    </div>

    {{-- FORM --}}
    <div class="login-form-area">

        {{-- LOGO SEKOLAH --}}
        <div class="text-center mb-3">

            <img src="{{ asset('dist/img/foto1.png') }}"
                 alt="Logo Sekolah"
                 class="login-logo">

        </div>

        <div class="brand-logo">
            E-ABSENSI
        </div>

        <h2 class="form-title">Login Siswa</h2>

        <p class="form-subtitle">
            Masukkan NIS dan password untuk masuk ke sistem absensi siswa.
        </p>

        <form action="{{ route('login.siswa.process') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>NOMOR INDUK SISWA (NIS)</label>
                <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
            </div>

            <div class="form-group mb-4">
                <label>PASSWORD</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn btn-login">
                Masuk Sekarang <i class="fas fa-arrow-right ml-2"></i>
            </button>

        </form>

        <div class="back-link mt-3">

            <a href="/">Kembali ke Beranda</a>

            <div class="mt-3">
                <small class="text-muted">
                    &copy; 2026 SMK Negeri 1 Karang Baru
                </small>
            </div>

        </div>

    </div>

</div>

</body>
</html>