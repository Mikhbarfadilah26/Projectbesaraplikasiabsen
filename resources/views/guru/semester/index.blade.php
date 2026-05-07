@extends('layouts.appguru')

@section('content')
<div class="container-fluid">

    <h4 class="mb-3">Data Semester</h4>

    <a href="{{ route('semester.create') }}" class="btn btn-primary mb-3">
        + Tambah
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Semester</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $d)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ ucfirst($d->nama) }}</td>
                <td>
                    <a href="{{ route('semester.edit',$d->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('semester.destroy',$d->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($data->isEmpty())
            <tr>
                <td colspan="3" class="text-center">Data kosong</td>
            </tr>
            @endif
        </tbody>
    </table>

</div>
@endsection