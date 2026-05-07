@extends('layouts.appadmin')

@section('content')

<style>
    .dashboard-header {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        border-radius: 20px;
        padding: 30px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        top: -80px;
        right: -80px;
    }

    .dashboard-header::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        bottom: -60px;
        left: -60px;
    }

    .info-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: 0.3s;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .info-card:hover {
        transform: translateY(-6px);
    }

    .info-icon {
        font-size: 50px;
        opacity: 0.2;
        position: absolute;
        right: 20px;
        top: 20px;
    }

    .card-modern {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .quick-btn {
        border-radius: 14px;
        padding: 14px 18px;
        font-weight: 600;
        transition: 0.3s;
    }

    .quick-btn:hover {
        transform: scale(1.05);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #22c55e, #15803d);
        color: white;
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #facc15, #ca8a04);
        color: white;
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #ef4444, #b91c1c);
        color: white;
    }

    .welcome-text {
        font-size: 28px;
        font-weight: bold;
    }

    .sub-text {
        opacity: 0.9;
    }
</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="dashboard-header mb-4">

        <div class="row align-items-center">

            <div class="col-md-8">
                <h2 class="welcome-text">
                    <i class="fas fa-user-shield mr-2"></i>
                    Dashboard Admin
                </h2>

                <p class="sub-text mb-0">
                    Selamat datang kembali,
                    <strong>{{ auth()->user()->nama }}</strong>
                </p>
            </div>

            <div class="col-md-4 text-md-right mt-3 mt-md-0">
                <h5>{{ date('d F Y') }}</h5>
                <small>Management Sistem Absensi Sekolah</small>
            </div>

        </div>

    </div>

    {{-- INFO BOX --}}
    <div class="row">

        {{-- ADMIN --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card info-card bg-gradient-primary position-relative">

                <div class="card-body">
                    <h5 class="font-weight-bold">Admin Login</h5>
                    <h4>{{ auth()->user()->nama }}</h4>

                    <i class="fas fa-user-shield info-icon"></i>
                </div>

            </div>
        </div>

        {{-- SISWA --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card info-card bg-gradient-success position-relative">

                <div class="card-body">
                    <h5 class="font-weight-bold">Total Siswa</h5>
                    <h2>150</h2>

                    <i class="fas fa-user-graduate info-icon"></i>
                </div>

                <div class="card-footer bg-transparent border-0">
                    <a href="/siswa" class="text-white">
                        Lihat Data
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>
        </div>

        {{-- KELAS --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card info-card bg-gradient-warning position-relative">

                <div class="card-body">
                    <h5 class="font-weight-bold">Total Kelas</h5>
                    <h2>12</h2>

                    <i class="fas fa-door-open info-icon"></i>
                </div>

                <div class="card-footer bg-transparent border-0">
                    <a href="/kelas" class="text-white">
                        Lihat Data
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>
        </div>

        {{-- ABSENSI --}}
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card info-card bg-gradient-danger position-relative">

                <div class="card-body">
                    <h5 class="font-weight-bold">Absensi Hari Ini</h5>
                    <h2>53</h2>

                    <i class="fas fa-check-circle info-icon"></i>
                </div>

                <div class="card-footer bg-transparent border-0">
                    <a href="/absensi" class="text-white">
                        Input Absensi
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>

    {{-- CONTENT --}}
    <div class="row">

        {{-- INFORMASI --}}
        <div class="col-md-6 mb-4">

            <div class="card card-modern">

                <div class="card-header bg-primary text-white border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Sistem
                    </h5>
                </div>

                <div class="card-body">

                    <table class="table table-borderless">

                        <tr>
                            <th width="40%">Nama Admin</th>
                            <td>: {{ auth()->user()->nama }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Login</th>
                            <td>: {{ date('d-m-Y') }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                :
                                <span class="badge badge-success">
                                    Online
                                </span>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        {{-- MENU CEPAT --}}
        <div class="col-md-6 mb-4">

            <div class="card card-modern">

                <div class="card-header bg-success text-white border-0">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt mr-2"></i>
                        Menu Cepat
                    </h5>
                </div>

                <div class="card-body text-center">

                    <a href="/siswa"
                        class="btn btn-primary quick-btn m-2">
                        <i class="fas fa-user-graduate"></i>
                        Data Siswa
                    </a>

                    <a href="/kelas"
                        class="btn btn-warning quick-btn m-2 text-white">
                        <i class="fas fa-door-open"></i>
                        Data Kelas
                    </a>

                    <a href="/absensi"
                        class="btn btn-success quick-btn m-2">
                        <i class="fas fa-check-circle"></i>
                        Absensi
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