@extends('layouts.appguru')

@section('title', 'Dashboard Guru')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-3">
        <h4 class="font-weight-bold">Dashboard Guru</h4>
        <p class="text-muted">Selamat datang, {{ auth()->user()->nama }}</p>
    </div>

    {{-- INFO BOX --}}
    <div class="row">

        {{-- PROFIL GURU --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h5>{{ auth()->user()->nama }}</h5>
                    <p>Guru Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </div>

        {{-- JADWAL HARI INI --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>3</h3> {{-- nanti dari DB --}}
                    <p>Jadwal Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <a href="/jadwal" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- ABSENSI --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>30</h3>
                    <p>Absensi Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
                <a href="/absensi" class="small-box-footer">
                    Input <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- LAPORAN --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>10</h3>
                    <p>Laporan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file"></i>
                </div>
                <a href="/laporan/harian" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- CARD --}}
    <div class="row">

        {{-- INFO --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title text-white">Informasi Guru</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Nama: {{ auth()->user()->nama }}</li>
                        <li>ID: {{ auth()->user()->id }}</li>
                        <li>Tanggal: {{ date('d-m-Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- MENU CEPAT --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title text-white">Menu Cepat</h3>
                </div>
                <div class="card-body text-center">

                    <a href="/absensi" class="btn btn-success m-1">
                        <i class="fas fa-check"></i> Absensi
                    </a>

                    <a href="/jadwal" class="btn btn-primary m-1">
                        <i class="fas fa-calendar"></i> Jadwal
                    </a>

                    <a href="/laporan/harian" class="btn btn-danger m-1">
                        <i class="fas fa-file"></i> Laporan
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection