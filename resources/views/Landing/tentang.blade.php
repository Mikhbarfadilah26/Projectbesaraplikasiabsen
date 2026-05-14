@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    {{-- HEADER HALAMAN --}}
    <div class="text-center mb-5">

        <h2 class="fw-bold text-warning">

            Tentang Kami

        </h2>

        <p class="text-muted">

            Sistem Absensi Digital SMK Negeri 1 Karang Baru

        </p>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div
                class="card border-0 shadow-lg about-card"
            >

                {{-- HEADER CARD --}}
                <div class="about-header">

                    <div class="d-flex align-items-center flex-wrap">

                        {{-- LOGO --}}
                        <div class="mr-4 mb-3 mb-md-0">

                            <img
                                src="{{ asset('dist/img/foto1.png') }}"
                                class="about-logo"
                                alt="Logo SMK"
                            >

                        </div>

                        {{-- TEXT --}}
                        <div>

                            <h3 class="text-white mb-1 fw-bold">

                                SMK Negeri 1 Karang Baru

                            </h3>

                            <p class="text-white mb-0 about-subtitle">

                                Disiplin, Aktif, dan Bertanggung Jawab

                            </p>

                        </div>

                    </div>

                </div>

                {{-- BODY --}}
                <div class="card-body p-4 about-body">

                    <div class="mb-4">

                        <h5 class="fw-bold text-warning mb-3">

                            Mengenai Sistem

                        </h5>

                        <p>

                            Sistem absensi ini dibuat untuk membantu guru
                            dalam melakukan pencatatan kehadiran siswa
                            secara digital agar proses absensi menjadi
                            lebih cepat, rapi, dan efisien.

                        </p>

                        <p>

                            Dengan sistem ini, guru dapat mengelola data
                            kehadiran siswa secara langsung,
                            sementara pihak sekolah dapat memantau
                            rekap absensi dengan lebih mudah dan terstruktur.

                        </p>

                    </div>

                    {{-- FITUR --}}
                    <div class="feature-box">

                        <h6 class="fw-bold mb-3">

                            <i class="fas fa-star text-warning mr-2"></i>

                            Fitur Utama

                        </h6>

                        <ul class="list-unstyled mb-0">

                            <li class="mb-2">

                                ✅ Guru melakukan absensi siswa harian secara digital

                            </li>

                            <li class="mb-2">

                                📊 Rekap kehadiran otomatis per kelas

                            </li>

                            <li class="mb-2">

                                📄 Data absensi lebih rapi dan terorganisir

                            </li>

                            <li>

                                🏫 Monitoring kehadiran siswa oleh sekolah

                            </li>

                        </ul>

                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="about-footer">

                    <small class="text-muted">

                        © {{ date('Y') }}
                        SMK Negeri 1 Karang Baru • All rights reserved

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    body {

        background: #fffdf5;

    }

    /*
    |--------------------------------------------------------------------------
    | CARD
    |--------------------------------------------------------------------------
    */

    .about-card {

        border-radius: 22px;

        overflow: hidden;

        background: white;

    }

    /*
    |--------------------------------------------------------------------------
    | HEADER
    |--------------------------------------------------------------------------
    */

    .about-header {

        background: linear-gradient(
            135deg,
            #facc15,
            #eab308
        );

        padding: 40px 30px;

        position: relative;

        overflow: hidden;

    }

    .about-header::before {

        content: '';

        position: absolute;

        width: 220px;

        height: 220px;

        border-radius: 50%;

        background: rgba(255,255,255,0.12);

        top: -80px;

        right: -80px;

    }

    /*
    |--------------------------------------------------------------------------
    | LOGO
    |--------------------------------------------------------------------------
    */

    .about-logo {

        width: 100px;

        height: 100px;

        object-fit: cover;

        border-radius: 50%;

        border: 4px solid rgba(255,255,255,0.8);

        background: white;

        box-shadow: 0 10px 20px rgba(0,0,0,0.12);

    }

    .about-subtitle {

        opacity: .9;

    }

    /*
    |--------------------------------------------------------------------------
    | BODY
    |--------------------------------------------------------------------------
    */

    .about-body {

        background: #fffef7;

    }

    .about-body p {

        color: #4b5563;

        line-height: 1.9;

    }

    /*
    |--------------------------------------------------------------------------
    | FITUR BOX
    |--------------------------------------------------------------------------
    */

    .feature-box {

        background: white;

        padding: 20px;

        border-radius: 16px;

        border: 1px solid #fde68a;

        box-shadow: 0 5px 15px rgba(0,0,0,0.04);

    }

    .feature-box li {

        color: #374151;

        line-height: 1.8;

    }

    /*
    |--------------------------------------------------------------------------
    | FOOTER
    |--------------------------------------------------------------------------
    */

    .about-footer {

        text-align: center;

        padding: 18px;

        background: #fef3c7;

    }

</style>

@endsection