@extends('layouts.appadmin')

@section('content')
<h4>Detail Siswa</h4>

<p>NIS : {{ $siswa->nis }}</p>
<p>Nama : {{ $siswa->nama }}</p>
<p>Kelas : {{ $siswa->kelas->namakelas }}</p>

<a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
@endsection