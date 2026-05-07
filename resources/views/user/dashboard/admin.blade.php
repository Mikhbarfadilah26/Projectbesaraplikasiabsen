@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-3">
        <h4 class="font-weight-bold">Dashboard Admin</h4>
        <p class="text-muted">Selamat datang, {{ auth()->user()->nama }}</p>
    </div>

    {{-- INFO BOX --}}
    <div class="row">

        {{-- ADMIN --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h5>Admin Login</h5>
                    <p>{{ auth()->user()->nama }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
        </div>

        {{-- SISWA --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3> {{-- nanti ambil dari database --}}
                    <p>Total Siswa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <a href="/siswa" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- KELAS --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>12</h3>
                    <p>Total Kelas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-door-open"></i>
                </div>
                <a href="/kelas" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- ABSENSI --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>53</h3>
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

    </div>

    {{-- CARD INFO --}}
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">Informasi Sistem</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Nama Admin: {{ auth()->user()->nama }}</li>
                        <li>ID User: {{ auth()->user()->id }}</li>
                        <li>Tanggal Login: {{ date('d-m-Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="card-title text-white">Menu Cepat</h3>
                </div>
                <div class="card-body text-center">

                    <a href="/siswa" class="btn btn-primary m-1">
                        <i class="fas fa-user-graduate"></i> Siswa
                    </a>

                    <a href="/kelas" class="btn btn-warning m-1">
                        <i class="fas fa-door-open"></i> Kelas
                    </a>

                    <a href="/absensi" class="btn btn-success m-1">
                        <i class="fas fa-check"></i> Absensi
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