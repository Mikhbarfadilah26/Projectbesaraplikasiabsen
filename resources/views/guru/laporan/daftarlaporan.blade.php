@extends('layouts.appguru')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="font-weight-bold">Laporan Absensi</h4>
            <small class="text-muted">Rekap kehadiran siswa</small>
        </div>

        <div>
            <a href="{{ route('laporan.absensi') }}?export=excel" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Excel
            </a>

            <a href="{{ route('laporan.absensi') }}?export=pdf" target="_blank" class="btn btn-danger btn-sm">
                <i class="fas fa-file-pdf"></i> PDF
            </a>

            <button onclick="window.print()" class="btn btn-secondary btn-sm">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
    </div>

    {{-- FILTER --}}
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="GET">
                <div class="row">

                    <div class="col-md-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Kelas</label>
                        <select name="kelasid" class="form-control">
                            <option value="">-- Semua Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ request('kelasid') == $k->id ? 'selected' : '' }}>
                                    {{ $k->namakelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mt-4">
                        <button class="btn btn-primary btn-block">
                            <i class="fas fa-search"></i> Filter
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- REKAP --}}
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>{{ $rekap['hadir'] }}</h4>
                    <p>Hadir</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4>{{ $rekap['izin'] }}</h4>
                    <p>Izin</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>{{ $rekap['sakit'] }}</h4>
                    <p>Sakit</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4>{{ $rekap['alpha'] }}</h4>
                    <p>Alpha</p>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL --}}
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->siswa->nama }}</td>
                        <td>{{ $d->siswa->kelas->namakelas ?? '-' }}</td>
                        <td>{{ $d->siswa->kelas->jurusan->namajurusan ?? '-' }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>
                            @if($d->status_masuk == 'hadir')
                                <span class="badge badge-success">Hadir</span>
                            @elseif($d->status_masuk == 'izin')
                                <span class="badge badge-warning">Izin</span>
                            @elseif($d->status_masuk == 'sakit')
                                <span class="badge badge-info">Sakit</span>
                            @else
                                <span class="badge badge-danger">Alpha</span>
                            @endif
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