@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    {{-- JUDUL HALAMAN --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Jadwal Umum</h2>
        <p class="text-muted">Informasi waktu operasional dan kegiatan rutin sekolah</p>
        <div class="mx-auto" style="width: 60px; height: 4px; background: #007bff; border-radius: 2px;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">

            {{-- SENIN --}}
            <div class="card mb-4 shadow-sm border-0 position-relative overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-4" style="width: 60px; height: 60px; min-width: 60px;">
                            <i class="fas fa-flag fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">Senin - Upacara & Pembelajaran</h5>
                            <span class="badge badge-pill badge-light text-primary border border-primary px-3 py-2">
                                <i class="far fa-clock mr-1"></i> 07:00 - 15:00 WIB
                            </span>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; right: -10px; top: -10px; opacity: 0.05;">
                    <i class="fas fa-sun fa-5x"></i>
                </div>
            </div>

            {{-- SELASA - JUMAT --}}
            <div class="card mb-4 shadow-sm border-0 position-relative overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-success text-white rounded-circle d-flex align-items-center justify-content-center mr-4" style="width: 60px; height: 60px; min-width: 60px;">
                            <i class="fas fa-book-open fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">Selasa - Jumat - KBM Normal</h5>
                            <span class="badge badge-pill badge-light text-success border border-success px-3 py-2">
                                <i class="far fa-clock mr-1"></i> 07:30 - 15:00 WIB
                            </span>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; right: -10px; top: -10px; opacity: 0.05;">
                    <i class="fas fa-graduation-cap fa-5x"></i>
                </div>
            </div>

            {{-- SABTU --}}
            <div class="card mb-4 shadow-sm border-0 position-relative overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center mr-4" style="width: 60px; height: 60px; min-width: 60px;">
                            <i class="fas fa-skating fa-lg"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">Sabtu - Kegiatan Ekstrakurikuler</h5>
                            <span class="badge badge-pill badge-light text-warning border border-warning px-3 py-2">
                                <i class="far fa-clock mr-1"></i> 08:00 - 12:00 WIB
                            </span>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; right: -10px; top: -10px; opacity: 0.05;">
                    <i class="fas fa-basketball-ball fa-5x"></i>
                </div>
            </div>

            <p class="text-center text-muted mt-4">
                <small>* Jadwal dapat berubah sewaktu-waktu sesuai kebijakan sekolah.</small>
            </p>

        </div>
    </div>

</div>

{{-- Tambahkan FontAwesome jika belum ada di layouts.applanding --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .card {
        transition: transform 0.3s ease, shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .icon-box {
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
</style>

@endsection