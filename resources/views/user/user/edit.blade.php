@extends('layouts.appadmin')

@section('content')
<div class="container">

<h4>Edit User</h4>

<form action="{{ route('user.update',$data->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama" value="{{ $data->nama }}" class="form-control mb-2">
<input type="text" name="username" value="{{ $data->username }}" class="form-control mb-2">
<input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="form-control mb-2">

<select name="role" class="form-control mb-2">
    <option value="admin" {{ $data->role=='admin'?'selected':'' }}>Admin</option>
    <option value="guru" {{ $data->role=='guru'?'selected':'' }}>Guru</option>
</select>

<button class="btn btn-primary">Update</button>
</form>

</div>
@endsection