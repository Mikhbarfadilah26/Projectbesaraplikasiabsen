@extends('layouts.applanding')

@section('content')

<style>
    :root {
        --primary-green: #22c55e;
        --dark-navy: #0f172a;
        --text-slate: #94a3b8;
    }

    /* HERO */
    .hero-wrapper {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: flex-start;
        overflow: hidden;

        background:
            radial-gradient(circle at top left, rgba(34, 197, 94, 0.08), transparent 35%),
            radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.08), transparent 35%),
            linear-gradient(135deg, #0f172a 0%, #111827 45%, #1e293b 100%);

        padding: 110px 0 70px;
        color: white;

        border-radius: 0 0 40px 40px;
    }

    .hero-wrapper::before {
        content: '';
        position: absolute;
        width: 450px;
        height: 450px;
        background: rgba(34, 197, 94, 0.08);
        border-radius: 50%;
        top: -150px;
        left: -120px;
        filter: blur(100px);
    }

    .hero-wrapper::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: rgba(59, 130, 246, 0.08);
        border-radius: 50%;
        bottom: -150px;
        right: -100px;
        filter: blur(100px);
    }

    .hero-content-inner {
        padding-left: 45px;
        padding-right: 30px;
        padding-top: 10px;
        position: relative;
        z-index: 10;
    }

    .badge-modern {
        background: rgba(34, 197, 94, 0.15);
        color: var(--primary-green);
        border: 1px solid rgba(34, 197, 94, 0.3);
        padding: 10px 22px;
        border-radius: 50px;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .hero-title-main {
        font-size: clamp(2.8rem, 6vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .text-highlight {
        color: var(--primary-green);
    }

    .hero-description {
        font-size: 1.1rem;
        color: var(--text-slate);
        max-width: 760px;
        line-height: 1.8;
        margin-bottom: 35px;
    }

    .btn-cta {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        padding: 18px 40px;
        border-radius: 16px;
        font-weight: 700;
        transition: all 0.3s;
        box-shadow: 0 10px 30px rgba(34, 197, 94, 0.3);
        text-decoration: none;
        display: inline-block;
    }

    .btn-cta:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(34, 197, 94, 0.4);
        color: white;
        text-decoration: none;
    }

    .content-section {
        padding: 90px 0;
        background: #f8fafc;
    }

    .custom-card {
        border: none;
        border-radius: 24px;
        transition: 0.3s;
        overflow: hidden;
    }

    .custom-card:hover {
        transform: translateY(-5px);
    }

    .card-gradient-purple {
        background: linear-gradient(135deg, #6366f1, #4338ca);
        color: white;
    }

    .stat-circle {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-weight: bold;
        font-size: 15px;
    }

    .jurusan-box {
        border-radius: 20px;
        transition: .3s;
        border: 1px solid #e2e8f0;
    }

    .jurusan-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }

    @media(max-width:991px) {

        .hero-wrapper {
            text-align: center;
            padding: 90px 0 70px;
        }

        .hero-content-inner {
            padding-left: 10px;
            padding-right: 10px;
        }

        .hero-description {
            margin: auto auto 35px;
        }

    }
</style>

{{-- HERO --}}
<section class="hero-wrapper">

    <div class="container">

        <div class="row justify-content-center text-center align-items-start">

            <div class="col-lg-9">

                <div class="hero-content-inner">

                    <div class="badge-modern">

                        <i class="fas fa-shield-alt"></i>

                        Sistem Absensi Digital Modern

                    </div>

                    <h1 class="hero-title-main">

                        Aplikasi Absensi

                        <span class="text-highlight d-block">
                            SMK Negeri 1 Karang Baru
                        </span>

                    </h1>

                    <p class="hero-description mx-auto">

                        Kelola absensi siswa, monitoring kehadiran,
                        laporan sekolah, dan data akademik
                        secara cepat, modern, aman,
                        dan terintegrasi dalam satu platform digital.

                    </p>

                    <div class="d-flex justify-content-center flex-wrap gap-3 mt-4">

                        <a href="{{ route('login.siswa') }}"
                            class="btn-cta">

                            <i class="fas fa-user-graduate mr-2"></i>

                            Login Siswa

                        </a>

                    </div>

                    <div class="row justify-content-center mt-5 text-center">

                        <div class="col-4 col-md-2">

                            <h3 class="font-weight-bold text-success">
                                Fast
                            </h3>

                            <small class="text-muted">
                                Absensi Cepat
                            </small>

                        </div>

                        <div class="col-4 col-md-2">

                            <h3 class="font-weight-bold text-info">
                                Smart
                            </h3>

                            <small class="text-muted">
                                Dashboard Modern
                            </small>

                        </div>

                        <div class="col-4 col-md-2">

                            <h3 class="font-weight-bold text-warning">
                                Report
                            </h3>

                            <small class="text-muted">
                                Laporan Otomatis
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- CONTENT --}}
<section class="content-section">

    <div class="container">

        <div class="row">

            {{-- LEFT --}}
            <div class="col-lg-8">

                {{-- PENGUMUMAN DATABASE --}}
                <div class="card custom-card shadow-sm mb-4">

                    <div class="card-header card-gradient-purple p-3">

                        <div class="d-flex justify-content-between align-items-center">

                            <h6 class="mb-0 text-white">

                                <i class="fas fa-bullhorn mr-2"></i>

                                Pengumuman Terbaru

                            </h6>

                            <a href="{{ route('landing.pengumuman') }}"
                                class="text-white">

                                Lihat Semua

                            </a>

                        </div>

                    </div>

                    <div class="card-body p-4">

                        @forelse($pengumumanHome as $item)

                        <div class="d-flex align-items-center mb-3 p-3 border-left border-success border-4 bg-light rounded">

                            <div class="flex-grow-1">

                                <small class="text-muted">

                                    {{ $item->created_at->format('d F Y') }}

                                </small>

                                <h6 class="mb-2 mt-1">

                                    {{ $item->judul }}

                                </h6>

                                <a href="{{ route('landing.pengumuman.detail',$item->id) }}"
                                    class="text-success font-weight-bold">

                                    Lihat Selengkapnya

                                </a>

                            </div>

                            <i class="fas fa-chevron-right text-muted"></i>

                        </div>

                        @empty

                        <div class="alert alert-light mb-0">

                            Belum ada pengumuman terbaru.

                        </div>

                        @endforelse

                    </div>

                </div>

                {{-- JURUSAN DATABASE --}}
                <div class="card custom-card shadow-sm mb-4">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h5 class="font-weight-bold mb-0">

                                Jurusan Sekolah

                            </h5>

                            <a href="{{ route('landing.jurusan') }}"
                                class="text-success font-weight-bold">

                                Lihat Semua

                            </a>

                        </div>

                        <div class="row">

                            @foreach($jurusan as $item)

                            <div class="col-md-4 mb-3">

                                <div class="jurusan-box bg-white p-4 text-center h-100">

                                    <i class="fas fa-laptop-code fa-2x text-success mb-3"></i>

                                    <h6 class="font-weight-bold">

                                        {{ $item->namajurusan }}

                                    </h6>

                                    <a href="{{ route('landing.jurusan.detail',$item->id) }}"
                                        class="btn btn-outline-success btn-sm mt-3 rounded-pill">

                                        Detail

                                    </a>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

                {{-- STATISTIK --}}
                <div class="card custom-card shadow-sm">

                    <div class="card-body p-4">

                        <h6 class="font-weight-bold mb-4">
                            Ringkasan Kehadiran Hari Ini
                        </h6>

                        <div class="row text-center">

                            <div class="col-3">

                                <div class="stat-circle text-success"
                                    style="background:#dcfce7;">

                                    80%

                                </div>

                                <small class="text-muted">
                                    Hadir
                                </small>

                            </div>

                            <div class="col-3">

                                <div class="stat-circle text-warning"
                                    style="background:#fef9c3;">

                                    10%

                                </div>

                                <small class="text-muted">
                                    Izin
                                </small>

                            </div>

                            <div class="col-3">

                                <div class="stat-circle text-info"
                                    style="background:#e0f2fe;">

                                    5%

                                </div>

                                <small class="text-muted">
                                    Sakit
                                </small>

                            </div>

                            <div class="col-3">

                                <div class="stat-circle text-danger"
                                    style="background:#fee2e2;">

                                    5%

                                </div>

                                <small class="text-muted">
                                    Alpha
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-4">

                <div class="card custom-card shadow-sm border-0 mb-4 bg-dark text-white">

                    <div class="card-body p-4 text-center">

                        <i class="fas fa-info-circle fa-2x mb-3 text-success"></i>

                        <h6 class="font-weight-bold">
                            Informasi Login
                        </h6>

                        <p class="small text-secondary">

                            Gunakan NIS untuk masuk ke sistem
                            dan lakukan absensi tepat waktu.

                        </p>

                        <button class="btn btn-outline-light btn-sm w-100 mt-2">

                            Panduan Penggunaan

                        </button>

                    </div>

                </div>

                <div class="card custom-card shadow-sm border-0 text-center">

                    <div class="card-body p-4">

                        <h6 class="font-weight-bold">
                            Butuh Bantuan?
                        </h6>

                        <p class="small text-muted mb-4">

                            Tim IT Support siap membantu
                            jika terjadi kendala teknis.

                        </p>

                        <a href="#"
                            class="btn btn-success w-100"
                            style="border-radius: 12px;">

                            <i class="fab fa-whatsapp mr-2"></i>

                            Hubungi Admin

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection