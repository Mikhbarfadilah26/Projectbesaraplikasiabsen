@extends('layouts.appadmin')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="font-weight-bold">Data Kelas</h1>
                <small class="text-muted">Manajemen data kelas sekolah</small>
            </div>

            <a href="{{ route('kelas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i> Tambah Kelas
            </a>

        </div>

    </div>
</section>

<section class="content">
<div class="container-fluid">

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    {{-- LOOP PER TINGKAT --}}
    @foreach($kelas as $tingkat => $items)

        <div class="card card-primary card-outline shadow-sm mb-4">

            <div class="card-header border-0">
                <h3 class="card-title font-weight-bold">
                    Kelas {{ $tingkat }}
                </h3>
            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-striped text-nowrap">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($items as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold">{{ $item->namakelas }}</td>
                                <td>{{ $item->tingkat }}</td>
                                <td>{{ $item->jurusan->namajurusan ?? '-' }}</td>

                                <td>

                                    <a href="{{ route('kelas.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('kelas.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus kelas ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Tidak ada data kelas
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    @endforeach

</div>
</section>

@endsection