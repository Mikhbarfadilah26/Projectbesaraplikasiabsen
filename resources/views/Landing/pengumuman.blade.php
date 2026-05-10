@extends('layouts.applanding')

@section('content')

<style>
    .card-pengumuman {
        border-radius: 16px;
        transition: all 0.3s ease;
        color: #fff;
        overflow: hidden;
        border: none;
    }

    .card-pengumuman:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .bg-1 {
        background: linear-gradient(135deg, #42a5f5, #478ed1);
    }

    .bg-2 {
        background: linear-gradient(135deg, #66bb6a, #43a047);
    }

    .bg-3 {
        background: linear-gradient(135deg, #ffa726, #fb8c00);
    }

    .tanggal {
        font-size: 13px;
        opacity: 0.85;
    }

    .btn-detail {
        border-radius: 12px;
        font-weight: 600;
    }
</style>

<div class="container py-5">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <h2 class="fw-bold text-primary">

            Pengumuman

        </h2>

        <p class="text-muted">

            Informasi terbaru dari sekolah

        </p>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">

            @php
                $bgClass = ['bg-1', 'bg-2', 'bg-3'];
            @endphp

            @forelse($pengumuman as $index => $item)

            <div class="card card-pengumuman {{ $bgClass[$index % 3] }} mb-4 shadow">

                <div class="card-body">

                    <h5 class="fw-bold">

                        📢 {{ $item->judul }}

                    </h5>

                    <div class="tanggal">

                        <i class="fas fa-calendar-alt mr-1"></i>

                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}

                    </div>

                    <p class="mt-3 mb-3">

                        {{ \Illuminate\Support\Str::limit($item->isi, 150) }}

                    </p>

                    <a href="{{ route('landing.pengumuman.detail', $item->id) }}"
                        class="btn btn-light btn-sm btn-detail">

                        <i class="fas fa-arrow-right mr-1"></i>

                        Lihat Selengkapnya

                    </a>

                </div>

            </div>

            @empty

            <div class="alert alert-warning shadow-sm rounded-4">

                Belum ada pengumuman tersedia.

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection