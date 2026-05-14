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

        --primary-green: #10b981;
        --dark-green: #059669;
        --soft-green: #ecfdf5;

    }

    body {

        font-family: 'Plus Jakarta Sans', sans-serif;

        background: linear-gradient(
            135deg,
            #f0fdf4 0%,
            #dcfce7 100%
        );

    }

    .login-wrapper {

        min-height: 100vh;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 40px 20px;

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

    /*
    |--------------------------------------------------------------------------
    | SIDEBAR
    |--------------------------------------------------------------------------
    */

    .login-sidebar {

        flex: 1;

        background: linear-gradient(
            180deg,
            var(--primary-green) 0%,
            var(--dark-green) 100%
        );

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

    .login-sidebar h3 {

        font-weight: 700;

        margin-bottom: 12px;

        z-index: 2;

        font-size: 1.8rem;

    }

    .login-sidebar p {

        font-size: 0.95rem;

        opacity: .92;

        line-height: 1.8;

        z-index: 2;

        max-width: 360px;

    }

    /*
    |--------------------------------------------------------------------------
    | FORM AREA
    |--------------------------------------------------------------------------
    */

    .login-form-area {

        flex: 1;

        padding: 55px;

        display: flex;

        flex-direction: column;

        justify-content: center;

    }

    .brand-logo {

        font-size: 2rem;

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

        line-height: 1.7;

    }

    /*
    |--------------------------------------------------------------------------
    | FORM
    |--------------------------------------------------------------------------
    */

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

        height: auto;

    }

    .form-control:focus {

        border-color: var(--primary-green);

        background: #fff;

        box-shadow: 0 0 0 5px rgba(16,185,129,0.12);

    }

    /* Input Password wrapper custom */
    .password-container {
        position: relative;
    }

    .password-container .form-control {
        padding-right: 50px; /* Jarak teks agar tidak tertumpuk ikon mata */
    }

    .toggle-password {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #9ca3af;
        transition: .2s;
        z-index: 10;
    }

    .toggle-password:hover {
        color: var(--dark-green);
    }

    /*
    |--------------------------------------------------------------------------
    | BUTTON
    |--------------------------------------------------------------------------
    */

    .btn-login {

        width: 100%;

        border: none;

        border-radius: 14px;

        padding: 14px;

        background: linear-gradient(
            135deg,
            var(--primary-green),
            var(--dark-green)
        );

        color: white;

        font-weight: 700;

        margin-top: 10px;

        transition: .3s;

        display: flex;
        align-items: center;
        justify-content: center;

    }

    .btn-login:hover {

        transform: translateY(-2px);

        box-shadow: 0 12px 20px rgba(16,185,129,0.35);

    }

    .btn-login:disabled {
        opacity: 0.8;
        transform: none;
        box-shadow: none;
        cursor: not-allowed;
    }

    /* Spinner style */
    .spinner-border-sm {
        width: 1.2rem;
        height: 1.2rem;
        border-width: 0.15em;
    }

    /*
    |--------------------------------------------------------------------------
    | ALERT
    |--------------------------------------------------------------------------
    */

    .custom-alert {

        border-radius: 14px;

        padding: 14px 18px;

        margin-bottom: 20px;

        font-size: 14px;

    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    .register-box {

        margin-top: 24px;

        text-align: center;

    }

    .register-text {

        color: #9ca3af;

        font-size: 15px;

        margin: 0;

    }

    .register-text a {

        color: #6b7280;

        text-decoration: none;

        font-weight: 600;

        margin-left: 4px;

        transition: .3s;

    }

    .register-text a:hover {

        color: var(--dark-green);

    }

    /*
    |--------------------------------------------------------------------------
    | FOOTER
    |--------------------------------------------------------------------------
    */

    .back-link {

        text-align: center;

        margin-top: 30px;

    }

    .back-link a {

        color: #6b7280;

        text-decoration: none;

        transition: .3s;

    }

    .back-link a:hover {

        color: var(--dark-green);

    }

    /*
    |--------------------------------------------------------------------------
    | LOGO
    |--------------------------------------------------------------------------
    */

    .login-logo {

        width: 95px;

        height: 95px;

        object-fit: contain;

        background: transparent !important;

        border: none;

        filter: drop-shadow(
            0 8px 18px rgba(0,0,0,0.15)
        );

        transition: 0.3s ease;

    }

    .login-logo:hover {

        transform: scale(1.08);

    }

    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

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

        .login-sidebar h3 {

            font-size: 1.5rem;

        }

    }

</style>

<div class="login-wrapper">

    <div class="login-container">

        {{-- SIDEBAR --}}
        <div class="login-sidebar d-none d-md-flex">

            <h3>

                Portal Siswa SMKN 1 👋

            </h3>

            <p>

                Pantau riwayat kehadiran,
                informasi sekolah,
                dan data absensi harianmu
                dengan mudah melalui sistem
                E-Absensi digital sekolah.

            </p>

        </div>

        {{-- FORM LOGIN --}}
        <div class="login-form-area">

            {{-- LOGO --}}
            <div class="text-center mb-3">

                <img
                    src="{{ asset('dist/img/foto1.png') }}"
                    alt="Logo Sekolah"
                    class="login-logo"
                >

            </div>

            {{-- BRAND --}}
            <div class="brand-logo">

                SIABSEN

            </div>

            {{-- TITLE --}}
            <h2 class="form-title">

                Portal Academic Siswa

            </h2>

            {{-- SUBTITLE --}}
            <p class="form-subtitle">

                Masukkan NIS dan password
                untuk mengakses dashboard siswa
                dan melihat riwayat kehadiran.

            </p>

            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success custom-alert">

                    <i class="fas fa-check-circle mr-2"></i>

                    {{ session('success') }}

                </div>

            @endif

            {{-- ERROR --}}
            @if(session('error'))

                <div class="alert alert-danger custom-alert">

                    <i class="fas fa-times-circle mr-2"></i>

                    {{ session('error') }}

                </div>

            @endif

            {{-- FORM --}}
            <form
                id="loginForm"
                action="{{ route('login.siswa.process') }}"
                method="POST"
            >

                @csrf

                {{-- NIS --}}
                <div class="form-group mb-3">

                    <label>

                        NOMOR INDUK SISWA (NIS)

                    </label>

                    <input
                        type="text"
                        name="nis"
                        class="form-control"
                        placeholder="Masukkan NIS"
                        required
                    >

                </div>

                {{-- PASSWORD --}}
                <div class="form-group mb-4">

                    <label>

                        PASSWORD

                    </label>

                    <div class="password-container">
                        <input
                            id="passwordField"
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan Password"
                            required
                        >
                        <i id="togglePasswordIcon" class="fas fa-eye toggle-password"></i>
                    </div>

                </div>

                {{-- BUTTON --}}
                <button
                    id="btnLogin"
                    type="submit"
                    class="btn btn-login"
                >
                    <span id="btnText">
                        Masuk ke Dashboard
                        <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                    
                    {{-- SPINNER (Tersembunyi secara bawaan) --}}
                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    <span id="spinnerText" class="ml-2 d-none">Memproses...</span>
                </button>

            </form>

            {{-- REGISTER --}}
            <div class="register-box">

                <p class="register-text">

                    Belum punya akun siswa?

                    <a href="{{ route('register.siswa') }}">

                        Daftar Sekarang

                    </a>

                </p>

            </div>

            {{-- FOOTER --}}
            <div class="back-link mt-3">

                <a href="/">

                    <i class="fas fa-arrow-left mr-1"></i>

                    Kembali ke Beranda

                </a>

                <div class="mt-3">

                    <small class="text-muted">

                        &copy; 2026
                        SMK Negeri 1 Karang Baru

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- SCRIPT INTERAKSI MATA PASSWORD DAN SPINNER BUTTON --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordField = document.getElementById('passwordField');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');
        const loginForm = document.getElementById('loginForm');
        const btnLogin = document.getElementById('btnLogin');
        const btnText = document.getElementById('btnText');
        const btnSpinner = document.getElementById('btnSpinner');
        const spinnerText = document.getElementById('spinnerText');

        // Fungsi Show/Hide Password
        togglePasswordIcon.addEventListener('click', function () {
            // Cek tipe input saat ini
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Ubah icon mata / mata dicoret
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Fungsi Trigger Loading Spinner Saat Submit Form
        loginForm.addEventListener('submit', function () {
            // Nonaktifkan tombol agar tidak terjadi double submit
            btnLogin.setAttribute('disabled', 'true');
            
            // Sembunyikan teks utama tombol
            btnText.classList.add('d-none');
            
            // Tampilkan animasi spinner dan teks loading
            btnSpinner.classList.remove('d-none');
            spinnerText.classList.remove('d-none');
        });
    });
</script>

@endsection