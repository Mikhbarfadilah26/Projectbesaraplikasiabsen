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
        {{-- SIDEBAR --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="/admin/dashboard" class="brand-link text-center">
                <span class="brand-text font-weight-bold">ADMIN PANEL</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column">

                        <li class="nav-item">
                            <a href="/admin/dashboard"
                                class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data User</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('kelas.index') }}"
                                class="nav-link {{ request()->is('master/kelas*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jurusan.index') }}"
                                class="nav-link {{ request()->is('master/jurusan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Jurusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('semester.index') }}"
                                class="nav-link {{ request()->is('master/semester*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Semester</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('siswa.index') }}"
                                class="nav-link {{ request()->is('master/siswa*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tahunajaran.index') }}"
                                class="nav-link {{ request()->is('tahunajaran*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Tahun Ajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absensi.index') }}"
                                class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('detailabsensi.index') }}"
                                class="nav-link {{ request()->routeIs('detailabsensi.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Detail Absensi</p>
                            </a>
                        </li>
              <li class="nav-item">
    <a href="{{ route('laporan.absensi') }}"
       class="nav-link {{ request()->is('laporan/absensi') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>Laporan</p>
    </a>
</li>


                    </ul>
                </nav>
            </div>
        </aside>

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