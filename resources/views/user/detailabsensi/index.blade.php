@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">

<div class="card">
<div class="card-header bg-primary text-white">
    Detail Absensi
</div>

<div class="card-body">

<a href="{{ route('detailabsensi.create') }}" class="btn btn-success mb-3">
    + Tambah
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $no => $d)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $d->absensi->siswa->nama ?? '-' }}</td>
            <td>{{ $d->absensi->tanggal ?? '-' }}</td>
            <td>{{ $d->keterangan }}</td>
            <td>
                <a href="{{ route('detailabsensi.edit',$d->id) }}"
                   class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>

</div>
@endsection