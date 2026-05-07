<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa | SMK Negeri 1 Karang Baru</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        :root {
            --primary-green: #10b981;
            --dark-green: #059669;
            --soft-green: #ecfdf5;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 900px;
            display: flex;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            min-height: 550px;
        }

        /* Sisi Kiri - Karakter/Ilustrasi */
        .login-sidebar {
            flex: 1;
            background: var(--primary-green);
            background: linear-gradient(180deg, var(--primary-green) 0%, var(--dark-green) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
            text-align: center;
            position: relative;
        }

        .login-sidebar img {
            width: 100%;
            max-width: 280px;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));
            margin-bottom: 20px;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .login-sidebar h3 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-sidebar p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        /* Sisi Kanan - Form */
        .login-form-area {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-title {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
            font-size: 1.75rem;
        }

        .form-subtitle {
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        .form-group label {
            font-weight: 600;
            color: #374151;
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            height: auto;
            border: 2px solid #e5e7eb;
            transition: all 0.2s;
            background-color: #f9fafb;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .btn-login {
            background-color: var(--primary-green);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            color: #fff;
            width: 100%;
            margin-top: 15px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            background-color: var(--dark-green);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.4);
            color: #fff;
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: #6b7280;
            text-decoration: none;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .back-link a:hover {
            color: var(--primary-green);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }
            .login-sidebar {
                padding: 30px;
            }
            .login-sidebar img {
                max-width: 150px;
            }
            .login-form-area {
                padding: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <!-- Sisi Kiri: Karakter & Info -->
        <div class="login-sidebar d-none d-md-flex">
            <!-- Gambar Karakter (Ganti URL ini dengan path gambar karakter siswa anda) -->
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/male-student-attending-online-class-illustration-download-in-svg-png-gif-file-formats--educational-learning-education-pack-people-illustrations-5381395.png" alt="Siswa Karakter">
            <h3>Halo, Sobat SMKN 1!</h3>
            <p>Ayo presensi hari ini dan raih prestasimu dengan kedisiplinan tinggi.</p>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="login-form-area">
            <div class="brand-logo">
                <i class="fas fa-graduation-cap"></i>
                <span>E-ABSENSI</span>
            </div>

            <h2 class="form-title">Login Siswa</h2>
            <p class="form-subtitle">Masukkan NIS dan password untuk masuk ke akun anda.</p>

            <form action="{{ route('login.siswa.process') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>NOMOR INDUK SISWA (NIS)</label>
                    <div class="input-group">
                        <input type="text" name="nis" class="form-control" placeholder="Contoh: 12345" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label>PASSWORD</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">
                    Masuk Sekarang <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>

            <div class="back-link">
                <a href="/">
                    <i class="fas fa-chevron-left mr-1"></i> Kembali ke Beranda
                </a>
                <div class="mt-3">
                    <small class="text-muted">&copy; 2026 SMK Negeri 1 Karang Baru</small>
                </div>
            </div>
        </div>
    </div>

</body>

</html>