<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Panel Guru</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- NAVBAR --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        <i class="fas fa-user mr-1"></i>
                        {{ auth()->user()->nama }}
                    </span>
                </li>
            </ul>
        </nav>

        {{-- SIDEBAR --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="/guru/dashboard" class="brand-link text-center">
                <span class="brand-text font-weight-light">GURU PANEL</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column">

                        <li class="nav-item">
                            <a href="/guru/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/guru/jadwal" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Jadwal Mengajar</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/guru/absensi" class="nav-link">
                                <i class="nav-icon fas fa-check"></i>
                                <p>Input Absensi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/guru/laporan" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Laporan</p>
                            </a>
                        </li>



                    </ul>
                </nav>
            </div>
        </aside>

        {{-- CONTENT --}}
        <div class="content-wrapper">

            {{-- HEADER --}}
            <div class="content-header">
                <div class="container-fluid">
                    <h4 class="m-0">@yield('title')</h4>
                </div>
            </div>

            {{-- ISI --}}
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

        </div>

        {{-- FOOTER --}}
        <footer class="main-footer text-center">
            <strong>© 2026 SMK</strong>
        </footer>

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>