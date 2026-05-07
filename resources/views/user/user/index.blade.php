@extends('layouts.appadmin')

@section('content')
<div class="container">

<h4>Data User</h4>

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
    Tambah User
</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama</th>
<th>Username</th>
<th>Role</th>
<th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $d->nama }}</td>
<td>{{ $d->username }}</td>
<td>{{ $d->role }}</td>
<td>
    <a href="{{ route('user.edit',$d->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('user.destroy',$d->id) }}" method="POST" style="display:inline">
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