@extends('layouts.appguru')

@section('title', 'Dashboard Guru')

@section('content')

<style>
    .guru-header {
        background: linear-gradient(135deg, #f59e0b, #ea580c);
        border-radius: 22px;
        padding: 35px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .guru-header::before {
        content: '';
        position: absolute;
        width: 280px;
        height: 280px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        top: -100px;
        right: -100px;
    }

    .guru-header::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
        bottom: -80px;
        left: -80px;
    }

    .welcome-title {
        font-size: 30px;
        font-weight: bold;
    }

    .modern-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: 0.3s;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    }

    .modern-card:hover {
        transform: translateY(-6px);
    }

    .icon-bg {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 55px;
        opacity: 0.15;
    }

    .gradient-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
    }

    .gradient-info {
        background: linear-gradient(135deg, #06b6d4, #2563eb);
        color: white;
    }

    .gradient-success {
        background: linear-gradient(135deg, #22c55e, #15803d);
        color: white;
    }

    .gradient-danger {
        background: linear-gradient(135deg, #ef4444, #b91c1c);
        color: white;
    }

    .custom-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    }

    .quick-btn {
        padding: 14px 18px;
        border-radius: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    .quick-btn:hover {
        transform: scale(1.05);
    }

    .teacher-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }
</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="guru-header mb-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <div class="d-flex align-items-center">

                    <div class="teacher-avatar mr-3">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>

                    <div>
                        <h2 class="welcome-title mb-1">
                            Dashboard Guru
                        </h2>

                        <p class="mb-0">
                            Selamat datang,
                            <strong>{{ auth()->user()->nama }}</strong>
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-4 text-md-right mt-3 mt-md-0">

                <h5>{{ date('d F Y') }}</h5>
                <small>Sistem Absensi Sekolah</small>

            </div>

        </div>

    </div>

    {{-- INFO BOX --}}
    <div class="row">

        {{-- GURU --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card modern-card gradient-warning position-relative">

                <div class="card-body">

                    <h5 class="font-weight-bold">
                        Guru Aktif
                    </h5>

                    <h4>{{ auth()->user()->nama }}</h4>

                    <i class="fas fa-user-tie icon-bg"></i>

                </div>

            </div>

        </div>

        {{-- JADWAL --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card modern-card gradient-info position-relative">

                <div class="card-body">

                    <h5 class="font-weight-bold">
                        Jadwal Hari Ini
                    </h5>

                    <h2>3</h2>

                    <i class="fas fa-calendar-alt icon-bg"></i>

                </div>

                <div class="card-footer bg-transparent border-0">
                    <a href="/jadwal" class="text-white">
                        Lihat Jadwal
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>

        </div>

        {{-- ABSENSI --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card modern-card gradient-success position-relative">

                <div class="card-body">

                    <h5 class="font-weight-bold">
                        Absensi Hari Ini
                    </h5>

                    <h2>30</h2>

                    <i class="fas fa-check-circle icon-bg"></i>

                </div>

                <div class="card-footer bg-transparent border-0">
                    <a href="/absensi" class="text-white">
                        Input Absensi
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>

        </div>

        {{-- LAPORAN --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card modern-card gradient-danger position-relative">

                <div class="card-body">

                    <h5 class="font-weight-bold">
                        Laporan
                    </h5>

                    <h2>10</h2>

                    <i class="fas fa-file-alt icon-bg"></i>

                </div>

                <div class="card-footer bg-transparent border-0">
                    <a href="/laporan/harian" class="text-white">
                        Lihat Laporan
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="row">

        {{-- INFORMASI GURU --}}
        <div class="col-md-6 mb-4">

            <div class="card custom-card">

                <div class="card-header bg-warning border-0">
                    <h5 class="mb-0 text-white">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Guru
                    </h5>
                </div>

                <div class="card-body">

                    <table class="table table-borderless">

                        <tr>
                            <th width="35%">Nama Guru</th>
                            <td>: {{ auth()->user()->nama }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ date('d-m-Y') }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                :
                                <span class="badge badge-success px-3 py-2">
                                    Aktif
                                </span>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        {{-- MENU CEPAT --}}
        <div class="col-md-6 mb-4">

            <div class="card custom-card">

                <div class="card-header bg-info border-0">
                    <h5 class="mb-0 text-white">
                        <i class="fas fa-bolt mr-2"></i>
                        Menu Cepat
                    </h5>
                </div>

                <div class="card-body text-center">

                    <a href="/absensi"
                        class="btn btn-success quick-btn m-2">
                        <i class="fas fa-check-circle"></i>
                        Absensi
                    </a>

                    <a href="/jadwal"
                        class="btn btn-primary quick-btn m-2">
                        <i class="fas fa-calendar-alt"></i>
                        Jadwal
                    </a>

                    <a href="/laporan/harian"
                        class="btn btn-danger quick-btn m-2">
                        <i class="fas fa-file-alt"></i>
                        Laporan
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection