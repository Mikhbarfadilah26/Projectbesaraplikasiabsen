<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Absensi SMK Ikhbar</title>

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- CUSTOM CSS (WAJIB PALING BAWAH) -->
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
</head>

<body class="layout-top-nav">

    <div class="wrapper">

        <!-- NAVBAR -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-custom">
            <div class="container">

                <!-- LOGO + NAMA -->
                <a href="/" class="navbar-brand d-flex align-items-center overflow-hidden" style="max-width: 250px;">

                    <img src="{{ asset('dist/img/foto1.png') }}" class="logo-sekolah mr-2">

                    <div class="running-text-wrapper">
                        <span class="running-text">
                            SMK Negeri 1 Karang Baru
                        </span>
                    </div>

                </a>

                <!-- HAMBURGER -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- MENU -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto align-items-md-center">

                        <li class="nav-item">
                            <a href="/" class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="/tentang" class="nav-link {{ request()->is('tentang') ? 'active-menu' : '' }}">Tentang</a>
                        </li>

                        <li class="nav-item">
                            <a href="/pengumuman" class="nav-link {{ request()->is('pengumuman*') ? 'active-menu' : '' }}">Pengumuman</a>
                        </li>

                        <li class="nav-item">
                            <a href="/jadwalumum" class="nav-link {{ request()->is('jadwalumum') ? 'active-menu' : '' }}">Jadwal</a>
                        </li>

                        <li class="nav-item">
                            <a href="/informasi" class="nav-link {{ request()->is('informasi') ? 'active-menu' : '' }}">Informasi</a>
                        </li>

                        <li class="nav-item">
                            <a href="/kontak" class="nav-link {{ request()->is('kontak') ? 'active-menu' : '' }}">Kontak</a>
                        </li>

                        <!-- LOGIN USER -->
                        <li class="nav-item mt-2 mt-md-0 ml-md-2">
                            <a href="/login-admin" class="btn btn-primary btn-sm font-weight-bold btn-login-user">
                                Login User
                            </a>
                        </li>

                        <!-- LOGIN SISWA -->
                        <li class="nav-item mt-2 mt-md-0 ml-md-2">
                            <a href="{{ route('login.siswa') }}" class="btn btn-warning btn-sm font-weight-bold text-dark btn-login-siswa">
                                Login Siswa
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container py-4">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer class="main-footer text-center">
            <strong>© {{ date('Y') }} SMK NEGERI 1 KARANG BARU</strong>
        </footer>
    </div>
    <!-- JS (WAJIB UNTUK HAMBURGER) -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>