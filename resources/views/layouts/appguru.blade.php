<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Panel Guru</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- ADMIN LTE --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        /* NAVBAR */
        .main-header {
            border: none;
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .navbar-user {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 8px 16px;
            border-radius: 12px;
            font-weight: 500;
        }

        /* SIDEBAR */
        .main-sidebar {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        }

        .brand-link {
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 22px 15px;
        }

        .brand-text {
            color: white !important;
            font-size: 20px;
            font-weight: 700 !important;
            letter-spacing: 1px;
        }

        .sidebar {
            padding-top: 10px;
        }

        .nav-sidebar .nav-item {
            margin-bottom: 8px;
        }

        .nav-sidebar .nav-link {
            margin: 0 12px;
            border-radius: 14px;
            padding: 13px 15px;
            transition: all 0.3s ease;
            color: #dbeafe;
            font-weight: 500;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08);
            transform: translateX(5px);
            color: white;
        }

        .nav-sidebar .nav-link.active {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white !important;
            box-shadow: 0 5px 15px rgba(37,99,235,0.4);
        }

        .nav-sidebar .nav-link i {
            margin-right: 10px;
        }

        /* PROFILE BOX */
        .guru-profile {
            margin: 15px;
            padding: 18px;
            border-radius: 18px;
            background: rgba(255,255,255,0.08);
            text-align: center;
        }

        .guru-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 28px;
            color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .guru-name {
            color: white;
            font-weight: 600;
            margin-top: 12px;
            margin-bottom: 3px;
        }

        .guru-status {
            color: #86efac;
            font-size: 13px;
        }

        /* CONTENT */
        .content-wrapper {
            background: #f1f5f9;
        }

        .content-header {
            padding: 20px;
        }

        .content-header h4 {
            font-weight: 700;
            color: #0f172a;
        }

        /* FOOTER */
        .main-footer {
            background: white;
            border-top: none;
            padding: 14px;
            font-size: 14px;
            color: #64748b;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        {{-- NAVBAR --}}
        <nav class="main-header navbar navbar-expand">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars text-primary"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <span class="navbar-user">
                        <i class="fas fa-user-circle mr-1"></i>
                        {{ auth()->user()->nama }}
                    </span>
                </li>

            </ul>

        </nav>

        {{-- SIDEBAR --}}
        <aside class="main-sidebar elevation-4">

            {{-- LOGO --}}
            <a href="/guru/dashboard" class="brand-link text-center">

                <span class="brand-text">
                    <i class="fas fa-chalkboard-teacher mr-2 text-warning"></i>
                    GURU PANEL
                </span>

            </a>

            <div class="sidebar">

                {{-- PROFILE --}}
                <div class="guru-profile">

                    <div class="guru-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>

                    <div class="guru-name">
                        {{ auth()->user()->nama }}
                    </div>

                    <div class="guru-status">
                        <i class="fas fa-circle" style="font-size: 8px;"></i>
                        Guru Aktif
                    </div>

                </div>

                {{-- MENU --}}
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false">

                        {{-- DASHBOARD --}}
                        <li class="nav-item">
                            <a href="/guru/dashboard"
                                class="nav-link {{ request()->is('guru/dashboard') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-home text-info"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>


                        {{-- ABSENSI --}}
                        <li class="nav-item">
                            <a href="/guru/absensi"
                                class="nav-link {{ request()->is('guru/absensi*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-check-circle text-success"></i>
                                <p>Input Absensi</p>
                            </a>
                        </li>

                        {{-- SISWA --}}
                        <li class="nav-item">
                            <a href="/guru/siswa"
                                class="nav-link {{ request()->is('guru/siswa*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-user-graduate text-primary"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>

                        {{-- KELAS --}}
                        <li class="nav-item">
                            <a href="/guru/kelas"
                                class="nav-link {{ request()->is('guru/kelas*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-door-open text-danger"></i>
                                <p>Data Kelas</p>
                            </a>
                        </li>

                        {{-- JURUSAN --}}
                        <li class="nav-item">
                            <a href="/guru/jurusan"
                                class="nav-link {{ request()->is('guru/jurusan*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-building text-purple"></i>
                                <p>Jurusan</p>
                            </a>
                        </li>

                        {{-- SEMESTER --}}
                        <li class="nav-item">
                            <a href="/guru/semester"
                                class="nav-link {{ request()->is('guru/semester*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-book text-pink"></i>
                                <p>Semester</p>
                            </a>
                        </li>

                        {{-- TAHUN AJARAN --}}
                        <li class="nav-item">
                            <a href="/guru/tahunajaran"
                                class="nav-link {{ request()->is('guru/tahunajaran*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-school text-orange"></i>
                                <p>Tahun Ajaran</p>
                            </a>
                        </li>

                        {{-- LAPORAN --}}
                        <li class="nav-item">
                            <a href="/guru/laporan"
                                class="nav-link {{ request()->is('guru/laporan*') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-chart-bar text-teal"></i>
                                <p>Laporan</p>
                            </a>
                        </li>

                        {{-- LOGOUT --}}
                        <li class="nav-item mt-3">

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                    class="nav-link border-0 bg-transparent w-100 text-left">

                                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                    <p class="text-danger d-inline">
                                        Logout
                                    </p>

                                </button>
                            </form>

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
                    <h4 class="m-0">
                        @yield('title')
                    </h4>
                </div>
            </div>

            {{-- CONTENT --}}
            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </section>

        </div>

        {{-- FOOTER --}}
        <footer class="main-footer text-center">
            <strong>© 2026 Sistem Absensi Sekolah</strong>
        </footer>

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>