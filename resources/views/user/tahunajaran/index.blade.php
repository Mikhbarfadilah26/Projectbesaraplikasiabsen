@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Data Tahun Ajaran</h5>
            <a href="{{ route('tahunajaran.create') }}" class="btn btn-primary btn-sm">
                + Tambah
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $no => $item)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>
                            <a href="{{ route('tahunajaran.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('tahunajaran.destroy', $item->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">
                                    Hapus
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection