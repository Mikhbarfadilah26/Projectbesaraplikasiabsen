@extends('layouts.appadmin')

@section('content')

@php

use Carbon\Carbon;

$semesterAktif = request('semesterid');
$tahun = request('tahun', date('Y'));

$hadir = $data->where('status', 'hadir')->count();
$izin = $data->where('status', 'izin')->count();
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
    }

    .table th{
        white-space: nowrap;
    }

    .badge-status{
        padding: 7px 12px;
        border-radius: 10px;
        font-size: 12px;
    }

    .filter-box{
        background: #fff;
        padding: 20px;
        border-radius: 18px;
        box-shadow: 0 2px 10px rgba(0,0,0,.05);
    }

    .title-page{
        font-weight: 700;
    }
</style>

<section class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="title-page">
                    Laporan Semester
                </h1>

                <small class="text-muted">
                    Rekap absensi siswa berdasarkan semester
                </small>
            </div>

            <div>
                <a href="#"
                    onclick="window.print()"
                    class="btn btn-primary">

                    <i class="fas fa-print mr-1"></i>
                    Cetak

                </a>
            </div>

        </div>

    </div>
</section>

<section class="content">
    <div class="container-fluid">

        {{-- FILTER --}}
        <div class="filter-box mb-4">

            <form method="GET"
                action="{{ route('laporan.absensi.semester') }}">

                <div class="row">

                    {{-- KELAS --}}
                    <div class="col-md-4 mb-3">

                        <label>Kelas</label>

                        <select name="kelasid"
                            class="form-control">

                            <option value="">
                                Semua Kelas
                            </option>

                            @foreach($kelas as $k)

                            <option value="{{ $k->id }}"
                                {{ request('kelasid') == $k->id ? 'selected' : '' }}>

                                {{ $k->namakelas }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- SEMESTER --}}
                    <div class="col-md-4 mb-3">

                        <label>Semester</label>

                        <select name="semesterid"
                            class="form-control">

                            <option value="">
                                Semua Semester
                            </option>

                            @foreach($semester as $s)

                            <option value="{{ $s->id }}"
                                {{ request('semesterid') == $s->id ? 'selected' : '' }}>

                                {{ ucfirst($s->nama) }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- TAHUN --}}
                    <div class="col-md-2 mb-3">

                        <label>Tahun</label>

                        <input type="number"
                            name="tahun"
                            value="{{ request('tahun', date('Y')) }}"
                            class="form-control">

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-2 mb-3 d-flex align-items-end">

                        <button type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-search mr-1"></i>
                            Filter

                        </button>

                    </div>

                </div>

            </form>

        </div>

        {{-- INFO --}}
        <div class="row">

            <div class="col-lg-2 col-6">

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

            <div class="col-lg-2 col-6">

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

            <div class="col-lg-2 col-6">

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

            <div class="col-lg-2 col-6">

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

            <div class="col-lg-2 col-6">

                <div class="small-box bg-secondary">

                    <div class="inner">

                        <h3>{{ $cabut }}</h3>

                        <p>Cabut</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-running"></i>
                    </div>

                </div>

            </div>

            <div class="col-lg-2 col-6">

                <div class="small-box bg-primary">

                    <div class="inner">

                        <h3>{{ $data->count() }}</h3>

                        <p>Total</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-database"></i>
                    </div>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="card card-primary card-outline">

            <div class="card-header">

                <h3 class="card-title">

                    Data Laporan Semester

                </h3>

            </div>

            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="bg-dark text-white text-center">

                        <tr>

                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Guru</th>
                            <th>Keterangan</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $no => $d)

                        @php

                        $badge = match($d->status){

                        'hadir' => 'success',
                        'izin' => 'warning',
                        'sakit' => 'info',
                        'alpha' => 'danger',
                        'cabut' => 'secondary',
                        default => 'dark'

                        };

                        @endphp

                        <tr>

                            <td class="text-center">
                                {{ $no + 1 }}
                            </td>

                            <td class="text-center">

                                {{ Carbon::parse($d->tanggal)->format('d-m-Y') }}

                            </td>

                            <td>
                                {{ $d->siswa->nama ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ $d->siswa->nis ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ $d->kelas->namakelas ?? '-' }}
                            </td>

                            <td class="text-center">

                                {{ ucfirst($d->semester->nama ?? '-') }}

                            </td>

                            <td class="text-center">

                                <span class="badge bg-{{ $badge }} badge-status">

                                    {{ strtoupper($d->status) }}

                                </span>

                            </td>

                            <td>
                                {{ $d->guru->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $d->keterangan ?? '-' }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9"
                                class="text-center text-muted py-4">

                                Data laporan semester tidak ditemukan

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