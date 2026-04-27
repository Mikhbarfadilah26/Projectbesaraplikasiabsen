@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Tentang Kami</h2>
        <p class="text-muted">Sistem Absensi Siswa Berbasis Digital</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4">

                    <p>
                        Sistem absensi ini dibuat untuk memudahkan proses pencatatan kehadiran siswa secara digital
                        sehingga lebih cepat, akurat, dan transparan.
                    </p>

                    <p>
                        Dengan sistem ini, guru dan pihak sekolah dapat memantau kehadiran siswa secara real-time
                        tanpa harus menggunakan buku absensi manual.
                    </p>

                    <p>
                        Fitur utama meliputi absensi siswa, rekap kehadiran, dan laporan otomatis yang dapat diakses
                        kapan saja.
                    </p>

                    <hr>

                    <p class="mb-0 text-muted">
                        © {{ date('Y') }} Sistem Absensi SMK. All rights reserved.
                    </p>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection