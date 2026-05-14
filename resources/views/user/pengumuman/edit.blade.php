@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h3>Edit Pengumuman</h3>

    <form action="{{ route('pengumuman.update', $pengumuman->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>

            <input type="text"
                name="judul"
                value="{{ $pengumuman->judul }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Isi</label>

            <textarea name="isi"
                rows="6"
                class="form-control">{{ $pengumuman->isi }}</textarea>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection