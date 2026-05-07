<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Siswa</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .dropdown-menu {
            border-radius: 10px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- NAVBAR --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            {{-- RIGHT --}}
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle"></i>
                        {{ auth('siswa')->user()->nama }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow">

                        {{-- PROFIL MINI --}}
                        <div class="dropdown-item text-center">
                            <i class="fas fa-user-circle fa-2x text-primary mb-2"></i><br>
                            <strong>{{ auth('siswa')->user()->nama }}</strong>
                            <div class="text-muted small">
                                {{ auth('siswa')->user()->kelas->nama ?? '-' }}
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <a href="/siswa/profile" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>

                        <form action="/logout-siswa" method="POST">
                            @csrf
                            <button class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>

                    </div>
                </li>

            </ul>
        </nav>

        {{-- SIDEBAR --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="/siswa/dashboard" class="brand-link text-center">
                <span class="brand-text font-weight-bold">SISWA PANEL</span>
            </a>

            <div class="sidebar">
                <!-- Add this to your sidebar menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-header font-weight-bold text-uppercase" style="font-size: 0.7rem; opacity: 0.6;">Menu Utama</li>

                        <li class="nav-item">
                            <a href="{{ route('siswa.dashboard') }}" class="nav-link {{ request()->is('siswa/dashboard') ? 'active shadow-sm' : '' }}" style="border-radius: 10px;">
                                <i class="nav-icon fas fa-th-large"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('siswa.absensi') }}" class="nav-link {{ request()->is('siswa/absensi') ? 'active shadow-sm' : '' }}" style="border-radius: 10px;">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Absensi Hari Ini</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('siswa.riwayat') }}" class="nav-link {{ request()->is('siswa/riwayat') ? 'active shadow-sm' : '' }}" style="border-radius: 10px;">
                                <i class="nav-icon fas fa-history"></i>
                                <p>Riwayat Absen</p>
                            </a>
                        </li>


                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        {{-- CONTENT --}}
        <div class="content-wrapper">
            <section class="content p-3">
                @yield('content')
            </section>
        </div>

        {{-- FOOTER --}}
        <footer class="main-footer text-center">
            <strong>© 2026 SMK</strong>
        </footer>

    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>