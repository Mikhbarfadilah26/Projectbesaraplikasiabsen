@extends('layouts.applanding')

@section('content')

{{-- HERO --}}
@php
$bg = asset('dist/img/pagar.jpg');
@endphp

<div class="jumbotron text-center text-white mb-0"
    style="
        padding: 4rem 2rem;
        background: 
            linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
            url('{{ $bg }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    ">

    <h1 id="jam" class="display-4 font-weight-bold mb-0">00:00:00</h1>
    <p id="tanggal" class="lead mb-3">Memuat tanggal...</p>

    <h2 class="font-weight-bold">Sistem Absensi Digital</h2>
    <p>SMK NEGERI 1 KARANG BARU</p>

    <a href="{{ route('login.siswa') }}"
        class="btn btn-light font-weight-bold px-4 mt-2">
        LOGIN SISWA
    </a>
</div>

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