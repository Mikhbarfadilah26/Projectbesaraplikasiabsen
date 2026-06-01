@extends('layouts.appguru')
@section('title', 'Dashboard Guru')
@section('content')

<style>

    body{
        background: #eef2ff;
    }

    .dashboard-header{
        background: linear-gradient(135deg,#4f46e5,#7c3aed);
        border-radius: 24px;
        padding: 35px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(79,70,229,0.25);
    }

    .dashboard-header::before{
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        top: -120px;
        right: -120px;
    }

    .dashboard-header::after{
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        bottom: -100px;
        left: -100px;
    }

    .welcome-title{
        font-size: 32px;
        font-weight: 700;
    }

    .teacher-avatar{
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        border: 2px solid rgba(255,255,255,0.2);
    }

    .small-box{
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: .3s;
    }

    .small-box:hover{
        transform: translateY(-5px);
    }

    .small-box .inner{
        padding: 25px;
        color: white;
    }

    .small-box h3{
        font-size: 32px;
        font-weight: 700;
    }

    .small-box p{
        font-size: 15px;
        opacity: .9;
    }

    .small-box .icon{
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 55px;
        opacity: .15;
        color: white;
    }

    .bg-purple{
        background: linear-gradient(135deg,#6366f1,#4f46e5);
    }

    .bg-blue{
        background: linear-gradient(135deg,#0ea5e9,#2563eb);
    }

    .bg-green{
        background: linear-gradient(135deg,#10b981,#059669);
    }

    .bg-pink{
        background: linear-gradient(135deg,#ec4899,#db2777);
    }

    .bg-darkblue{
        background: linear-gradient(135deg,#334155,#1e293b);
    }

    .card-modern{
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        background: white;
    }

    .card-header{
        border-bottom: none !important;
        padding: 18px 22px;
    }

    .table th{
        font-weight: 700;
        border-top: none !important;
    }

    .table td{
        vertical-align: middle;
    }

    .quick-btn{
        border-radius: 14px;
        padding: 13px 22px;
        font-weight: 600;
        transition: .3s;
        border: none;
        color: white !important;
    }

    .quick-btn:hover{
        transform: translateY(-3px);
    }

    .btn-purple{
        background: linear-gradient(135deg,#6366f1,#4f46e5);
    }

    .btn-pink{
        background: linear-gradient(135deg,#ec4899,#db2777);
    }

    .badge-modern{
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
    }

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="dashboard-header mb-4">

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

                            Selamat datang kembali,
                            <strong>{{ auth()->user()->nama }}</strong>

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4 text-md-right mt-3 mt-md-0">

                <h5 class="font-weight-bold mb-1">
                    {{ date('d F Y') }}
                </h5>

                <small>
                    Sistem Absensi Sekolah
                </small>

            </div>

        </div>

    </div>

    {{-- INFO BOX --}}
    <div class="row">

        {{-- TOTAL GURU --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-purple">

                <div class="inner">

                    <h3>
                        {{ $jumlahGuru }}
                    </h3>

                    <p>
                        Total Guru
                    </p>

                </div>

                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>

            </div>

        </div>

        {{-- TOTAL SISWA --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-blue">

                <div class="inner">

                    <h3>
                        {{ $jumlahSiswa }}
                    </h3>

                    <p>
                        Total Siswa
                    </p>

                </div>

                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

            </div>

        </div>

        {{-- ABSENSI --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-green">

                <div class="inner">

                    <h3>
                        {{ $absensiHariIni }}
                    </h3>

                    <p>
                        Absensi Hari Ini
                    </p>

                </div>

                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>

            </div>

        </div>

        {{-- HADIR --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="small-box bg-pink">

                <div class="inner">

                    <h3>
                        {{ $hadirHariIni }}
                    </h3>

                    <p>
                        Hadir Hari Ini
                    </p>

                </div>

                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

            </div>

        </div>

    </div>

    {{-- REKAP --}}
    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <i class="fas fa-check-circle fa-2x text-success mb-3"></i>

                    <h5 class="font-weight-bold text-success">
                        Hadir
                    </h5>

                    <h1 class="font-weight-bold text-success">
                        {{ $hadirHariIni }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <i class="fas fa-times-circle fa-2x text-danger mb-3"></i>

                    <h5 class="font-weight-bold text-danger">
                        Alpha
                    </h5>

                    <h1 class="font-weight-bold text-danger">
                        {{ $alphaHariIni }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <i class="fas fa-file-alt fa-2x text-primary mb-3"></i>

                    <h5 class="font-weight-bold text-primary">
                        Total Absensi
                    </h5>

                    <h1 class="font-weight-bold text-primary">
                        {{ $absensiHariIni }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <i class="fas fa-school fa-2x text-dark mb-3"></i>

                    <h5 class="font-weight-bold text-dark">
                        Kelas Aktif
                    </h5>

                    <h1 class="font-weight-bold text-dark">
                        {{ $jumlahKelas ?? 0 }}
                    </h1>

                </div>

            </div>

        </div>

    </div>

    {{-- INFORMASI & MENU --}}
    <div class="row mt-2">

        {{-- INFORMASI GURU --}}
        <div class="col-md-6 mb-4">

            <div class="card card-modern h-100">

                <div class="card-header bg-purple text-white">

                    <h5 class="mb-0">

                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Guru

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-borderless mb-0">

                        <tr>

                            <th width="35%">
                                Nama Guru
                            </th>

                            <td>
                                : {{ auth()->user()->nama }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Role
                            </th>

                            <td>
                                : {{ auth()->user()->role }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Tanggal
                            </th>

                            <td>
                                : {{ date('d-m-Y') }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status
                            </th>

                            <td>

                                :
                                <span class="badge badge-success badge-modern">
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

            <div class="card card-modern h-100">

                <div class="card-header bg-darkblue text-white">

                    <h5 class="mb-0">

                        <i class="fas fa-bolt mr-2"></i>
                        Menu Cepat

                    </h5>

                </div>

                <div class="card-body text-center d-flex align-items-center justify-content-center">

                    <div>

                        <a href="{{ route('absensi.index') }}"
                           class="btn quick-btn btn-purple m-2">

                            <i class="fas fa-check-circle mr-1"></i>
                            Input Absensi

                        </a>

                        <a href="{{ route('laporan.absensi') }}"
                           class="btn quick-btn btn-pink m-2">

                            <i class="fas fa-file-alt mr-1"></i>
                            Laporan

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ABSENSI TERBARU --}}
    <div class="card card-modern mb-4">

        <div class="card-header bg-green text-white">

            <h5 class="mb-0">

                <i class="fas fa-check-circle mr-2"></i>
                Absensi Terbaru

            </h5>

        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-hover mb-0">

                <thead class="bg-light">

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Nama Siswa
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($absensiTerbaru as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->siswa->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $item->tanggal }}
                            </td>

                            <td>

                                @if($item->status == 'hadir')

                                    <span class="badge badge-success badge-modern">
                                        Hadir
                                    </span>

                                @elseif($item->status == 'izin')

                                    <span class="badge badge-warning badge-modern">
                                        Izin
                                    </span>

                                @elseif($item->status == 'sakit')

                                    <span class="badge badge-info badge-modern">
                                        Sakit
                                    </span>

                                @elseif($item->status == 'cabut')

                                    <span class="badge badge-dark badge-modern">
                                        Cabut
                                    </span>

                                @else

                                    <span class="badge badge-danger badge-modern">
                                        Alpha
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted py-4">

                                Belum ada data absensi

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
