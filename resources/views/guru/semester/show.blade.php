@extends('layouts.appguru')

@section('content')
<div class="container">

    <h4>Detail Semester</h4>

    <div class="card p-3">
        <p><strong>Nama:</strong> {{ ucfirst($semester->nama) }}</p>
    </div>

    <a href="{{ route('semester.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
@endsection