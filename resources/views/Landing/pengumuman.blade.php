@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Pengumuman</h2>
        <p class="text-muted">Informasi terbaru dari sekolah</p>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- Contoh 1 pengumuman -->
            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Jadwal Ujian Semester</h5>
                    <small class="text-muted">25 April 2026</small>
                    <p class="mt-2 mb-0">
                        Ujian semester akan dilaksanakan mulai tanggal 1 Mei 2026. Seluruh siswa diharapkan mempersiapkan diri dengan baik.
                    </p>
                </div>
            </div>

            <!-- Contoh 2 pengumuman -->
            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Libur Hari Pendidikan</h5>
                    <small class="text-muted">24 April 2026</small>
                    <p class="mt-2 mb-0">
                        Kegiatan belajar mengajar diliburkan pada tanggal 2 Mei 2026 dalam rangka Hari Pendidikan Nasional.
                    </p>
                </div>
            </div>

            <!-- Contoh 3 pengumuman -->
            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Absensi Wajib Online</h5>
                    <small class="text-muted">23 April 2026</small>
                    <p class="mt-2 mb-0">
                        Mulai minggu ini, seluruh siswa wajib melakukan absensi melalui sistem online.
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection