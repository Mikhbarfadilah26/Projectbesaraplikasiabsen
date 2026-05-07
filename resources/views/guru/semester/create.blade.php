@extends('layouts.appguru')

@section('content')
<div class="container">

    <h4>Tambah Semester</h4>

    <form action="{{ route('semester.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Semester</label>
            <select name="nama" class="form-control">
                <option value="">-- pilih --</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('semester.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection