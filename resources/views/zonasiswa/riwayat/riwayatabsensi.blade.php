@extends('layouts.appsiswa')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">

        <div>
            <h4 class="font-weight-bold mb-1">
                Riwayat Kehadiranmu 📜
            </h4>

            <small class="text-muted">
                Data absensi masuk dan pulang siswa
            </small>
        </div>

        {{-- TOMBOL CETAK --}}
        <a href="{{ route('siswa.laporan.cetak') }}"
            target="_blank"
            class="btn btn-primary rounded-pill px-4 shadow-sm">

            <i class="fas fa-download mr-2"></i>
            Cetak Laporan
        </a>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-sm"
        style="border-radius: 18px; overflow: hidden;">

        {{-- HEADER TABLE --}}
        <div class="card-header bg-white border-0 py-3">

            <h6 class="mb-0 font-weight-bold text-dark">
                <i class="fas fa-calendar-check text-success mr-2"></i>
                Riwayat Absensi
            </h6>

        </div>

        {{-- TABLE --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead style="background: #f8fafc;">

                        <tr>

                            <th class="border-0 px-4 py-3">
                                Hari
                            </th>

                            <th class="border-0 py-3">
                                Tanggal
                            </th>

                            <th class="border-0 py-3">
                                Jam Masuk
                            </th>

                            <th class="border-0 py-3">
                                Status Masuk
                            </th>

                            <th class="border-0 py-3">
                                Jam Pulang
                            </th>

                            <th class="border-0 py-3">
                                Status Pulang
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($riwayat as $row)

                        <tr>

                            {{-- HARI --}}
                            <td class="px-4 align-middle">

                                <span class="font-weight-bold text-primary">

                                    {{ \Carbon\Carbon::parse($row->tanggal)->locale('id')->isoFormat('dddd') }}

                                </span>

                            </td>

                            {{-- TANGGAL --}}
                            <td class="align-middle font-weight-bold">

                                {{ \Carbon\Carbon::parse($row->tanggal)->locale('id')->isoFormat('D MMMM Y') }}

                            </td>

                            {{-- JAM MASUK --}}
                            <td class="align-middle">

                                {{ $row->jam_masuk ?? '--:--' }}

                            </td>

                            {{-- STATUS MASUK --}}
                            <td class="align-middle">

                                @if($row->status_masuk == 'hadir')

                                    <span class="badge badge-success px-3 py-2 rounded-pill">
                                        Hadir
                                    </span>

                                @elseif($row->status_masuk == 'telat')

                                    <span class="badge badge-danger px-3 py-2 rounded-pill">
                                        Telat
                                    </span>

                                @elseif($row->status_masuk == 'izin')

                                    <span class="badge badge-warning px-3 py-2 rounded-pill">
                                        Izin
                                    </span>

                                @elseif($row->status_masuk == 'sakit')

                                    <span class="badge badge-info px-3 py-2 rounded-pill">
                                        Sakit
                                    </span>

                                @else

                                    <span class="badge badge-secondary px-3 py-2 rounded-pill">
                                        Alpha
                                    </span>

                                @endif

                            </td>

                            {{-- JAM PULANG --}}
                            <td class="align-middle">

                                {{ $row->jam_pulang ?? '--:--' }}

                            </td>

                            {{-- STATUS PULANG --}}
                            <td class="align-middle">

                                @if($row->status_pulang)

                                    <span class="badge badge-primary px-3 py-2 rounded-pill">

                                        {{ ucfirst($row->status_pulang) }}

                                    </span>

                                @else

                                    <span class="badge badge-secondary px-3 py-2 rounded-pill">
                                        Belum Pulang
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5 text-muted">

                                <i class="fas fa-folder-open fa-2x mb-3 d-block"></i>

                                Belum ada riwayat absensi.
                                Tetap semangat dan disiplin 🚀

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection