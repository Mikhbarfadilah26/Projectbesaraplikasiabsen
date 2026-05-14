@extends('layouts.appsiswa')

@section('content')

<style>
    .welcome-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        box-shadow: 0 10px 20px rgba(118, 75, 162, 0.2);
    }

    .stat-card {
        border: none;
        border-radius: 15px;
        transition: 0.3s;
        background: white;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .icon-shape {
        width: 55px;
        height: 55px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .btn-menu {
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        color: white !important;
        text-decoration: none !important;
        display: block;
        transition: 0.3s;
    }

    .btn-menu:hover {
        transform: scale(1.03);
        opacity: 0.95;
    }

    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }

    .bg-gradient-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }

    .bg-gradient-warning {
        background: linear-gradient(45deg, #f6c23e, #dda20a);
    }

    .bg-gradient-danger {
        background: linear-gradient(45deg, #e74a3b, #be2617);
    }

    .bg-gradient-dark {
        background: linear-gradient(45deg, #5a5c69, #373840);
    }
</style>

<div class="container-fluid py-4">

    {{-- WELCOME --}}
    <div class="welcome-banner d-flex justify-content-between align-items-center">

        <div>
            <h2 class="font-weight-bold mb-2">
                Halo, {{ auth('siswa')->user()->nama }}
            </h2>

            <p class="mb-0">
                Selamat datang di dashboard absensi siswa.
            </p>
        </div>

        <div class="d-none d-md-block">
            <i class="fas fa-user-graduate fa-4x opacity-50"></i>
        </div>

    </div>

    {{-- DATA SISWA --}}
    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-3">

                <div class="d-flex align-items-center">

                    <div class="icon-shape bg-light text-primary">
                        <i class="fas fa-id-card"></i>
                    </div>

                    <div class="ml-3">
                        <small class="text-muted">
                            NIS
                        </small>

                        <h5 class="mb-0 font-weight-bold">
                            {{ auth('siswa')->user()->nis }}
                        </h5>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-3">

                <div class="d-flex align-items-center">

                    <div class="icon-shape bg-light text-success">
                        <i class="fas fa-school"></i>
                    </div>

                    <div class="ml-3">
                        <small class="text-muted">
                            Kelas
                        </small>

                        <h5 class="mb-0 font-weight-bold">
                            {{ auth('siswa')->user()->kelas->namakelas ?? '-' }}
                        </h5>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-3">

                <div class="d-flex align-items-center">

                    <div class="icon-shape bg-light text-warning">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <div class="ml-3">
                        <small class="text-muted">
                            Total Kehadiran
                        </small>

                        <h5 class="mb-0 font-weight-bold">
                            {{ $hadir ?? 0 }}
                        </h5>
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- REKAP ABSENSI --}}
    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-4 text-center">

                <h6 class="text-success font-weight-bold">
                    HADIR
                </h6>

                <h2 class="font-weight-bold text-success">
                    {{ $hadir ?? 0 }}
                </h2>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-4 text-center">

                <h6 class="text-warning font-weight-bold">
                    IZIN / SAKIT
                </h6>

                <h2 class="font-weight-bold text-warning">
                    {{ ($izin ?? 0) + ($sakit ?? 0) }}
                </h2>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-4 text-center">

                <h6 class="text-danger font-weight-bold">
                    ALPHA
                </h6>

                <h2 class="font-weight-bold text-danger">
                    {{ $alpha ?? 0 }}
                </h2>

            </div>

        </div>

    </div>

    {{-- MENU --}}
    <h5 class="font-weight-bold mb-3">
        Menu Utama
    </h5>

    <div class="row">

        <div class="col-md-4 mb-4">

            <a href="{{ route('siswa.riwayat') }}"
                class="btn-menu bg-gradient-primary shadow-lg">

                <i class="fas fa-history fa-2x mb-3 d-block"></i>

                <span class="font-weight-bold">
                    Riwayat Absensi
                </span>

            </a>

        </div>

        <div class="col-md-4 mb-4">

            <a href="{{ route('siswa.laporan') }}"
                class="btn-menu bg-gradient-success shadow-lg">

                <i class="fas fa-file-alt fa-2x mb-3 d-block"></i>

                <span class="font-weight-bold">
                    Laporan Absensi
                </span>

            </a>

        </div>

        <div class="col-md-4 mb-4">

            <a href="{{ route('siswa.profile') }}"
                class="btn-menu bg-gradient-dark shadow-lg">

                <i class="fas fa-user-cog fa-2x mb-3 d-block"></i>

                <span class="font-weight-bold">
                    Profile
                </span>

            </a>

        </div>

    </div>

</div>

@endsection