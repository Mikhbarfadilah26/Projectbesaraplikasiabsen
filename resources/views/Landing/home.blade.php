@extends('layouts.applanding')

@section('content')

{{-- HERO --}}
@php
$bg = asset('dist/img/pagar.jpg');
@endphp

<style>
    /* Animasi halus untuk elemen floating */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .hero-container {
        position: relative;
        overflow: hidden;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4rem 1rem;
        /* Overlay Gradient berlapis untuk kedalaman tema gelap */
        background: 
            radial-gradient(circle at 10% 20%, rgba(34, 197, 94, 0.15) 0%, transparent 40%),
            radial-gradient(circle at 90% 80%, rgba(30, 41, 59, 0.2) 0%, transparent 40%),
            linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)),
            url('{{ $bg }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .glass-box {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        padding: 50px 60px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        animation: float 6s ease-in-out infinite;
        max-width: 800px;
        width: 100%;
    }

    .digital-clock {
        font-family: 'Monaco', 'Consolas', monospace;
        font-size: clamp(3rem, 10vw, 5rem);
        font-weight: 800;
        letter-spacing: -2px;
        background: linear-gradient(to bottom, #ffffff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0;
        line-height: 1;
    }

    .date-text {
        font-size: 1.1rem;
        color: #4ade80; /* Hijau Emerald */
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 30px;
    }

    .hero-title {
        font-size: clamp(1.8rem, 5vw, 2.8rem);
        font-weight: 700;
        color: white;
        margin-bottom: 8px;
    }

    .hero-subtitle {
        color: #94a3b8;
        font-size: 1.2rem;
        margin-bottom: 35px;
        font-weight: 300;
    }

    .btn-modern {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        padding: 16px 45px;
        border-radius: 16px;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 20px -10px rgba(34, 197, 94, 0.5);
    }

    .btn-modern:hover {
        transform: scale(1.05) translateY(-3px);
        box-shadow: 0 20px 30px -10px rgba(34, 197, 94, 0.6);
        color: white;
    }

    .btn-modern i {
        transition: transform 0.3s;
    }

    .btn-modern:hover i {
        transform: translateX(5px);
    }
</style>

<div class="hero-container text-center">
    
    <div class="glass-box">
        {{-- JAM DIGITAL --}}
        <h1 id="jam" class="digital-clock">00:00:00</h1>

        {{-- TANGGAL --}}
        <p id="tanggal" class="date-text">Memuat tanggal...</p>

        <div style="width: 60px; height: 4px; background: #22c55e; margin: 0 auto 30px; border-radius: 2px;"></div>

        {{-- JUDUL --}}
        <h2 class="hero-title">Sistem Absensi Digital</h2>
        <p class="hero-subtitle">SMK NEGERI 1 KARANG BARU</p>

        {{-- TOMBOL --}}
        <a href="{{ route('login.siswa') }}" class="btn-modern">
            <i class="fas fa-sign-in-alt"></i> Login Kehadiran Siswa
        </a>
    </div>

</div>

<script>
    function updateWaktu() {
        const sekarang = new Date();
        
        // Format Jam
        const jam = String(sekarang.getHours()).padStart(2, '0');
        const menit = String(sekarang.getMinutes()).padStart(2, '0');
        const detik = String(sekarang.getSeconds()).padStart(2, '0');
        document.getElementById('jam').innerHTML = `${jam}:${menit}:${detik}`;

        // Format Tanggal Indonesia
        const opsi = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('tanggal').innerHTML = sekarang.toLocaleDateString('id-ID', opsi);
    }
    
    setInterval(updateWaktu, 1000);
    updateWaktu();
</script>
{{-- CONTENT --}}
<div class="container mt-4">
    <div class="row">

        {{-- KONTEN KIRI --}}
        <div class="col-lg-8">

            {{-- PENGUMUMAN --}}
            <div class="card mb-4 shadow border-0" style="border-radius: 15px; overflow: hidden;">

                {{-- HEADER --}}
                <div class="card-header text-white"
                    style="background: linear-gradient(135deg, #6f42c1, #5a32a3);">
                    <strong>📢 Pengumuman</strong>
                </div>

                {{-- BODY --}}
                <div class="card-body" style="background-color: #f8f9fa;">

                    <div class="mb-3 p-2 rounded"
                        style="border-left: 5px solid #6f42c1; background: #ffffff;">
                        <small class="text-muted d-block">26 April 2026</small>
                        <span>Persiapan Ujian Akhir Semester</span>
                    </div>

                    <div class="mb-3 p-2 rounded"
                        style="border-left: 5px solid #6f42c1; background: #ffffff;">
                        <small class="text-muted d-block">24 April 2026</small>
                        <span>Jadwal Piket Kebersihan Baru</span>
                    </div>

                    {{-- BUTTON --}}
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm px-4">
                            Lihat Selengkapnya
                        </a>
                    </div>

                </div>
            </div>

            {{-- STATISTIK --}}
            <div class="card mb-4 shadow-sm text-center">
                <div class="card-header bg-primary text-white">
                    Statistik Absensi
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-success mb-0">80%</h5>
                            <small>Hadir</small>
                        </div>
                        <div class="col-6">
                            <h5 class="text-warning mb-0">10%</h5>
                            <small>Izin</small>
                        </div>
                        <div class="col-6 mt-3">
                            <h5 class="text-info mb-0">5%</h5>
                            <small>Sakit</small>
                        </div>
                        <div class="col-6 mt-3">
                            <h5 class="text-danger mb-0">5%</h5>
                            <small>Alpha</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- SIDEBAR KANAN --}}
        <div class="col-lg-4">
            {{-- INFORMASI --}}
            <div class="card mb-4 shadow border-0" style="border-radius: 15px; overflow: hidden;">

                {{-- HEADER --}}
                <div class="card-header text-white"
                    style="background: linear-gradient(135deg, #17a2b8, #138496);">
                    <strong>Informasi</strong>
                </div>

                {{-- BODY --}}
                <div class="card-body" style="background-color: #f8f9fa;">

                    <p class="small text-muted">
                        Sistem absensi ini digunakan untuk mencatat kehadiran siswa secara digital.
                        Pastikan login menggunakan NIS dan melakukan absensi sesuai jadwal.
                    </p>

                    {{-- JAM MASUK --}}
                    <div class="p-3 mb-2 text-center rounded"
                        style="background: linear-gradient(135deg, #28a745, #218838); color: white;">
                        <small>Jam Masuk</small><br>
                        <strong>07:00 - 08:00</strong>
                    </div>

                    {{-- JAM PULANG --}}
                    <div class="p-3 text-center rounded"
                        style="background: linear-gradient(135deg, #ffc107, #e0a800); color: black;">
                        <small>Jam Pulang</small><br>
                        <strong>15:00 - 16:30</strong>
                    </div>

                </div>
            </div>

            {{-- BUTUH BANTUAN --}}
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="font-weight-bold">Butuh Bantuan?</h6>
                    <p class="small text-muted">Hubungi kami kapan saja</p>
                    <button class="btn btn-success btn-sm">Kontak</button>
                </div>
            </div>

        </div>

    </div>
</div>

{{-- SCRIPT JAM --}}
<script>
    function updateWaktu() {
        const sekarang = new Date();
        const jam = String(sekarang.getHours()).padStart(2, '0');
        const menit = String(sekarang.getMinutes()).padStart(2, '0');
        const detik = String(sekarang.getSeconds()).padStart(2, '0');
        document.getElementById('jam').innerHTML = `${jam}:${menit}:${detik}`;

        document.getElementById('tanggal').innerHTML =
            sekarang.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
    }
    setInterval(updateWaktu, 1000);
    updateWaktu();
</script>

@endsection