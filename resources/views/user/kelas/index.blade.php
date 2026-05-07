@extends('layouts.appadmin')

@section('content')
<div class="container">

<a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Kelas</th>
    <th>Tingkat</th>
    <th>Jurusan</th> {{-- 🔥 --}}
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $d->namakelas }}</td>
<td>{{ $d->tingkat }}</td>

{{-- 🔥 RELASI --}}
<td>{{ $d->jurusan->namajurusan ?? '-' }}</td>

<td>
    <a href="{{ route('kelas.edit',$d->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('kelas.destroy',$d->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Hapus</button>
    </form>
</td>
</tr>
@endforeach

</table>

</div>
@endsection