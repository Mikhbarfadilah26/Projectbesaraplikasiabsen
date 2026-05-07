@extends('layouts.appadmin')

@section('content')
<div class="container">

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nis }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->jeniskelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $d->kelas->namakelas ?? '-' }}</td>
            <td>
                <a href="{{ route('siswa.show',$d->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('siswa.edit',$d->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('siswa.destroy',$d->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection