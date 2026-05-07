@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    {{-- HEADER HALAMAN --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Informasi & Pengumuman</h2>
        <p class="text-muted">Dapatkan berita dan pembaruan terbaru dari SMK Negeri 1 Karang Baru</p>
        <div class="mx-auto" style="width: 50px; height: 3px; background-color: #007bff; border-radius: 10px;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">

            {{-- INFORMASI 1 --}}
            <div class="card mb-4 shadow-sm border-0 info-card" style="border-radius: 15px; border-left: 5px solid #007bff !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge badge-primary px-3 py-2" style="border-radius: 8px;">Pengumuman</span>
                        <small class="text-muted"><i class="far fa-calendar-alt mr-1"></i> 26 April 2026</small>
                    </div>
                    <h5 class="fw-bold text-dark mt-3">Sistem Absensi Online Resmi Diluncurkan</h5>
                    <p class="text-secondary mt-2 mb-0 leading-relaxed">
                        Sistem absensi berbasis online kini resmi digunakan untuk mempermudah proses pencatatan kehadiran siswa secara real-time. Pastikan seluruh siswa melakukan absensi tepat waktu sesuai jadwal.
                    </p>
                    <hr class="my-3 opacity-5">
                    <a href="#" class="text-primary fw-bold text-decoration-none small">Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

            {{-- INFORMASI 2 --}}
            <div class="card mb-4 shadow-sm border-0 info-card" style="border-radius: 15px; border-left: 5px solid #28a745 !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge badge-success px-3 py-2" style="border-radius: 8px;">Update</span>
                        <small class="text-muted"><i class="far fa-calendar-alt mr-1"></i> 25 April 2026</small>
                    </div>
                    <h5 class="fw-bold text-dark mt-3">Pembaruan Sistem v2.0</h5>
                    <p class="text-secondary mt-2 mb-0 leading-relaxed">
                        Kami telah melakukan pembaruan pada infrastruktur server untuk meningkatkan kecepatan akses dan stabilitas aplikasi saat jam sibuk.
                    </p>
                    <hr class="my-3 opacity-5">
                    <a href="#" class="text-success fw-bold text-decoration-none small">Lihat Changelog <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Tambahkan Style Khusus --}}
<style>
    .info-card {
        transition: all 0.3s ease;
        background-color: #ffffff;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1) !important;
    }

    .badge-primary { background-color: #e7f1ff; color: #007bff; }
    .badge-success { background-color: #e6f7ed; color: #28a745; }

    .fw-bold { font-weight: 700 !important; }
    .leading-relaxed { line-height: 1.6; }
</style>

{{-- Link FontAwesome untuk Ikon --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection