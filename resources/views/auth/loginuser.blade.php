<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User | SMK Negeri 1 Karang Baru</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        :root {
            --user-primary: #4f46e5;
            --user-secondary: #1e293b;
            --user-accent: #818cf8;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a;

            background-image:
                radial-gradient(at 0% 0%,
                rgba(79, 70, 229, 0.15) 0px,
                transparent 50%),

                radial-gradient(at 100% 100%,
                rgba(129, 140, 248, 0.1) 0px,
                transparent 50%);

            height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0;
            padding: 20px;
        }

        .user-login-card {
            width: 100%;
            max-width: 950px;

            display: flex;

            background: rgba(255, 255, 255, 0.02);

            border-radius: 30px;

            overflow: hidden;

            border: 1px solid rgba(255, 255, 255, 0.1);

            backdrop-filter: blur(20px);

            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* =========================
           SISI KIRI
        ========================= */
        .user-visual-side {
            flex: 1.2;

            background: var(--user-secondary);

            padding: 60px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            position: relative;

            overflow: hidden;
        }

        .user-visual-side::after {
            content: '';

            position: absolute;

            top: -50px;
            right: -50px;

            width: 200px;
            height: 200px;

            background: var(--user-primary);

            filter: blur(100px);

            opacity: 0.3;
        }

        .school-identity {
            z-index: 1;
        }

        .school-identity h3 {
            font-weight: 800;

            color: white;

            letter-spacing: -1px;

            font-size: 1.8rem;

            margin-bottom: 5px;
        }

        .school-identity span {
            color: var(--user-accent);

            text-transform: uppercase;

            font-size: 0.8rem;

            font-weight: 700;

            letter-spacing: 2px;
        }

        .illustration-box {
            position: relative;

            z-index: 1;

            text-align: center;
        }

        .illustration-box i {
            font-size: 120px;

            background: linear-gradient(135deg, #fff, var(--user-accent));

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        }

        .welcome-msg {
            z-index: 1;
        }

        .welcome-msg h4 {
            color: white;

            font-weight: 700;
        }

        .welcome-msg p {
            color: #94a3b8;

            font-size: 0.9rem;

            line-height: 1.6;
        }

        /* =========================
           SISI KANAN
        ========================= */
        .user-form-side {
            flex: 1;

            background: white;

            padding: 60px 50px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-weight: 800;

            color: #1e293b;

            margin-bottom: 8px;
        }

        .form-header p {
            color: #64748b;

            font-size: 0.9rem;
        }

        .input-custom {
            background: #f8fafc;

            border: 2px solid #f1f5f9;

            border-radius: 15px;

            padding: 14px 20px;

            height: auto;

            transition: 0.3s;

            font-weight: 500;
        }

        .input-custom:focus {
            background: white;

            border-color: var(--user-primary);

            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .btn-user-login {
            background: var(--user-primary);

            color: white;

            border: none;

            border-radius: 15px;

            padding: 16px;

            font-weight: 700;

            width: 100%;

            margin-top: 20px;

            box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.4);

            transition: 0.3s;
        }

        .btn-user-login:hover {
            background: #4338ca;

            transform: translateY(-2px);

            box-shadow: 0 15px 25px -5px rgba(79, 70, 229, 0.5);

            color: white;
        }

        .back-to-web {
            text-align: center;

            margin-top: 35px;
        }

        .back-to-web a {
            color: #94a3b8;

            text-decoration: none;

            font-size: 0.85rem;

            font-weight: 600;

            transition: 0.3s;
        }

        .back-to-web a:hover {
            color: var(--user-primary);
        }

        /* ICON MATA */
        .password-toggle {
            position: absolute;

            right: 18px;

            top: 50%;

            transform: translateY(-50%);

            cursor: pointer;

            color: #64748b;

            z-index: 10;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {

            .user-login-card {
                flex-direction: column;

                max-width: 450px;
            }

            .user-visual-side {
                padding: 40px;

                text-align: center;
            }

            .illustration-box {
                margin: 30px 0;
            }

            .user-form-side {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

<div class="user-login-card">

    <!-- =========================
         SISI KIRI
    ========================= -->
    <div class="user-visual-side">

        <div class="school-identity">

            <span>Official System</span>

            <h3>
                SMKN 1<br>
                Karang Baru
            </h3>

        </div>

        <div class="illustration-box">

            <i class="fas fa-user-shield"></i>

        </div>

        <div class="welcome-msg">

            <h4>Dashboard Management</h4>

            <p>
                Gunakan akun terdaftar Anda untuk
                mengelola sistem kehadiran dan data akademik.
            </p>

        </div>

    </div>

    <!-- =========================
         SISI KANAN
    ========================= -->
    <div class="user-form-side">

        <div class="form-header">

            <h2>Login User</h2>

            <p>
                Selamat datang kembali,
                silakan masuk.
            </p>

        </div>

        <form action="{{ route('login.user.process') }}"
              method="POST">

            @csrf

            <!-- USERNAME -->
            <div class="form-group mb-3">

                <label class="small fw-bold text-uppercase text-muted mb-2">
                    Username
                </label>

                <input type="text"
                       name="username"
                       class="form-control input-custom"
                       placeholder="Masukkan username"
                       required>

            </div>

            <!-- PASSWORD -->
            <div class="form-group mb-4">

                <label class="small fw-bold text-uppercase text-muted mb-2">
                    Password
                </label>

                <div style="position: relative;">

                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control input-custom"
                           placeholder="••••••••"
                           required>

                    <span class="password-toggle"
                          id="togglePassword">

                        <i class="fas fa-eye"></i>

                    </span>

                </div>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="btn btn-user-login">

                Akses Dashboard
                <i class="fas fa-rocket ml-2"></i>

            </button>

        </form>

        <!-- BACK -->
        <div class="back-to-web">

            <a href="/">

                <i class="fas fa-long-arrow-alt-left mr-2"></i>

                Kembali ke Beranda

            </a>

            <div class="mt-4 opacity-50">

                <small>
                    © {{ date('Y') }}
                    Central Authority SMKN 1 KB
                </small>

            </div>

        </div>

    </div>

</div>

<!-- =========================
     SCRIPT SHOW PASSWORD
========================= -->
<script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('password');

    togglePassword.addEventListener('click', function () {

        const type =
            password.getAttribute('type') === 'password'
            ? 'text'
            : 'password';

        password.setAttribute('type', type);

        this.innerHTML =
            type === 'password'
            ? '<i class="fas fa-eye"></i>'
            : '<i class="fas fa-eye-slash"></i>';

    });

</script>

</body>

</html>