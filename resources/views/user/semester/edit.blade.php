@extends('layouts.appadmin')

@section('content')
<div class="container">

    <h4>Edit Semester</h4>

    <form action="{{ route('semester.update',$semester->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Semester</label>
            <select name="nama" class="form-control">
                <option value="ganjil" {{ $semester->nama == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                <option value="genap" {{ $semester->nama == 'genap' ? 'selected' : '' }}>Genap</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('semester.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection