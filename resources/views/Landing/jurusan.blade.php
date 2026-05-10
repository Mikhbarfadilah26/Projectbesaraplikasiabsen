@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="font-weight-bold">
            Daftar Jurusan
        </h2>

        <p class="text-muted">
            Informasi jurusan di SMK Negeri 1 Karang Baru
        </p>

    </div>

    <div class="row">

        @foreach($jurusan as $item)

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-5">

                    <i class="fas fa-school fa-3x text-success mb-3"></i>

                    <h4 class="font-weight-bold">
                        {{ $item->namajurusan }}
                    </h4>

                    <a href="{{ route('landing.jurusan.detail',$item->id) }}"
                        class="btn btn-success mt-3">

                        Lihat Selengkapnya

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection