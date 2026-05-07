@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    {{-- HEADER HALAMAN --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Tentang Kami</h2>
        <p class="text-muted">Sistem Absensi Digital SMK Negeri 1 Karang Baru</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card border-0 shadow-lg" style="border-radius: 18px; overflow: hidden;">

                {{-- HEADER CARD DENGAN FOTO --}}
                <div style="background: linear-gradient(135deg, #6ec6ff, #2196f3); padding: 40px 30px;">
                    <div class="d-flex align-items-center">
                        {{-- FOTO PROFIL / LOGO --}}
                        <div class="me-4">
                            <img src="{{ asset('dist/img/foto1.png') }}"
                                class="rounded-circle shadow-sm border border-white border-3"
                                style="width: 100px; height: 100px; object-fit: cover;"
                                alt="Logo SMK">
                        </div>

                        <div>
                            <h3 class="text-white mb-1 fw-bold">SMK Negeri 1 Karang Baru</h3>
                            <p class="text-white mb-0" style="opacity: 0.9;">
                                Unggul, Terampil, dan Berkarakter
                            </p>
                        </div>
                    </div>
                </div>

                {{-- BODY --}}
                <div class="card-body p-4" style="background-color: #f4faff;">

                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-3">Mengenai Sistem</h5>
                        <p>
                            Sistem absensi ini dibuat untuk memudahkan proses pencatatan kehadiran siswa secara digital,
                            sehingga lebih <b>cepat</b>, <b>akurat</b>, dan <b>transparan</b>.
                        </p>

                        <p>
                            Dengan sistem ini, guru dan pihak sekolah dapat memantau kehadiran siswa secara
                            <b>real-time</b> tanpa harus menggunakan buku absensi manual.
                        </p>
                    </div>

                    <div class="bg-white p-3 rounded-3 shadow-sm">
                        <h6 class="fw-bold mb-3"><i class="bi bi-star-fill text-warning me-2"></i>Fitur Utama:</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">✅ Absensi siswa harian berbasis digital</li>
                            <li class="mb-2">📊 Rekap kehadiran otomatis per kelas</li>
                            <li>📄 Laporan kehadiran yang akuntabel</li>
                        </ul>
                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="text-center py-3" style="background-color: #e3f2fd;">
                    <small class="text-muted">
                        © {{ date('Y') }} SMK Negeri 1 Karang Baru • All rights reserved
                    </small>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection