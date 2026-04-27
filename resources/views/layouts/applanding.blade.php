<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Absensi SMK Ikhbar</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body class="layout-top-nav">

    <div class="wrapper">

        <!-- NAVBAR -->
        <nav class="main-header navbar navbar-expand-md navbar-dark bg-success">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <b>ABSENSI SMK</b>
                </a>

                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/tentang" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="/pengumuman" class="nav-link">Pengumuman</a></li>
                    <li class="nav-item"><a href="/jadwalumum" class="nav-link">Jadwal</a></li>
                    <li class="nav-item"><a href="/informasi" class="nav-link">Informasi</a></li>
                    <li class="nav-item"><a href="/kontak" class="nav-link">Kontak</a></li>

                    <li class="nav-item ml-lg-2">
                        <a href="/loginuser" class="btn btn-primary btn-sm px-3 shadow-sm font-weight-bold">
                            <i class="fas fa-user-lock mr-1"></i> Login User
                        </a>
                    </li>

                    <li class="nav-item ml-lg-2">
                        <a href="{{ route('login.siswa') }}" class="btn btn-warning btn-sm px-3 shadow-sm font-weight-bold text-dark">
                            <i class="fas fa-user-graduate mr-1"></i> Login Siswa
                        </a>
                    </li>
                </ul>
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
            <strong>© {{ date('Y') }} SMK Ikhbar Fadillah</strong>
        </footer>

    </div>

</body>

</html>