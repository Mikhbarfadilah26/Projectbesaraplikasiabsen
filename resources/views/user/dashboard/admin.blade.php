@extends('layouts.appadmin')

@section('content')

<style>
    .dashboard-header {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        border-radius: 12px;
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
        border-radius: 10px;
        overflow: hidden;
        transition: 0.3s;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .info-card:hover {
        transform: translateY(-4px);
    }

    .info-icon {
        font-size: 45px;
        opacity: 0.15;
        position: absolute;
        right: 20px;
        top: 20px;
    }

    .card-modern {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .quick-btn {
        border-radius: 8px;
        padding: 12px 18px;
        font-weight: 600;
        transition: 0.3s;
    }

    .quick-btn:hover {
        transform: scale(1.03);
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

                    <h6 class="font-weight-bold">
                        Admin Login
                    </h6>

                    <h4>
                        {{ auth()->user()->nama }}
                    </h4>

                    <i class="fas fa-user-shield info-icon"></i>

                </div>

            </div>

        </div>

        {{-- SISWA --}}
        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card info-card bg-gradient-success position-relative">

                <div class="card-body">

                    <h6 class="font-weight-bold">
                        Total Siswa
                    </h6>

                    <h2>
                        {{ $totalsiswa }}
                    </h2>

                    <small>
                        Data siswa aktif
                    </small>

                    <i class="fas fa-user-graduate info-icon"></i>

                </div>

                <div class="card-footer bg-transparent border-0">

                    <a href="/master/siswa" class="text-white">

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

                    <h6 class="font-weight-bold">
                        Total Kelas
                    </h6>

                    <h2>
                        {{ $totalkelas }}
                    </h2>

                    <small>
                        Seluruh kelas aktif
                    </small>

                    <i class="fas fa-school info-icon"></i>

                </div>

                <div class="card-footer bg-transparent border-0">

                    <a href="/master/kelas" class="text-white">

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

                    <h6 class="font-weight-bold">
                        Absensi Hari Ini
                    </h6>

                    <h2>
                        {{ $totalabsensi }}
                    </h2>

                    <small>
                        Data absensi masuk
                    </small>

                    <i class="fas fa-check-circle info-icon"></i>

                </div>

                <div class="card-footer bg-transparent border-0">

                    <a href="/master/transaksi/absensi" class="text-white">

                        Lihat Absensi
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- DATA TERBARU --}}
    <div class="row">

        {{-- DATA SISWA --}}
        <div class="col-md-6 mb-4">

            <div class="card card-modern">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">
                        <i class="fas fa-user-graduate mr-2"></i>
                        Data Siswa Terbaru
                    </h5>

                </div>

                <div class="card-body p-0">

                    <table class="table table-hover mb-0">

                        <thead class="bg-light">

                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($datasiswa as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nama }}</td>

                                <td>
                                    {{ $item->kelas->namakelas ?? '-' }}
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    Data siswa kosong
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="card-footer text-right">

                    <a href="/master/siswa" class="btn btn-sm btn-primary">
                        Lihat Semua
                    </a>

                </div>

            </div>

        </div>

        {{-- DATA JURUSAN --}}
        <div class="col-md-6 mb-4">

            <div class="card card-modern">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">
                        <i class="fas fa-layer-group mr-2"></i>
                        Data Jurusan
                    </h5>

                </div>

                <div class="card-body p-0">

                    <table class="table table-hover mb-0">

                        <thead class="bg-light">

                            <tr>
                                <th>No</th>
                                <th>Jurusan</th>
                                <th>Dibuat</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($datajurusan as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->namajurusan }}</td>

                                <td>
                                    {{ $item->created_at->format('d-m-Y') }}
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    Data jurusan kosong
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="card-footer text-right">

                    <a href="/master/jurusan" class="btn btn-sm btn-success">
                        Lihat Semua
                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- DATA ABSENSI --}}
    <div class="row">

        <div class="col-12">

            <div class="card card-modern">

                <div class="card-header bg-danger text-white">

                    <h5 class="mb-0">
                        <i class="fas fa-check-circle mr-2"></i>
                        Absensi Terbaru
                    </h5>

                </div>

                <div class="card-body p-0">

                    <table class="table table-hover mb-0">

                        <thead class="bg-light">

                            <tr>

                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal</th>
                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($dataabsensi as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $item->siswa->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ date('d-m-Y', strtotime($item->created_at)) }}
                                </td>

                                <td>

                                    @if($item->status_masuk == 'Hadir')

                                    <span class="badge badge-success">
                                        Hadir
                                    </span>

                                    @elseif($item->status_masuk == 'Izin')

                                    <span class="badge badge-warning">
                                        Izin
                                    </span>

                                    @elseif($item->status_masuk == 'Sakit')

                                    <span class="badge badge-info">
                                        Sakit
                                    </span>

                                    @else

                                    <span class="badge badge-danger">
                                        Alpha
                                    </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada data absensi
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="card-footer text-right">

                    <a href="/master/transaksi/absensi"
                        class="btn btn-sm btn-danger">

                        Lihat Semua

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection