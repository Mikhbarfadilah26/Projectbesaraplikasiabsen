<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-sidebar .nav-link {
            border-radius: 8px;
            margin: 3px 8px;
        }

        .nav-sidebar .nav-link.active {
            background: #007bff !important;
            color: #fff !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- NAVBAR --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            {{-- LEFT --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/dashboard" class="nav-link font-weight-bold">
                        <i class="fas fa-school mr-1"></i> SMK APP
                    </a>
                </li>
            </ul>

            {{-- RIGHT --}}
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle"></i>
                        {{ auth()->user()->nama }}
                    </a>

                    {{-- DROPDOWN --}}
                    <div class="dropdown-menu dropdown-menu-right shadow">

                        {{-- USER INFO --}}
                        <div class="dropdown-item text-center">
                            <i class="fas fa-user-circle fa-2x text-primary mb-2"></i>
                            <div class="font-weight-bold">
                                {{ auth()->user()->nama }}
                            </div>
                            <small class="text-muted">Administrator</small>
                        </div>

                        <div class="dropdown-divider"></div>

                        {{-- PROFILE --}}
                        <a href="/profile" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>

                        {{-- LOGOUT (DI DALAM DROPDOWN) --}}
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>

                    </div>
                </li>

            </ul>
        </nav>
        {{-- SIDEBAR ADMIN --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4"
            style="background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);">

            {{-- LOGO --}}
            <a href="{{ route('admin.dashboard') }}"
                class="brand-link text-center border-0 py-4">

                <span class="brand-text font-weight-bold text-white"
                    style="font-size: 20px; letter-spacing: 1px;">

                    <i class="fas fa-user-shield mr-2 text-warning"></i>
                    ADMIN PANEL
                </span>
            </a>

            {{-- SIDEBAR --}}
            <div class="sidebar">

                {{-- USER PANEL --}}
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-3">
                    <div class="image">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff"
                            class="img-circle elevation-2"
                            alt="Admin">
                    </div>

                    <div class="info">
                        <a href="#" class="d-block text-white font-weight-bold">
                            Administrator
                        </a>

                        <small class="text-success">
                            <i class="fas fa-circle" style="font-size: 8px;"></i>
                            Online
                        </small>
                    </div>
                </div>

                {{-- MENU --}}
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false">

                        {{-- DASHBOARD --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-home text-info"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        {{-- DATA KELAS --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('kelas.index') }}"
                                class="nav-link {{ request()->is('master/kelas*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-door-open text-warning"></i>
                                <p>Kelas</p>
                            </a>
                        </li>

                        {{-- DATA JURUSAN --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('jurusan.index') }}"
                                class="nav-link {{ request()->is('master/jurusan*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-building text-primary"></i>
                                <p>Jurusan</p>
                            </a>
                        </li>

                        {{-- DATA SEMESTER --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('semester.index') }}"
                                class="nav-link {{ request()->is('master/semester*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-calendar-alt text-danger"></i>
                                <p>Semester</p>
                            </a>
                        </li>

                        {{-- DATA SISWA --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('siswa.index') }}"
                                class="nav-link {{ request()->is('master/siswa*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-user-graduate text-success"></i>
                                <p>Siswa</p>
                            </a>
                        </li>

                        {{-- TAHUN AJARAN --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('tahunajaran.index') }}"
                                class="nav-link {{ request()->is('master/tahunajaran*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-school text-purple"></i>
                                <p>Tahun Ajaran</p>
                            </a>
                        </li>

                        {{-- ABSENSI --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('absensi.index') }}"
                                class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-user-check text-teal"></i>
                                <p>Absensi</p>
                            </a>
                        </li>

                        {{-- DETAIL ABSENSI --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('detailabsensi.index') }}"
                                class="nav-link {{ request()->routeIs('detailabsensi.*') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-clipboard-list text-pink"></i>
                                <p>Detail Absensi</p>
                            </a>
                        </li>

                        {{-- LAPORAN --}}
                        <li class="nav-item mb-1">
                            <a href="{{ route('laporan.absensi') }}"
                                class="nav-link {{ request()->is('master/laporan/absensi') ? 'active' : '' }} rounded-lg">

                                <i class="nav-icon fas fa-chart-bar text-orange"></i>
                                <p>Laporan</p>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        </aside>

        {{-- STYLE TAMBAHAN --}}
        <style>
            .main-sidebar .nav-link {
                transition: all 0.3s ease;
                margin: 4px 10px;
                padding: 12px 15px;
                font-weight: 500;
            }

            .main-sidebar .nav-link:hover {
                background: rgba(255, 255, 255, 0.1);
                transform: translateX(5px);
            }

            .main-sidebar .nav-link.active {
                background: linear-gradient(90deg, #2563eb, #38bdf8);
                color: white !important;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            }

            .main-sidebar .nav-link.active i {
                color: white !important;
            }

            .rounded-lg {
                border-radius: 12px;
            }

            .text-purple {
                color: #c084fc !important;
            }

            .text-teal {
                color: #2dd4bf !important;
            }

            .text-pink {
                color: #f472b6 !important;
            }

            .text-orange {
                color: #fb923c !important;
            }
        </style>

        {{-- CONTENT --}}
        <div class="content-wrapper p-3">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        <footer class="main-footer text-center">
            <strong>© 2026 SMK</strong>
        </footer>

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>