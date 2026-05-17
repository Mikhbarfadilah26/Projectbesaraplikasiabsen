@extends('layouts.appsiswa')

@section('content')

<style>
    body{
        background: #f4f6f9;
    }

    .welcome-banner{
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 25px;
        padding: 35px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(79,70,229,0.25);
    }

    .welcome-banner::before{
        content: '';
        position: absolute;
        right: -40px;
        top: -40px;
        width: 180px;
        height: 180px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .welcome-banner::after{
        content: '';
        position: absolute;
        bottom: -60px;
        right: 80px;
        width: 140px;
        height: 140px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .welcome-title{
        font-size: 32px;
        font-weight: 700;
    }

    .welcome-subtitle{
        opacity: .9;
        font-size: 15px;
    }

    .stat-card{
        border: none;
        border-radius: 22px;
        transition: .3s;
        overflow: hidden;
        background: white;
        position: relative;
    }

    .stat-card:hover{
        transform: translateY(-7px);
        box-shadow: 0 18px 30px rgba(0,0,0,0.08);
    }

    .icon-box{
        width: 65px;
        height: 65px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .menu-card{
        border-radius: 25px;
        padding: 35px 25px;
        text-align: center;
        color: white !important;
        text-decoration: none !important;
        display: block;
        transition: .3s;
        position: relative;
        overflow: hidden;
    }

    .menu-card:hover{
        transform: translateY(-8px) scale(1.02);
        color: white;
    }

    .menu-card i{
        font-size: 45px;
        margin-bottom: 18px;
    }

    .menu-card::before{
        content: '';
        position: absolute;
        width: 130px;
        height: 130px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        top: -50px;
        right: -40px;
    }

    .gradient-blue{
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .gradient-green{
        background: linear-gradient(135deg, #10b981, #047857);
    }

    .gradient-dark{
        background: linear-gradient(135deg, #374151, #111827);
    }

    .mini-card{
        border-radius: 22px;
        border: none;
        overflow: hidden;
        transition: .3s;
    }

    .mini-card:hover{
        transform: translateY(-5px);
    }

    .number{
        font-size: 34px;
        font-weight: 700;
    }

    .section-title{
        font-size: 22px;
        font-weight: 700;
        color: #1f2937;
    }

    .glass{
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 20px;
        padding: 15px 20px;
    }

    .alert-modern{
        border-radius: 22px;
        border: none;
        overflow: hidden;
    }
</style>

<div class="container-fluid py-4">

    {{-- ALERT ABSENSI --}}
    @php
        $absensiHariIni = \App\Models\ModelAbsensi::where('siswaid', auth('siswa')->id())
            ->whereDate('tanggal', now()->toDateString())
            ->first();
    @endphp

    @if($absensiHariIni)

        <div class="alert alert-success alert-modern shadow-sm mb-4">

            <div class="d-flex align-items-center">

                <div class="mr-3">
                    <i class="fas fa-check-circle fa-3x"></i>
                </div>

                <div>

                    <h5 class="font-weight-bold mb-1">
                        Absensi Hari Ini Sudah Diinput
                    </h5>

                    <div>
                        Status kehadiran Anda hari ini :

                        @if($absensiHariIni->status == 'hadir')

                            <span class="badge badge-success px-3 py-2">
                                HADIR
                            </span>

                        @elseif($absensiHariIni->status == 'izin')

                            <span class="badge badge-warning px-3 py-2">
                                IZIN
                            </span>

                        @elseif($absensiHariIni->status == 'sakit')

                            <span class="badge badge-info px-3 py-2">
                                SAKIT
                            </span>

                        @elseif($absensiHariIni->status == 'alpha')

                            <span class="badge badge-danger px-3 py-2">
                                ALPHA
                            </span>

                        @elseif($absensiHariIni->status == 'cabut')

                            <span class="badge badge-dark px-3 py-2">
                                CABUT
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    @else

        <div class="alert alert-warning alert-modern shadow-sm mb-4">

            <div class="d-flex align-items-center">

                <div class="mr-3">
                    <i class="fas fa-exclamation-triangle fa-3x"></i>
                </div>

                <div>

                    <h5 class="font-weight-bold mb-1">
                        Absensi Hari Ini Belum Diinput
                    </h5>

                    <div>
                        Guru belum menginput absensi Anda hari ini.
                    </div>

                </div>

            </div>

        </div>

    @endif

    {{-- WELCOME --}}
    <div class="welcome-banner mb-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <div class="glass d-inline-block mb-3">
                    <i class="fas fa-circle text-success mr-1"></i>
                    Online
                </div>

                <h1 class="welcome-title mb-2">
                    Halo, {{ auth('siswa')->user()->nama }}
                </h1>

                <p class="welcome-subtitle mb-0">
                    Selamat datang di sistem absensi siswa.
                    Pantau kehadiran dan data akademik Anda dengan mudah.
                </p>

            </div>

            <div class="col-md-4 text-center d-none d-md-block">

                <i class="fas fa-user-graduate"
                    style="font-size:120px; opacity: .15;">
                </i>

            </div>

        </div>

    </div>

    {{-- DATA SISWA --}}
    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-4">

                <div class="d-flex align-items-center">

                    <div class="icon-box bg-primary text-white">
                        <i class="fas fa-id-card"></i>
                    </div>

                    <div class="ml-3">

                        <small class="text-muted d-block">
                            Nomor Induk Siswa
                        </small>

                        <h4 class="font-weight-bold mb-0">
                            {{ auth('siswa')->user()->nis }}
                        </h4>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-4">

                <div class="d-flex align-items-center">

                    <div class="icon-box bg-success text-white">
                        <i class="fas fa-school"></i>
                    </div>

                    <div class="ml-3">

                        <small class="text-muted d-block">
                            Kelas
                        </small>

                        <h4 class="font-weight-bold mb-0">
                            {{ auth('siswa')->user()->kelas->namakelas ?? '-' }}
                        </h4>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card shadow-sm p-4">

                <div class="d-flex align-items-center">

                    <div class="icon-box bg-warning text-white">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <div class="ml-3">

                        <small class="text-muted d-block">
                            Total Hadir
                        </small>

                        <h4 class="font-weight-bold mb-0">
                            {{ $hadir ?? 0 }}
                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- REKAP --}}
    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card mini-card shadow border-0">

                <div class="card-body text-center py-4">

                    <i class="fas fa-check-circle fa-2x text-success mb-3"></i>

                    <h6 class="font-weight-bold text-success">
                        HADIR
                    </h6>

                    <div class="number text-success">
                        {{ $hadir ?? 0 }}
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card mini-card shadow border-0">

                <div class="card-body text-center py-4">

                    <i class="fas fa-notes-medical fa-2x text-warning mb-3"></i>

                    <h6 class="font-weight-bold text-warning">
                        IZIN / SAKIT
                    </h6>

                    <div class="number text-warning">
                        {{ ($izin ?? 0) + ($sakit ?? 0) }}
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card mini-card shadow border-0">

                <div class="card-body text-center py-4">

                    <i class="fas fa-times-circle fa-2x text-danger mb-3"></i>

                    <h6 class="font-weight-bold text-danger">
                        ALPHA
                    </h6>

                    <div class="number text-danger">
                        {{ $alpha ?? 0 }}
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- MENU --}}
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4 class="section-title mb-0">
            Menu Utama
        </h4>

    </div>

    <div class="row">

        {{-- LAPORAN --}}
        <div class="col-md-6 mb-4">

            <a href="{{ route('siswa.laporan') }}"
                class="menu-card gradient-green shadow-lg">

                <i class="fas fa-file-alt"></i>

                <h4 class="font-weight-bold">
                    Laporan Absensi
                </h4>

                <p class="mb-0">
                    Lihat seluruh riwayat kehadiran Anda
                </p>

            </a>

        </div>

        {{-- PROFILE --}}
        <div class="col-md-6 mb-4">

            <a href="{{ route('siswa.profile') }}"
                class="menu-card gradient-dark shadow-lg">

                <i class="fas fa-user-cog"></i>

                <h4 class="font-weight-bold">
                    Profile Siswa
                </h4>

                <p class="mb-0">
                    Kelola informasi akun dan biodata Anda
                </p>

            </a>

        </div>

    </div>

</div>

@endsection