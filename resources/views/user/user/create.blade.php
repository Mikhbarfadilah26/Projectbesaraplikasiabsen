@extends('layouts.appadmin')

@section('content')
<div class="container">

<h4>Tambah User</h4>

<form action="{{ route('user.store') }}" method="POST">
@csrf

<input type="text" name="nama" placeholder="Nama" class="form-control mb-2">
<input type="text" name="username" placeholder="Username" class="form-control mb-2">
<input type="password" name="password" placeholder="Password" class="form-control mb-2">

<select name="role" class="form-control mb-2">
    <option value="admin">Admin</option>
    <option value="guru">Guru</option>
</select>

<button class="btn btn-success">Simpan</button>
</form>

</div>
@endsection