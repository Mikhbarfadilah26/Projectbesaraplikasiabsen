@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-lg">

        <div class="card-body p-5">

            <h2 class="font-weight-bold text-success mb-4">
                {{ $jurusan->namajurusan }}
            </h2>

            <p class="text-muted">

                Jurusan {{ $jurusan->namajurusan }}
                merupakan salah satu jurusan unggulan
                di SMK Negeri 1 Karang Baru.

            </p>

            <a href="{{ route('landing.jurusan') }}"
                class="btn btn-dark mt-3">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection