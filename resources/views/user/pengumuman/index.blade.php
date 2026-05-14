@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Pengumuman</h3>

        <a href="{{ route('pengumuman.create') }}"
            class="btn btn-primary">
            Tambah Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th width="250">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($pengumuman as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->judul }}</td>

                <td>

                    <a href="{{ route('pengumuman.show', $item->id) }}"
                        class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('pengumuman.edit', $item->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('pengumuman.destroy', $item->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="3" class="text-center">
                    Data kosong
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection