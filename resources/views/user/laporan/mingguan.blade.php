@extends('layouts.appadmin')

@section('content')

@php

    use App\Models\ModelAbsensi;
    use App\Models\ModelKelas;
    use Carbon\Carbon;

    $kelasid = request('kelasid');

    $minggu = request('minggu') ?? now()->format('Y-\WW');

    $tahun = substr($minggu, 0, 4);
    $mingguKe = substr($minggu, 6);

    $awalMinggu = Carbon::now()
        ->setISODate($tahun, $mingguKe)
        ->startOfWeek();

    $akhirMinggu = Carbon::now()
        ->setISODate($tahun, $mingguKe)
        ->endOfWeek();

    $kelas = ModelKelas::orderBy('namakelas')->get();

    $query = ModelAbsensi::with([
        'siswa',
        'kelas',
        'guru'
    ])
    ->whereBetween('tanggal', [
        $awalMinggu->format('Y-m-d'),
        $akhirMinggu->format('Y-m-d')
    ]);

    if ($kelasid) {
        $query->where('kelasid', $kelasid);
    }

    $data = $query
        ->orderBy('tanggal', 'DESC')
        ->get();

    $hadir = $data->where('status', 'hadir')->count();
    $izin  = $data->where('status', 'izin')->count();
    $sakit = $data->where('status', 'sakit')->count();
    $alpha = $data->where('status', 'alpha')->count();
    $cabut = $data->where('status', 'cabut')->count();

@endphp

<style>
    .card{
        border-radius: 18px;
    }

    .small-box{
        border-radius: 18px;
        overflow: hidden;
    }

    .table thead th{
        vertical-align: middle;
        text-align: center;
    }

    .table tbody td{
        vertical-align: middle;
    }

    .badge{
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
    }
</style>

{{-- HEADER --}}
<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1 class="font-weight-bold">
                    Laporan Mingguan Absensi
                </h1>
            </div>

        </div>

    </div>

</section>

{{-- CONTENT --}}
<section class="content">

    <div class="container-fluid">

        {{-- FILTER --}}
        <div class="card card-outline card-info shadow-sm">

            <div class="card-header">

                <h3 class="card-title">
                    Filter Laporan Mingguan
                </h3>

            </div>

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>
                                Pilih Minggu
                            </label>

                            <input type="week"
                                name="minggu"
                                value="{{ $minggu }}"
                                class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>
                                Pilih Kelas
                            </label>

                            <select name="kelasid"
                                class="form-control">

                                <option value="">
                                    -- Semua Kelas --
                                </option>

                                @foreach($kelas as $k)

                                    <option value="{{ $k->id }}"
                                        {{ $kelasid == $k->id ? 'selected' : '' }}>

                                        {{ $k->namakelas }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-2 mb-3 d-flex align-items-end">

                            <button type="submit"
                                class="btn btn-info btn-block">

                                <i class="fas fa-search"></i>
                                Tampilkan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        {{-- INFO MINGGU --}}
        <div class="alert alert-info shadow-sm">

            <i class="fas fa-calendar-week"></i>

            Data minggu :

            <b>
                {{ $awalMinggu->translatedFormat('d F Y') }}
            </b>

            s/d

            <b>
                {{ $akhirMinggu->translatedFormat('d F Y') }}
            </b>

        </div>

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
        <div class="card card-info card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    Data Laporan Mingguan
                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-bordered table-hover">

                    <thead class="bg-info">

                        <tr>

                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
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
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
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

                                <td colspan="8" class="text-center py-5">

                                    <i class="fas fa-folder-open fa-4x text-secondary mb-3"></i>

                                    <br>

                                    Tidak ada data laporan minggu ini.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection