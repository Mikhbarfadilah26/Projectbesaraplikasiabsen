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
        min-height: 90px;
        display: block;
    }
    .hero-description {
    font-size: 1.1rem;
    color: var(--text-slate);

    max-width: 780px;

    line-height: 1.9;

    margin-bottom: 35px;

    text-align: center;
}

    /* EFFECT TYPING */
    .typing-text::after {
        content: '|';
        animation: blink 0.8s infinite;
        color: #22c55e;
        margin-left: 3px;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
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

                        <span class="text-highlight typing-text" id="typingText">
                            SMK Negeri 1 Karang Baru
                        </span>
                    </h1>
<p class="hero-description mx-auto">
    Kelola absensi siswa, monitoring kehadiran, laporan sekolah,
    dan data akademik secara cepat, modern, aman, serta
    terintegrasi dalam satu platform digital.
    
</p>


                    <div class="d-flex justify-content-center flex-wrap gap-3 mt-4">

                        <a href="{{ route('login.siswa') }}"
                            class="btn-cta">

                            <i class="fas fa-user-graduate mr-2"></i>

                            Login Siswa

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
    const texts = [
        "SMK Negeri 1 Karang Baru",
        "Sistem Absensi Modern",
        "Platform Sekolah Digital",
        "Monitoring Kehadiran Siswa",
        "Absensi Cepat & Aman"
    ];

    let count = 0;
    let index = 0;
    let currentText = '';
    let letter = '';

    function type() {

        if (count === texts.length) {
            count = 0;
        }

        currentText = texts[count];

        letter = currentText.slice(0, ++index);

        document.getElementById('typingText').textContent = letter;

        if (letter.length === currentText.length) {

            setTimeout(() => {

                erase();

            }, 1800);

        } else {

            setTimeout(type, 90);

        }

    }

    function erase() {

        letter = currentText.slice(0, --index);

        document.getElementById('typingText').textContent = letter;

        if (letter.length === 0) {

            count++;

            setTimeout(type, 400);

        } else {

            setTimeout(erase, 40);

        }

    }

    type();
</script>

{{-- CONTENT --}}
<section class="content-section">

    <div class="container">

        <div class="row">

            {{-- LEFT --}}
            <div class="col-lg-8">

                {{-- PENGUMUMAN --}}
                <div class="card custom-card shadow-sm mb-4 border-0 rounded-4 overflow-hidden">

                    {{-- HEADER --}}
                    <div class="card-header card-gradient-purple p-3 border-0">

                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0 text-white font-weight-bold">

                                <i class="fas fa-bullhorn mr-2"></i>
                                Pengumuman Terbaru

                            </h5>

                            <a href="{{ route('landing.pengumuman') }}"
                                class="text-white font-weight-bold text-decoration-none">

                                Lihat Semua
                                <i class="fas fa-arrow-right ml-1"></i>

                            </a>

                        </div>

                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4 bg-white">

                        @if($pengumumanHome->count() > 0)

                        <div id="carouselPengumuman"
                            class="carousel slide"
                            data-ride="carousel">

                            <div class="carousel-inner">

                                @foreach($pengumumanHome as $key => $item)

                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                    <div class="row align-items-center">

                                        {{-- FOTO --}}
                                        <div class="col-md-5 mb-3 mb-md-0">

                                            @if($item->foto)

                                            <img src="{{ asset('storage/' . $item->foto) }}"
                                                class="img-fluid rounded-4 shadow-sm w-100"
                                                style="
                                    height:260px;
                                    object-fit:cover;
                                ">

                                            @else

                                            <div class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                                                style="
                                    height:260px;
                                ">

                                                <div class="text-center text-muted">

                                                    <i class="fas fa-image fa-3x mb-2"></i>

                                                    <p class="mb-0">
                                                        Tidak ada foto
                                                    </p>

                                                </div>

                                            </div>

                                            @endif

                                        </div>

                                        {{-- KONTEN --}}
                                        <div class="col-md-7">

                                            {{-- TANGGAL --}}
                                            <div class="mb-3">

                                                <span class="badge badge-light px-3 py-2 shadow-sm">

                                                    <i class="fas fa-calendar-alt text-primary mr-1"></i>

                                                    {{ $item->created_at->format('d F Y') }}

                                                </span>

                                            </div>

                                            {{-- JUDUL --}}
                                            <h3 class="font-weight-bold text-dark mb-3">

                                                {{ $item->judul }}

                                            </h3>

                                            {{-- ISI --}}
                                            <p class="text-muted mb-4"
                                                style="
                                    min-height:90px;
                                    overflow:hidden;
                                    display:-webkit-box;
                                    -webkit-line-clamp:4;
                                    -webkit-box-orient:vertical;
                                ">

                                                {{ Str::limit(strip_tags($item->isi), 220) }}

                                            </p>

                                            {{-- FOOTER --}}
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">

                                                <div class="mb-2 mb-md-0">

                                                    <i class="fas fa-user-circle text-secondary mr-1"></i>

                                                    <small class="text-muted">

                                                        {{ $item->user->nama ?? 'Admin Sekolah' }}

                                                    </small>

                                                </div>

                                                <a href="{{ route('landing.pengumuman.detail', $item->id) }}"
                                                    class="btn btn-success rounded-pill px-4 shadow-sm">

                                                    Baca Detail

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                @endforeach

                            </div>

                            {{-- PREV --}}
                            <a class="carousel-control-prev"
                                href="#carouselPengumuman"
                                role="button"
                                data-slide="prev">

                                <span class="custom-arrow">

                                    <i class="fas fa-chevron-left"></i>

                                </span>

                            </a>

                            {{-- NEXT --}}
                            <a class="carousel-control-next"
                                href="#carouselPengumuman"
                                role="button"
                                data-slide="next">

                                <span class="custom-arrow">

                                    <i class="fas fa-chevron-right"></i>

                                </span>

                            </a>

                        </div>

                        @else

                        <div class="alert alert-light mb-0 rounded-4">

                            <i class="fas fa-info-circle mr-2"></i>

                            Belum ada pengumuman terbaru.

                        </div>

                        @endif

                    </div>

                </div>

                <style>
                    .card-gradient-purple {
                        background: linear-gradient(135deg, #7c3aed, #4f46e5);
                    }

                    .custom-arrow {
                        width: 50px;
                        height: 50px;
                        border-radius: 50%;
                        background: white;
                        color: #4f46e5;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 18px;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, .15);
                    }

                    .carousel-control-prev,
                    .carousel-control-next {
                        width: 8%;
                        opacity: 1;
                    }

                    .carousel-control-prev {
                        left: -20px;
                    }

                    .carousel-control-next {
                        right: -20px;
                    }

                    @media(max-width:768px) {

                        .carousel-control-prev {
                            left: 0;
                        }

                        .carousel-control-next {
                            right: 0;
                        }

                    }
                </style>

                {{-- JURUSAN --}}
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

                        <a href="https://wa.me/6282267123172"
                            target="_blank"
                            class="btn btn-success w-100 d-flex align-items-center justify-content-center">

                            <i class="fab fa-whatsapp mr-2 fa-lg"></i>

                            Hubungi Admin

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection