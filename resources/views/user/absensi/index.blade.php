@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="font-weight-bold">Data Absensi</h4>
        <a href="{{ route('absensi.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $no => $d)
                    <tr>
                        <td class="text-center">{{ $no+1 }}</td>

                        <td>
                            {{ $d->siswa->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kelas->namakelas ?? '-' }}
                        </td>

                        <td>
                            {{ $d->tanggal }}
                        </td>

                        <td class="text-center">
                            @php
                                $badge = match($d->status) {
                                    'hadir' => 'success',
                                    'izin'  => 'warning',
                                    'sakit' => 'info',
                                    'alpha' => 'danger',
                                    'cabut' => 'dark',
                                    default => 'secondary'
                                };
                            @endphp

                            <span class="badge bg-{{ $badge }}">
                                {{ strtoupper($d->status) }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('absensi.edit',$d->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('absensi.destroy',$d->id) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Tidak ada data absensi
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection