@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">

<div class="card shadow">

    <div class="card-header bg-success text-white">
        Form Absensi Harian
    </div>

    <div class="card-body">

        {{-- FILTER --}}
        <form method="GET" action="{{ route('absensi.create') }}">
            <div class="row">

                <div class="col-md-4">
                    <label>Jurusan</label>
                    <select name="jurusanid" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua Jurusan</option>
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id }}"
                                {{ request('jurusanid') == $j->id ? 'selected' : '' }}>
                                {{ $j->namajurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Kelas</label>
                    <select name="kelasid" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}"
                                {{ request('kelasid') == $k->id ? 'selected' : '' }}>
                                {{ $k->namakelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ request('tanggal', date('Y-m-d')) }}">
                </div>

            </div>

            <button class="btn btn-primary mt-2">
                Filter
            </button>
        </form>

        <hr>

        {{-- FORM ABSENSI --}}
        <form action="{{ route('absensi.store.bulk') }}" method="POST">
            @csrf

            <input type="hidden" name="kelasid" value="{{ request('kelasid') }}">
            <input type="hidden" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">

            <table class="table table-bordered table-hover">

                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Status Absensi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($siswa as $i => $s)
                    @php
                        $status = 'hadir'; // default
                    @endphp

                    <tr
                        @if($status == 'alpha')
                            style="background:#f8d7da"
                        @endif
                    >

                        <td class="text-center">{{ $i+1 }}</td>

                        <td>
                            {{ $s->nama }}
                            <input type="hidden" name="siswaid[]" value="{{ $s->id }}">
                        </td>

                        <td class="text-center">

                            <label class="btn btn-success btn-sm">
                                <input type="radio" name="status[{{ $i }}]" value="hadir" checked>
                                Hadir
                            </label>

                            <label class="btn btn-warning btn-sm text-white">
                                <input type="radio" name="status[{{ $i }}]" value="izin">
                                Izin
                            </label>

                            <label class="btn btn-info btn-sm text-white">
                                <input type="radio" name="status[{{ $i }}]" value="sakit">
                                Sakit
                            </label>

                            <label class="btn btn-danger btn-sm">
                                <input type="radio" name="status[{{ $i }}]" value="alpha">
                                Alpha
                            </label>

                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>

            <button class="btn btn-success w-100">
                Simpan Absensi
            </button>

        </form>

    </div>
</div>

</div>
@endsection