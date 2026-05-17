@extends('layouts.appsiswa')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-3">

            <div class="col-sm-6">

                <h1 class="font-weight-bold text-primary">

                    Laporan Absensi Siswa

                </h1>

                <small class="text-muted">

                    Riwayat kehadiran siswa

                </small>

            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        {{-- FILTER --}}
        <form
            method="GET"
            action="{{ route('siswa.laporan') }}"
        >

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body">

                    <div class="row">

                        {{-- FILTER TANGGAL --}}
                        <div class="col-md-4 mb-3">

                            <label class="font-weight-bold">

                                Filter Tanggal

                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                value="{{ request('tanggal') }}"
                                class="form-control"
                            >

                        </div>

                        {{-- FILTER STATUS --}}
                        <div class="col-md-4 mb-3">

                            <label class="font-weight-bold">

                                Filter Status

                            </label>

                            <select
                                name="status"
                                class="form-control"
                            >

                                <option value="">
                                    Semua Status
                                </option>

                                <option
                                    value="hadir"
                                    {{ request('status') == 'hadir' ? 'selected' : '' }}
                                >
                                    Hadir
                                </option>

                                <option
                                    value="izin"
                                    {{ request('status') == 'izin' ? 'selected' : '' }}
                                >
                                    Izin
                                </option>

                                <option
                                    value="sakit"
                                    {{ request('status') == 'sakit' ? 'selected' : '' }}
                                >
                                    Sakit
                                </option>

                                <option
                                    value="alpha"
                                    {{ request('status') == 'alpha' ? 'selected' : '' }}
                                >
                                    Alpha
                                </option>

                                <option
                                    value="cabut"
                                    {{ request('status') == 'cabut' ? 'selected' : '' }}
                                >
                                    Cabut
                                </option>

                            </select>

                        </div>

                        {{-- BUTTON --}}
                        <div class="col-md-4 d-flex align-items-end mb-3">

                            <button
                                type="submit"
                                class="btn btn-primary mr-2"
                            >

                                <i class="fas fa-search"></i>

                                Filter

                            </button>

                            <a
                                href="{{ route('cetak.laporan', request()->query()) }}"
                                target="_blank"
                                class="btn btn-success"
                            >

                                <i class="fas fa-print"></i>

                                Cetak Laporan

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </form>

        {{-- RINGKASAN --}}
        <div class="row mb-4">

            <div class="col-md-3">

                <div class="card bg-success text-white shadow border-0">

                    <div class="card-body text-center">

                        <h3>

                            {{ isset($laporan) ? $laporan->where('status', 'hadir')->count() : 0 }}

                        </h3>

                        <div>
                            HADIR
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card bg-warning text-white shadow border-0">

                    <div class="card-body text-center">

                        <h3>

                            {{ isset($laporan) ? $laporan->where('status', 'izin')->count() : 0 }}

                        </h3>

                        <div>
                            IZIN
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card bg-info text-white shadow border-0">

                    <div class="card-body text-center">

                        <h3>

                            {{ isset($laporan) ? $laporan->where('status', 'sakit')->count() : 0 }}

                        </h3>

                        <div>
                            SAKIT
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card bg-danger text-white shadow border-0">

                    <div class="card-body text-center">

                        <h3>

                            {{ isset($laporan) ? $laporan->where('status', 'alpha')->count() : 0 }}

                        </h3>

                        <div>
                            ALPHA
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="card shadow-lg border-0">

            <div class="card-header bg-primary text-white">

                <h3 class="card-title font-weight-bold mb-0">

                    Data Absensi & Hari Libur

                </h3>

            </div>

            <div class="card-body p-0 table-responsive">

                <table class="table table-hover table-striped mb-0">

                    <thead style="background:#f4f6f9;">

                        <tr class="text-center">

                            <th width="5%">
                                No
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Keterangan / Guru
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($laporan ?? [] as $item)

                        <tr>

                            <td class="text-center">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                            </td>

                            <td class="text-center">

                                @switch($item->status)

                                    @case('hadir')

                                        <span class="badge badge-success px-3 py-2">

                                            HADIR

                                        </span>

                                    @break

                                    @case('izin')

                                        <span class="badge badge-warning px-3 py-2">

                                            IZIN

                                        </span>

                                    @break

                                    @case('sakit')

                                        <span class="badge badge-info px-3 py-2">

                                            SAKIT

                                        </span>

                                    @break

                                    @case('cabut')

                                        <span class="badge badge-dark px-3 py-2">

                                            CABUT

                                        </span>

                                    @break

                                    @default

                                        <span class="badge badge-danger px-3 py-2">

                                            ALPHA

                                        </span>

                                @endswitch

                            </td>

                            <td class="text-center">

                                {{ $item->guru->name ?? 'Guru tidak ditemukan' }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center p-4 text-muted"
                            >

                                Tidak ada data absensi

                            </td>

                        </tr>

                        @endforelse

                        {{-- DATA LIBUR --}}
                        @if(isset($libur) && $libur)

                        <tr style="background:#fff8e1;">

                            <td class="text-center">

                                -

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($libur->tanggal)->translatedFormat('d F Y') }}

                            </td>

                            <td class="text-center">

                                <span class="badge badge-danger px-3 py-2">

                                    LIBUR

                                </span>

                            </td>

                            <td class="text-center">

                                {{ $libur->keterangan }}

                            </td>

                        </tr>

                        @endif

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection