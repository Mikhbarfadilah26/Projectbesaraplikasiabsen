@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h3>{{ $pengumuman->judul }}</h3>

    <hr>

    <p>
        {!! nl2br(e($pengumuman->isi)) !!}
    </p>

    <a href="{{ route('pengumuman.index') }}"
        class="btn btn-secondary">
        Kembali
    </a>

</div>

@endsection