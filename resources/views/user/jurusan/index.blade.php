@extends('layouts.appadmin')

@section('content')
<div class="container">

    <h4 class="mb-3">Data Jurusan</h4>

    <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Jurusan
    </a>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Jurusan</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->namajurusan }}</td>
                <td>

                    <a href="{{ route('jurusan.show',$d->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('jurusan.edit',$d->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('jurusan.destroy',$d->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Data belum ada</td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>
@endsection