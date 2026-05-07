@extends('layouts.appadmin')

@section('content')
<form action="{{ route('kelas.update',$kelas->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="namakelas" value="{{ $kelas->namakelas }}" class="form-control mb-2" required>
<input type="text" name="tingkat" value="{{ $kelas->tingkat }}" class="form-control mb-2" required>

{{-- 🔥 TAMBAH INI --}}
<select name="jurusanid" class="form-control mb-2" required>
    @foreach($jurusan as $j)
        <option value="{{ $j->id }}" {{ $kelas->jurusanid == $j->id ? 'selected' : '' }}>
            {{ $j->namajurusan }}
        </option>
    @endforeach
</select>

<button class="btn btn-primary">Update</button>
</form>
@endsection