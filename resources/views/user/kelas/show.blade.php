@extends('layouts.appadmin')

@section('content')
<h4>Detail Kelas</h4>

<p>Tingkat : {{ $kelas->tingkat }}</p>

<a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
@endsection