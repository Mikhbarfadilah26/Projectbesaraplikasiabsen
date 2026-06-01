@extends('layouts.applanding')

@section('content')

<style>
    .detail-wrapper{
        padding: 80px 0;
        background:
            radial-gradient(circle at top left, rgba(34,197,94,.06), transparent 30%),
            radial-gradient(circle at bottom right, rgba(99,102,241,.06), transparent 30%),
            #f8fafc;
        min-height: 100vh;
    }

    .detail-card{
        border: none;
        border-radius: 32px;
        overflow: hidden;
        background: white;
        box-shadow: 0 20px 50px rgba(15,23,42,.08);
    }

    .detail-image{
        width: 100%;
        height: 420px;
        object-fit: cover;
    }

    .detail-image-empty{
        height: 420px;
        background: linear-gradient(135deg,#0f172a,#1e293b);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-direction: column;
    }

    .badge-date{
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(34,197,94,.1);
        color: #16a34a;
        padding: 10px 18px;
        border-radius: 50px;
        font-size: .9rem;
        font-weight: 600;
    }

    .detail-title{
        font-size: 2.4rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
    }

    .detail-content{
        font-size: 1.05rem;
        line-height: 2;
        color: #475569;
    }

    .btn-back{
        background: linear-gradient(135deg,#111827,#1e293b);
        color: white;
        border: none;
        padding: 14px 30px;
        border-radius: 14px;
        font-weight: 600;
        transition: .3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-back:hover{
        transform: translateY(-3px);
        color: white;
        text-decoration: none;
        box-shadow: 0 15px 30px rgba(15,23,42,.2);
    }

    .admin-box{
        background: #f8fafc;
        border-radius: 18px;
        padding: 18px 22px;
        margin-top: 30px;
    }

    @media(max-width:768px){

        .detail-title{
            font-size: 1.8rem;
        }

        .detail-image,
        .detail-image-empty{
            height: 250px;
        }

    }
</style>

<div class="detail-wrapper">

    <div class="container">

        <div class="detail-card">

            {{-- FOTO --}}
            @if($pengumuman->foto)

                <img src="{{ asset('storage/' . $pengumuman->foto) }}"
                    class="detail-image">

            @else

                <div class="detail-image-empty">

                    <i class="fas fa-bullhorn fa-4x mb-3"></i>

                    <h4 class="font-weight-bold">
                        Pengumuman Sekolah
                    </h4>

                </div>

            @endif

            {{-- CONTENT --}}
            <div class="p-lg-5 p-4">

                {{-- TANGGAL --}}
                <div class="mb-4">

                    <span class="badge-date">

                        <i class="fas fa-calendar-alt"></i>

                        {{ $pengumuman->created_at->format('d F Y') }}

                    </span>

                </div>

                {{-- JUDUL --}}
                <h1 class="detail-title mb-4">

                    {{ $pengumuman->judul }}

                </h1>

                {{-- ISI --}}
                <div class="detail-content">

                    {!! nl2br(e($pengumuman->isi)) !!}

                </div>

                {{-- ADMIN --}}
                <div class="admin-box d-flex justify-content-between align-items-center flex-wrap">

                    <div class="mb-2 mb-md-0">

                        <div class="text-muted small mb-1">
                            Dipublikasikan oleh
                        </div>

                        <h6 class="mb-0 font-weight-bold text-dark">

                            <i class="fas fa-user-circle mr-1 text-success"></i>

                            {{ $pengumuman->user->nama ?? 'Admin Sekolah' }}

                        </h6>

                    </div>

                    <a href="{{ route('landing.pengumuman') }}"
                        class="btn-back">

                        <i class="fas fa-arrow-left"></i>

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection