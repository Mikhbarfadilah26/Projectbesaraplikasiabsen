@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Informasi</h2>
        <p class="text-muted">Informasi penting dari sekolah</p>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Sistem Absensi Online</h5>
                    <small class="text-muted">26 April 2026</small>
                    <p class="mt-2 mb-0">
                        Sistem absensi berbasis online digunakan untuk mempermudah proses kehadiran siswa secara real-time.
                    </p>
                </div>
            </div>

            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Update Aplikasi</h5>
                    <small class="text-muted">25 April 2026</small>
                    <p class="mt-2 mb-0">
                        Sistem telah diperbarui untuk meningkatkan performa dan stabilitas aplikasi.
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection