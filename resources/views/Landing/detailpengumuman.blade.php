@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-lg">

        <div class="card-body p-5">

            <small class="text-muted">
                {{ $pengumuman->created_at->format('d F Y') }}
            </small>

            <h2 class="font-weight-bold mt-2 mb-4">

                {{ $pengumuman->judul }}

            </h2>

            <p class="text-muted" style="line-height: 1.9;">

                {{ $pengumuman->isi }}

            </p>

            <a href="{{ route('landing.pengumuman') }}"
                class="btn btn-dark mt-4">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection