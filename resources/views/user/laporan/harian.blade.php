@extends('layouts.appadmin')

@section('content')

@php

    use App\Models\ModelAbsensi;
    use App\Models\ModelLibur;
    use Carbon\Carbon;

    Carbon::setLocale('id');

    $tanggal = request('tanggal') ?? date('Y-m-d');

    $tanggalCarbon = Carbon::parse($tanggal);

    /*
    |--------------------------------------------------------------------------
    | CEK HARI LIBUR
    |--------------------------------------------------------------------------
    */

    $hariLibur = false;

    $keteranganLibur = null;

    if($tanggalCarbon->dayOfWeek == Carbon::SUNDAY){

        $hariLibur = true;

        $keteranganLibur = 'Hari Minggu';

    }

    $libur = ModelLibur::whereDate('tanggal', $tanggal)
        ->where('aktif', true)
        ->first();

    if($libur){

        $hariLibur = true;

        $keteranganLibur = $libur->keterangan;

    }

    /*
    |--------------------------------------------------------------------------
    | DATA ABSENSI
    |--------------------------------------------------------------------------
    */

    $data = ModelAbsensi::with([
        'siswa',
        'kelas',
        'guru'
    ])
    ->whereDate('tanggal', $tanggal)
    ->orderBy('tanggal', 'DESC')
    ->get();

    /*
    |--------------------------------------------------------------------------
    | REKAP
    |--------------------------------------------------------------------------
    */

    $hadir = $data->where('status', 'hadir')->count();
    $izin  = $data->where('status', 'izin')->count();
    $sakit = $data->where('status', 'sakit')->count();
    $alpha = $data->where('status', 'alpha')->count();
    $cabut = $data->where('status', 'cabut')->count();

@endphp

<style>

    body{
        background:#f4f6f9;
    }

    .small-box{
        border-radius:18px;
        overflow:hidden;
    }

    .card{
        border-radius:18px;
        overflow:hidden;
        border:none;
    }

    .table thead th{
        vertical-align:middle;
        text-align:center;
    }

    .table tbody td{
        vertical-align:middle;
    }

    .badge{
        padding:8px 14px;
        font-size:12px;
        border-radius:30px;
    }

    .header-print{
        display:none;
    }

    .logo-sekolah{
        width:85px;
        height:85px;
        object-fit:contain;
    }

    @media print{

        .no-print{
            display:none !important;
        }

        .header-print{
            display:block;
        }

        body{
            background:white;
        }

        .card{
            box-shadow:none !important;
        }

    }

</style>

{{-- HEADER --}}
<section class="content-header no-print">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="font-weight-bold">
                    Laporan Harian Absensi
                </h1>

            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        {{-- FILTER --}}
        <div class="card shadow-sm mb-4 no-print">

            <div class="card-body">

                <form method="GET">

                    <div class="row align-items-end">

                        <div class="col-md-4">

                            <label>
                                Pilih Tanggal
                            </label>

                            <input type="date"
                                   name="tanggal"
                                   value="{{ $tanggal }}"
                                   class="form-control">

                        </div>

                        <div class="col-md-2">

                            <button type="submit"
                                    class="btn btn-primary btn-block">

                                <i class="fas fa-search"></i>
                                Tampilkan

                            </button>

                        </div>

                        <div class="col-md-2">

                            <button type="button"
                                    onclick="window.print()"
                                    class="btn btn-success btn-block">

                                <i class="fas fa-print"></i>
                                Cetak

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        {{-- HEADER CETAK --}}
        <div class="header-print mb-4">

            <div class="text-center">

                <img src="{{ asset('dist/img/foto1.png') }}"
                     class="logo-sekolah mb-2">

                <h3 class="font-weight-bold mb-0">
                    SMK NEGERI 1 KARANG BARU
                </h3>

                <div>
                    Sistem Informasi Absensi Digital
                </div>

                <hr>

                <h4 class="font-weight-bold">
                    LAPORAN ABSENSI HARIAN
                </h4>

                <div>

                    Tanggal :

                    {{ $tanggalCarbon->translatedFormat('d F Y') }}

                </div>

            </div>

        </div>

        {{-- ALERT HARI LIBUR --}}
        @if($hariLibur)

            <div class="alert alert-danger shadow-sm">

                <h5 class="mb-1">

                    <i class="fas fa-calendar-times"></i>

                    Hari Libur

                </h5>

                <div>

                    {{ $keteranganLibur }}

                </div>

            </div>

        @endif

        {{-- REKAP --}}
        <div class="row">

            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-success">

                    <div class="inner">

                        <h3>{{ $hadir }}</h3>

                        <p>Hadir</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-check-circle"></i>

                    </div>

                </div>

            </div>

            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-warning">

                    <div class="inner">

                        <h3>{{ $izin }}</h3>

                        <p>Izin</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-envelope-open-text"></i>

                    </div>

                </div>

            </div>

            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-info">

                    <div class="inner">

                        <h3>{{ $sakit }}</h3>

                        <p>Sakit</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-notes-medical"></i>

                    </div>

                </div>

            </div>

            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-danger">

                    <div class="inner">

                        <h3>{{ $alpha }}</h3>

                        <p>Alpha</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-times-circle"></i>

                    </div>

                </div>

            </div>

            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-dark">

                    <div class="inner">

                        <h3>{{ $cabut }}</h3>

                        <p>Cabut</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-running"></i>

                    </div>

                </div>

            </div>

            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-primary">

                    <div class="inner">

                        <h3>{{ $data->count() }}</h3>

                        <p>Total</p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-users"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- TABEL --}}
        <div class="card shadow">

            <div class="card-header bg-success text-white">

                <h3 class="card-title">

                    Data Absensi Harian

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-bordered table-hover">

                    <thead class="bg-success text-white">

                        <tr>

                            <th width="5%">No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Guru</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->siswa->nis ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->siswa->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->kelas->namakelas ?? '-' }}
                                </td>

                                <td>

                                    {{ Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                </td>

                                <td class="text-center">

                                    @if($item->status == 'hadir')

                                        <span class="badge badge-success">
                                            HADIR
                                        </span>

                                    @elseif($item->status == 'izin')

                                        <span class="badge badge-warning">
                                            IZIN
                                        </span>

                                    @elseif($item->status == 'sakit')

                                        <span class="badge badge-info">
                                            SAKIT
                                        </span>

                                    @elseif($item->status == 'alpha')

                                        <span class="badge badge-danger">
                                            ALPHA
                                        </span>

                                    @elseif($item->status == 'cabut')

                                        <span class="badge badge-dark">
                                            CABUT
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $item->keterangan ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->guru->nama ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center py-5">

                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>

                                    <br>

                                    Tidak ada data absensi.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- FOOTER CETAK --}}
        <div class="header-print mt-5">

            <div class="row">

                <div class="col-8"></div>

                <div class="col-4 text-center">

                    Karang Baru,

                    {{ now()->translatedFormat('d F Y') }}

                    <br><br>

                    <b>Administrator</b>

                    <br><br><br><br>

                    ____________________

                </div>

            </div>

        </div>

    </div>

</section>

@endsection