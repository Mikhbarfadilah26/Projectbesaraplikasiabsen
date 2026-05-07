@extends('layouts.applanding')

@section('content')

<style>
    .card-pengumuman {
        border-radius: 16px;
        transition: all 0.3s ease;
        color: #fff;
        overflow: hidden;
    }

    .card-pengumuman:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .bg-1 { background: linear-gradient(135deg, #42a5f5, #478ed1); }
    .bg-2 { background: linear-gradient(135deg, #66bb6a, #43a047); }
    .bg-3 { background: linear-gradient(135deg, #ffa726, #fb8c00); }

    .tanggal {
        font-size: 13px;
        opacity: 0.85;
    }
</style>

<div class="container py-5">

    {{-- HEADER --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Pengumuman</h2>
        <p class="text-muted">Informasi terbaru dari sekolah</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- CARD 1 --}}
            <div class="card card-pengumuman bg-1 mb-4 shadow">
                <div class="card-body">
                    <h5 class="fw-bold">📘 Jadwal Ujian Semester</h5>
                    <div class="tanggal">25 April 2026</div>
                    <p class="mt-2 mb-0">
                        Ujian semester akan dilaksanakan mulai tanggal 1 Mei 2026. 
                        Seluruh siswa diharapkan mempersiapkan diri dengan baik.
                    </p>
                </div>
            </div>

            {{-- CARD 2 --}}
            <div class="card card-pengumuman bg-2 mb-4 shadow">
                <div class="card-body">
                    <h5 class="fw-bold">🎓 Libur Hari Pendidikan</h5>
                    <div class="tanggal">24 April 2026</div>
                    <p class="mt-2 mb-0">
                        Kegiatan belajar mengajar diliburkan pada tanggal 2 Mei 2026 
                        dalam rangka Hari Pendidikan Nasional.
                    </p>
                </div>
            </div>

            {{-- CARD 3 --}}
            <div class="card card-pengumuman bg-3 mb-4 shadow">
                <div class="card-body">
                    <h5 class="fw-bold">📱 Absensi Wajib Online</h5>
                    <div class="tanggal">23 April 2026</div>
                    <p class="mt-2 mb-0">
                        Mulai minggu ini, seluruh siswa wajib melakukan absensi melalui sistem online.
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection