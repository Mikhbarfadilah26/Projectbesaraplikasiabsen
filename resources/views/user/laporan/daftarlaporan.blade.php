@extends('layouts.appadmin')

@section('content')

<style>
    :root{
        --primary:#4f46e5;
        --secondary:#7c3aed;
        --success:#10b981;
        --warning:#f59e0b;
        --info:#0ea5e9;
        --danger:#ef4444;
        --dark:#0f172a;
        --light:#f8fafc;
    }

    body{
        background: #f1f5f9;
    }

    .laporan-header{
        background: linear-gradient(135deg,var(--primary),var(--secondary));
        border-radius: 24px;
        padding: 28px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(79,70,229,.25);
    }

    .laporan-header::before{
        content:'';
        position:absolute;
        width:300px;
        height:300px;
        background: rgba(255,255,255,.08);
        border-radius:50%;
        top:-120px;
        right:-120px;
    }

    .laporan-card{
        border:none;
        border-radius:22px;
        overflow:hidden;
        background:white;
        box-shadow: 0 10px 35px rgba(15,23,42,.07);
    }

    .laporan-card .card-body{
        padding: 25px;
    }

    .modern-input{
        height:48px;
        border-radius:14px;
        border:1px solid #e2e8f0;
        box-shadow:none !important;
        transition:.2s;
    }

    .modern-input:focus{
        border-color: var(--primary);
    }

    .modern-btn{
        height:48px;
        border:none;
        border-radius:14px;
        font-weight:600;
        transition:.2s;
    }

    .modern-btn:hover{
        transform: translateY(-2px);
    }

    .stat-card{
        border-radius:22px;
        padding:24px;
        color:white;
        position:relative;
        overflow:hidden;
        box-shadow:0 10px 25px rgba(0,0,0,.08);
    }

    .stat-card::before{
        content:'';
        position:absolute;
        width:120px;
        height:120px;
        border-radius:50%;
        background:rgba(255,255,255,.12);
        top:-40px;
        right:-30px;
    }

    .stat-card h2{
        font-weight:800;
        margin:0;
    }

    .stat-card p{
        margin:0;
        opacity:.9;
    }

    .bg-hadir{
        background:linear-gradient(135deg,#10b981,#059669);
    }

    .bg-izin{
        background:linear-gradient(135deg,#f59e0b,#d97706);
    }

    .bg-sakit{
        background:linear-gradient(135deg,#0ea5e9,#0284c7);
    }

    .bg-alpha{
        background:linear-gradient(135deg,#ef4444,#dc2626);
    }

    .modern-table{
        margin-bottom:0;
    }

    .modern-table thead{
        background:#f8fafc;
    }

    .modern-table thead th{
        border:none;
        color:#334155;
        font-size:14px;
        font-weight:700;
        padding:18px 16px;
        white-space: nowrap;
    }

    .modern-table tbody td{
        vertical-align:middle;
        border-top:1px solid #f1f5f9;
        padding:16px;
        color:#334155;
    }

    .modern-table tbody tr:hover{
        background:#f8fafc;
    }

    .badge-modern{
        padding:8px 14px;
        border-radius:30px;
        font-size:12px;
        font-weight:700;
    }

    .badge-hadir{
        background:#dcfce7;
        color:#166534;
    }

    .badge-telat{
        background:#fef3c7;
        color:#92400e;
    }

    .badge-izin{
        background:#fde68a;
        color:#92400e;
    }

    .badge-sakit{
        background:#dbeafe;
        color:#1d4ed8;
    }

    .badge-alpha{
        background:#fee2e2;
        color:#991b1b;
    }

    .kelas-badge{
        display:inline-block;
        padding:7px 14px;
        border-radius:12px;
        background:#eef2ff;
        color:#4338ca;
        font-weight:700;
        font-size:13px;
    }

    .empty-state{
        padding:70px 20px;
    }

    .empty-state i{
        font-size:55px;
        color:#cbd5e1;
        margin-bottom:15px;
    }

    @media print {

        .main-sidebar,
        .main-header,
        .main-footer,
        .no-print{
            display:none !important;
        }

        .content-wrapper,
        .content,
        .container-fluid{
            margin:0 !important;
            padding:0 !important;
        }

        .laporan-card,
        .laporan-header{
            box-shadow:none !important;
            border:none !important;
        }

        body{
            background:white !important;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000 !important;
        }
    }
</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="laporan-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h2 class="font-weight-bold mb-2">
                    <i class="fas fa-chart-line mr-2"></i>
                    Laporan Absensi Siswa
                </h2>

                <p class="mb-0 opacity-75">
                    Rekap data kehadiran siswa berdasarkan tanggal dan kelas
                </p>
            </div>

            <div class="mt-3 mt-md-0 no-print">

                <a href="{{ route('laporan.absensi') }}?export=pdf"
                    target="_blank"
                    class="btn btn-light modern-btn px-4">

                    <i class="fas fa-file-pdf text-danger mr-1"></i>
                    Export PDF

                </a>

                <button onclick="window.print()"
                    class="btn btn-dark modern-btn px-4 ml-2">

                    <i class="fas fa-print mr-1"></i>
                    Print

                </button>

            </div>

        </div>

    </div>

    {{-- FILTER --}}
    <div class="card laporan-card no-print mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="font-weight-bold">
                            Tanggal
                        </label>

                        <input type="date"
                            name="tanggal"
                            value="{{ request('tanggal') }}"
                            class="form-control modern-input">
                    </div>

                    <div class="col-md-5 mb-3">
                        <label class="font-weight-bold">
                            Kelas
                        </label>

                        <select name="kelasid"
                            class="form-control modern-input">

                            <option value="">
                                -- Semua Kelas --
                            </option>

                            @foreach($kelas as $k)

                            <option value="{{ $k->id }}"
                                {{ request('kelasid') == $k->id ? 'selected' : '' }}>

                                {{ $k->tingkat }}
                                -
                                {{ $k->jurusan->namajurusan ?? '-' }}

                            </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-3 mb-3 d-flex align-items-end">

                        <button class="btn btn-primary modern-btn btn-block">

                            <i class="fas fa-search mr-1"></i>
                            Filter Data

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- REKAP --}}
    <div class="row no-print mb-4">

        <div class="col-md-3 mb-3">

            <div class="stat-card bg-hadir">

                <h2>{{ $rekap['hadir'] ?? 0 }}</h2>
                <p>Hadir</p>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="stat-card bg-izin">

                <h2>{{ $rekap['izin'] ?? 0 }}</h2>
                <p>Izin</p>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="stat-card bg-sakit">

                <h2>{{ $rekap['sakit'] ?? 0 }}</h2>
                <p>Sakit</p>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="stat-card bg-alpha">

                <h2>{{ $rekap['alpha'] ?? 0 }}</h2>
                <p>Alpha</p>

            </div>

        </div>

    </div>

    {{-- TABEL --}}
    <div class="card laporan-card">

        <div class="card-body table-responsive p-0">

            <table class="table modern-table">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $d)

                    <tr>

                        <td width="60">
                            {{ $loop->iteration }}
                        </td>

                        <td class="font-weight-bold">
                            {{ $d->siswa->nama }}
                        </td>

                        <td>
                            {{ $d->siswa->nis }}
                        </td>

                        {{-- LOGIKA KELAS BARU --}}
                        <td>

                            <span class="kelas-badge">

                                {{ $d->siswa->kelas->tingkat ?? '-' }}

                            </span>

                        </td>

                        <td>

                            {{ $d->siswa->kelas->jurusan->namajurusan ?? '-' }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($d->tanggal)->translatedFormat('d F Y') }}

                        </td>

                        <td>

                            {{ $d->jam_masuk ?? '-' }}

                        </td>

                        <td>

                            @if($d->status_masuk == 'hadir')

                                <span class="badge-modern badge-hadir">
                                    Hadir
                                </span>

                            @elseif($d->status_masuk == 'telat')

                                <span class="badge-modern badge-telat">
                                    Telat
                                </span>

                            @elseif($d->status_masuk == 'izin')

                                <span class="badge-modern badge-izin">
                                    Izin
                                </span>

                            @elseif($d->status_masuk == 'sakit')

                                <span class="badge-modern badge-sakit">
                                    Sakit
                                </span>

                            @else

                                <span class="badge-modern badge-alpha">
                                    Alpha
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8">

                            <div class="empty-state text-center">

                                <i class="fas fa-folder-open"></i>

                                <h5 class="font-weight-bold text-muted">
                                    Data laporan belum tersedia
                                </h5>

                                <small class="text-muted">
                                    Silakan lakukan filter atau input absensi terlebih dahulu
                                </small>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection