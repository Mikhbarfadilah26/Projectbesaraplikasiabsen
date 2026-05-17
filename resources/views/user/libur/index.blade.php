@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4 class="font-weight-bold">
            Data Hari Libur
        </h4>

        <a href="{{ route('libur.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Tambah Libur

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="bg-dark text-white text-center">

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $no => $d)

                        <tr>

                            <td class="text-center">
                                {{ $no + 1 }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($d->tanggal)->format('d-m-Y') }}
                            </td>

                            <td>
                                {{ $d->keterangan }}
                            </td>

                            <td class="text-center">

                                @if($d->jenis == 'nasional')

                                    <span class="badge bg-danger px-3 py-2">
                                        LIBUR NASIONAL
                                    </span>

                                @else

                                    <span class="badge bg-primary px-3 py-2">
                                        LIBUR SEKOLAH
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                @if($d->aktif)

                                    <span class="badge bg-success px-3 py-2">
                                        AKTIF
                                    </span>

                                @else

                                    <span class="badge bg-secondary px-3 py-2">
                                        NONAKTIF
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('libur.edit', $d->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('libur.destroy', $d->id) }}"
                                      method="POST"
                                      style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted">

                                Data hari libur kosong

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection