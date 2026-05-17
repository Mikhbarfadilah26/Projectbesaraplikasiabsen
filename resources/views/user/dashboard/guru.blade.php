@extends('layouts.appguru')

@section('title', 'Dashboard Guru')

@section('content')

<style>

    body{
        background: #f4f6f9;
    }

    .dashboard-header{
        background: linear-gradient(135deg,#f59e0b,#ea580c);
        border-radius: 18px;
        padding: 30px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .dashboard-header::before{
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        top: -100px;
        right: -100px;
    }

    .dashboard-header::after{
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        bottom: -80px;
        left: -80px;
    }

    .welcome-title{
        font-size: 30px;
        font-weight: 700;
    }

    .teacher-avatar{
        width: 75px;
        height: 75px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .small-box{
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .small-box .icon{
        top: 15px;
    }

    .card-modern{
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(0,0,0,0.08);
    }

    .card-header{
        border-bottom: none !important;
    }

    .table th{
        font-weight: 700;
    }

    .quick-btn{
        border-radius: 12px;
        padding: 12px 18px;
        font-weight: 600;
        transition: .3s;
    }

    .quick-btn:hover{
        transform: translateY(-2px);
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
        <div class="col-lg-3 col-md-6 col-12">

            <div class="small-box bg-warning">

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
        <div class="col-lg-3 col-md-6 col-12">

            <div class="small-box bg-success">

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

        {{-- ABSENSI HARI INI --}}
        <div class="col-lg-3 col-md-6 col-12">

            <div class="small-box bg-info">

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
        <div class="col-lg-3 col-md-6 col-12">

            <div class="small-box bg-danger">

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

        <div class="col-md-4 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <h5 class="font-weight-bold text-success">
                        Hadir
                    </h5>

                    <h1 class="font-weight-bold text-success">
                        {{ $hadirHariIni }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <h5 class="font-weight-bold text-danger">
                        Alpha
                    </h5>

                    <h1 class="font-weight-bold text-danger">
                        {{ $alphaHariIni }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card card-modern">

                <div class="card-body text-center">

                    <h5 class="font-weight-bold text-primary">
                        Total Absensi
                    </h5>

                    <h1 class="font-weight-bold text-primary">
                        {{ $absensiHariIni }}
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

                <div class="card-header bg-warning text-white">

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

            <div class="card card-modern h-100">

                <div class="card-header bg-info text-white">

                    <h5 class="mb-0">

                        <i class="fas fa-bolt mr-2"></i>
                        Menu Cepat

                    </h5>

                </div>

                <div class="card-body text-center d-flex align-items-center justify-content-center">

                    <div>

                        <a href="{{ route('absensi.index') }}"
                           class="btn btn-success quick-btn m-2">

                            <i class="fas fa-check-circle mr-1"></i>
                            Input Absensi

                        </a>

                        <a href="{{ route('laporan.absensi') }}"
                           class="btn btn-danger quick-btn m-2">

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

        <div class="card-header bg-success text-white">

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

                                    <span class="badge badge-success px-3 py-2">
                                        Hadir
                                    </span>

                                @elseif($item->status == 'izin')

                                    <span class="badge badge-warning px-3 py-2">
                                        Izin
                                    </span>

                                @elseif($item->status == 'sakit')

                                    <span class="badge badge-info px-3 py-2">
                                        Sakit
                                    </span>

                                @elseif($item->status == 'cabut')

                                    <span class="badge badge-dark px-3 py-2">
                                        Cabut
                                    </span>

                                @else

                                    <span class="badge badge-danger px-3 py-2">
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