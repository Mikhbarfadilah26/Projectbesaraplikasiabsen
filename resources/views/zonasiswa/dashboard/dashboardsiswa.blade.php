@extends('layouts.appsiswa')

@section('content')
<style>
    /* Custom Styling untuk tampilan Estetik */
    .welcome-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        box-shadow: 0 10px 20px rgba(118, 75, 162, 0.2);
    }
    
    .stat-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #ffffff;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .icon-shape {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .btn-menu {
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        color: white !important;
        text-decoration: none !important;
        display: block;
        transition: all 0.3s;
        border: none;
    }

    .btn-menu:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }

    .bg-gradient-primary { background: linear-gradient(45deg, #4e73df, #224abe); }
    .bg-gradient-success { background: linear-gradient(45deg, #1cc88a, #13855c); }
    .bg-gradient-warning { background: linear-gradient(45deg, #f6c23e, #dda20a); }
    .bg-gradient-info { background: linear-gradient(45deg, #36b9cc, #258391); }
    .bg-gradient-danger { background: linear-gradient(45deg, #e74a3b, #be2617); }
    .bg-gradient-dark { background: linear-gradient(45deg, #5a5c69, #373840); }
</style>

<div class="container-fluid py-4">

    {{-- WELCOME HEADER --}}
    <div class="welcome-banner d-flex align-items-center justify-content-between">
        <div>
            <h2 class="font-weight-bold mb-1">Semangat Belajar, {{ explode(' ', auth('siswa')->user()->nama)[0] }}! ✨</h2>
            <p class="opacity-8 mb-0">Kamu berada di kelas <strong>{{ auth('siswa')->user()->kelas->nama ?? '-' }}</strong>. Cek aktivitasmu hari ini.</p>
        </div>
        <div class="d-none d-md-block">
            <i class="fas fa-user-rocket fa-4x opacity-2"></i>
        </div>
    </div>

    {{-- QUICK STATS --}}
    <div class="row">
        {{-- Status Absen --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-shape {{ isset($absenHariIni) ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }}" style="background-color: #f0fdf4;">
                        <i class="fas fa-fingerprint"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm mb-0 text-muted font-weight-bold">Status Kehadiran</p>
                        @if(isset($absenHariIni))
                            <h5 class="mb-0 font-weight-bold text-success">{{ $absenHariIni->status }}</h5>
                            <small class="text-muted">Masuk: {{ $absenHariIni->jam_masuk ?? '-' }}</small>
                        @else
                            <h5 class="mb-0 font-weight-bold text-danger">Belum Absen</h5>
                            <small class="text-muted">Jangan lupa absen ya!</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- NIS --}}
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-shape text-primary" style="background-color: #eff6ff;">
                        <i class="fas fa-id-badge"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm mb-0 text-muted font-weight-bold">Nomor Induk Siswa</p>
                        <h5 class="mb-0 font-weight-bold text-dark">{{ auth('siswa')->user()->nis ?? '-' }}</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- RINGKASAN KEHADIRAN --}}
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="d-flex justify-content-around text-center">
                    <div>
                        <span class="d-block text-muted small font-weight-bold text-uppercase">Hadir</span>
                        <span class="h5 font-weight-bold text-success">{{ $hadir ?? 0 }}</span>
                    </div>
                    <div style="border-left: 1px solid #eee; height: 40px;"></div>
                    <div>
                        <span class="d-block text-muted small font-weight-bold text-uppercase">Izin</span>
                        <span class="h5 font-weight-bold text-warning">{{ $izin ?? 0 }}</span>
                    </div>
                    <div style="border-left: 1px solid #eee; height: 40px;"></div>
                    <div>
                        <span class="d-block text-muted small font-weight-bold text-uppercase">Alfa</span>
                        <span class="h5 font-weight-bold text-danger">{{ $alfa ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MENU NAVIGASI ESTETIK --}}
    <h5 class="font-weight-bold mb-3 mt-2">Menu Utama</h5>
    <div class="row">
        <div class="col-6 col-md-3 mb-4">
            <a href="/siswa/absensi" class="btn-menu bg-gradient-success shadow-lg">
                <i class="fas fa-camera-retro fa-2x mb-3 d-block"></i>
                <span class="font-weight-bold">Absensi</span>
            </a>
        </div>

        <div class="col-6 col-md-3 mb-4">
            <a href="/siswa/profile" class="btn-menu bg-gradient-dark shadow-lg">
                <i class="fas fa-user-cog fa-2x mb-3 d-block"></i>
                <span class="font-weight-bold">Profil</span>
            </a>
        </div>
    </div>

</div>
@endsection