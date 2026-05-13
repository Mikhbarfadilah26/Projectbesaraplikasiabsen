@extends('layouts.appadmin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Jurusan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('jurusan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Jurusan</label>

                <input type="text"
                       name="namajurusan"
                       class="form-control"
                       required>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>
</div>

@endsection