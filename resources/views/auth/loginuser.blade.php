@extends('layouts.applanding')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
    rel="stylesheet">

<link rel="stylesheet"
    href="{{ asset('dist/css/adminlte.min.css') }}">

<link rel="stylesheet"
    href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

<style>

    :root {

        --primary: #f59e0b;
        --secondary: #d97706;
        --soft: #fffbeb;

    }

    body {

        font-family: 'Plus Jakarta Sans', sans-serif;

        background: linear-gradient(
            135deg,
            #fff7ed 0%,
            #fef3c7 100%
        );

    }

    .login-wrapper {

        min-height: 100vh;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 40px 20px;

    }

    .user-login-card {

        width: 100%;

        max-width: 950px;

        display: flex;

        background: white;

        border-radius: 28px;

        overflow: hidden;

        box-shadow: 0 20px 45px rgba(0,0,0,0.08);

    }

    /*
    |--------------------------------------------------------------------------
    | LEFT SIDE
    |--------------------------------------------------------------------------
    */

    .user-visual-side {

        flex: 1.1;

        background: linear-gradient(
            180deg,
            var(--primary),
            var(--secondary)
        );

        padding: 60px 50px;

        color: white;

        display: flex;

        flex-direction: column;

        justify-content: center;

        position: relative;

        overflow: hidden;

    }

    .user-visual-side::before {

        content: '';

        position: absolute;

        width: 250px;

        height: 250px;

        border-radius: 50%;

        background: rgba(255,255,255,0.10);

        top: -80px;

        right: -80px;

    }

    .user-visual-side::after {

        content: '';

        position: absolute;

        width: 180px;

        height: 180px;

        border-radius: 50%;

        background: rgba(255,255,255,0.06);

        bottom: -60px;

        left: -60px;

    }

    .school-identity {

        position: relative;

        z-index: 2;

    }

    .school-identity span {

        font-size: 0.8rem;

        letter-spacing: 2px;

        font-weight: 700;

        opacity: .85;

        text-transform: uppercase;

    }

    .school-identity h3 {

        font-size: 2rem;

        font-weight: 800;

        margin-top: 10px;

        line-height: 1.3;

    }

    .illustration-box {

        text-align: center;

        margin: 50px 0;

        position: relative;

        z-index: 2;

    }

    .illustration-box i {

        font-size: 110px;

        opacity: .95;

    }

    .welcome-msg {

        position: relative;

        z-index: 2;

    }

    .welcome-msg h4 {

        font-weight: 700;

        margin-bottom: 12px;

    }

    .welcome-msg p {

        line-height: 1.8;

        opacity: .92;

        font-size: 0.95rem;

    }

    /*
    |--------------------------------------------------------------------------
    | RIGHT SIDE
    |--------------------------------------------------------------------------
    */

    .user-form-side {

        flex: 1;

        background: white;

        padding: 60px 50px;

        display: flex;

        flex-direction: column;

        justify-content: center;

    }

    .form-header {

        margin-bottom: 35px;

    }

    .form-header h2 {

        font-size: 2rem;

        font-weight: 800;

        color: #111827;

        margin-bottom: 8px;

    }

    .form-header p {

        color: #6b7280;

        font-size: 0.95rem;

        line-height: 1.7;

    }

    /*
    |--------------------------------------------------------------------------
    | INPUT
    |--------------------------------------------------------------------------
    */

    .input-custom {

        background: #fffbeb;

        border: 2px solid #fde68a;

        border-radius: 14px;

        padding: 14px 18px;

        height: auto;

        transition: .3s;

    }

    .input-custom:focus {

        border-color: var(--primary);

        background: white;

        box-shadow: 0 0 0 5px rgba(245,158,11,0.15);

    }

    /*
    |--------------------------------------------------------------------------
    | BUTTON
    |--------------------------------------------------------------------------
    */

    .btn-user-login {

        width: 100%;

        border: none;

        border-radius: 14px;

        padding: 14px;

        background: linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

        color: white;

        font-weight: 700;

        margin-top: 10px;

        transition: .3s;

    }

    .btn-user-login:hover {

        transform: translateY(-2px);

        box-shadow: 0 12px 20px rgba(245,158,11,0.35);

        color: white;

    }

    /*
    |--------------------------------------------------------------------------
    | PASSWORD ICON
    |--------------------------------------------------------------------------
    */

    .password-toggle {

        position: absolute;

        right: 18px;

        top: 50%;

        transform: translateY(-50%);

        cursor: pointer;

        color: #6b7280;

    }

    /*
    |--------------------------------------------------------------------------
    | FOOTER
    |--------------------------------------------------------------------------
    */

    .back-to-web {

        text-align: center;

        margin-top: 30px;

    }

    .back-to-web a {

        color: #6b7280;

        text-decoration: none;

        transition: .3s;

    }

    .back-to-web a:hover {

        color: var(--secondary);

    }

    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

    @media(max-width:850px){

        .user-login-card {

            flex-direction: column;

            max-width: 450px;

        }

        .user-visual-side {

            padding: 40px 30px;

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

<div class="login-wrapper">

    <div class="user-login-card">

        <!-- LEFT -->
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

                <h4>
                    Dashboard Management
                </h4>

                <p>
                    Gunakan akun terdaftar Anda untuk
                    mengelola sistem kehadiran
                    dan data akademik sekolah.
                </p>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="user-form-side">

            <div class="form-header">

                <h2>

                    Login User

                </h2>

                <p>

                    Selamat datang kembali,
                    silakan masuk ke dashboard.

                </p>

            </div>

            <form
                action="{{ route('login.user.process') }}"
                method="POST"
            >

                @csrf

                <!-- USERNAME -->
                <div class="form-group mb-3">

                    <label class="small fw-bold text-uppercase text-muted mb-2">

                        Username

                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control input-custom"
                        placeholder="Masukkan username"
                        required
                    >

                </div>

                <!-- PASSWORD -->
                <div class="form-group mb-4">

                    <label class="small fw-bold text-uppercase text-muted mb-2">

                        Password

                    </label>

                    <div style="position: relative;">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control input-custom"
                            placeholder="Masukkan password"
                            required
                        >

                        <span
                            class="password-toggle"
                            id="togglePassword"
                        >

                            <i class="fas fa-eye"></i>

                        </span>

                    </div>

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="btn btn-user-login"
                >

                    Akses Dashboard

                    <i class="fas fa-arrow-right ml-2"></i>

                </button>

            </form>

            <!-- BACK -->
            <div class="back-to-web">

                <a href="/">

                    <i class="fas fa-arrow-left mr-1"></i>

                    Kembali ke Beranda

                </a>

                <div class="mt-3">

                    <small class="text-muted">

                        © {{ date('Y') }}
                        SMK Negeri 1 Karang Baru

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

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

@endsection