@extends('layouts.appadmin')

@section('content')

<div class="container">

    <a href="{{ route('jadwalabsensi.create') }}"
       class="btn btn-primary mb-3">

        Tambah Jadwal

    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Jam Masuk</th>
            <th>Batas Telat</th>
            <th>Jam Pulang</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $d)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $d->hari }}</td>

            <td>{{ $d->jam_masuk }}</td>

            <td>{{ $d->batas_telat }}</td>

            <td>{{ $d->jam_pulang }}</td>

            <td>

                <a href="{{ route('jadwalabsensi.edit',$d->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('jadwalabsensi.destroy',$d->id) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</div>

@endsection