@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="font-weight-bold">Data Absensi</h4>
        <a href="{{ route('absensi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $no => $d)
                    <tr>
                        <td class="text-center">{{ $no+1 }}</td>
                        <td>{{ $d->siswa->nama ?? '-' }}</td>
                        <td>{{ $d->tanggal }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ $d->status_masuk ?? '-' }}
                            </span><br>
                            <small>{{ $d->jam_masuk }}</small>
                        </td>

                        <td>
                            <span class="badge bg-info">
                                {{ $d->status_pulang ?? '-' }}
                            </span><br>
                            <small>{{ $d->jam_pulang }}</small>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('absensi.edit',$d->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('absensi.destroy',$d->id) }}"
                                  method="POST"
                                  style="display:inline">
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
                        <td colspan="6" class="text-center">Data kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection