@extends('layouts.appguru')

@section('content')
<div class="container">

    <h4 class="mb-3">Detail Jurusan</h4>

    <div class="card">
        <div class="card-body">

            {{-- DATA JURUSAN --}}
            <table class="table table-bordered">
                <tr>
                    <th width="200">Nama Jurusan</th>
                    <td>{{ $jurusan->namajurusan }}</td>
                </tr>
            </table>

            {{-- RELASI KE KELAS --}}
            <h5 class="mt-4">Daftar Kelas</h5>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Tingkat</th>
                </tr>

                @forelse($jurusan->kelas as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->namakelas }}</td>
                    <td>{{ $k->tingkat }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada kelas</td>
                </tr>
                @endforelse

            </table>

            <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection