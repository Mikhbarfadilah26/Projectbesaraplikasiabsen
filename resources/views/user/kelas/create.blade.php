@extends('layouts.appadmin')

@section('content')
<div class="container">

<h4>Tambah Kelas</h4>

<form action="{{ route('kelas.store') }}" method="POST">
@csrf

<input type="text" name="namakelas" placeholder="Nama Kelas" class="form-control mb-2" required>

<input type="text" name="tingkat" placeholder="Tingkat (10/11/12)" class="form-control mb-2" required>

{{-- 🔥 AMBIL DARI JURUSAN --}}
<select name="jurusanid" class="form-control mb-2" required>
    <option value="">-- Pilih Jurusan --</option>
    @foreach($jurusan as $j)
        <option value="{{ $j->id }}">{{ $j->namajurusan }}</option>
    @endforeach
</select>

<button class="btn btn-success">Simpan</button>

</form>

</div>
@endsection