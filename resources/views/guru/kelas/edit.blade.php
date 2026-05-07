@extends('layouts.appguru')

@section('content')
<div class="container">

<h4>Edit Kelas</h4>

<form action="{{ route('kelas.update',$kelas->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="namakelas" value="{{ $kelas->namakelas }}" class="form-control mb-2" required>

<input type="text" name="tingkat" value="{{ $kelas->tingkat }}" class="form-control mb-2" required>

{{-- 🔥 RELASI JURUSAN --}}
<select name="jurusanid" class="form-control mb-2" required>
    @foreach($jurusan as $j)
        <option value="{{ $j->id }}" {{ $kelas->jurusanid == $j->id ? 'selected' : '' }}>
            {{ $j->namajurusan }}
        </option>
    @endforeach
</select>

<button class="btn btn-primary">Update</button>

</form>

</div>
@endsection