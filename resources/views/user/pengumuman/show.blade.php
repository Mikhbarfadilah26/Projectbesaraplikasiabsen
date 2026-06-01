@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h3>{{ $pengumuman->judul }}</h3>

    <hr>

    @if($pengumuman->foto)

    <div class="mb-3">

        <img src="{{ asset('storage/' . $pengumuman->foto) }}"
            width="300"
            class="img-fluid rounded">

    </div>

    @endif

    <p>
        {!! nl2br(e($pengumuman->isi)) !!}
    </p>

    <a href="{{ route('pengumuman.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>

@endsection