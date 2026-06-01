@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h3>Tambah Pengumuman</h3>

    <form action="{{ route('pengumuman.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Judul</label>

            <input type="text"
                name="judul"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Foto</label>

            <input type="file"
                name="foto"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Isi</label>

            <textarea name="isi"
                rows="6"
                class="form-control"></textarea>

        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

@endsection