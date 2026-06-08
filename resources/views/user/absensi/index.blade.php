@extends('layouts.appadmin')

@section('content')

<style>
    /* =========================================
       STYLE BUTTON ABSENSI
    ==========================================*/

    .absensi-wrapper {

        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;

    }

    .radio-absen {

        display: none;

    }

    .btn-absensi {

        border: none;
        padding: 10px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
        min-width: 90px;
        text-align: center;
        cursor: pointer;
        position: relative;

    }

    .btn-absensi:hover {

        opacity: 0.95;
        transform: translateY(-2px);

    }

    .btn-hadir {

        background: #16a34a;

    }

    .btn-izin {

        background: #f59e0b;

    }

    .btn-sakit {

        background: #0ea5e9;

    }

    .btn-alpha {

        background: #dc2626;

    }

    /* =========================================
       TANDA JIKA DIPILIH
    ==========================================*/

    .radio-absen:checked+.btn-absensi {

        transform: scale(1.05);
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.15);

    }

    .radio-absen:checked+.btn-absensi::after {

        content: "✓";
        position: absolute;
        top: -8px;
        right: -8px;
        width: 24px;
        height: 24px;
        background: white;
        color: #111;
        border-radius: 50%;
        font-size: 14px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);

    }

    /* =========================================
       BUTTON SIMPAN BAWAH
    ==========================================*/

    .wrapper-simpan {

        display: flex;
        justify-content: center;
        margin-top: 25px;

    }

    .btn-simpan-semua {

        padding: 12px 40px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: bold;

    }

    /* =========================================
   ALERT ABSENSI MODERN
==========================================*/

    .alert-absensi-modern {

        border-radius: 18px;
        padding: 18px 22px;
        margin-bottom: 20px;
        position: relative;
        overflow: hidden;
        animation: pulseAlert 2s infinite;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);

    }

    .alert-absensi-modern::before {

        content: '';
        position: absolute;
        top: 0;
        left: -100px;
        width: 80px;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transform: skewX(-20deg);
        animation: shine 2.5s infinite;

    }

    .alert-belum {

        background: linear-gradient(135deg, #f59e0b, #facc15);
        color: #111;

    }

    .alert-telat {

        background: linear-gradient(135deg, #dc2626, #ef4444);
        color: white;

    }

    @keyframes shine {

        100% {
            left: 120%;
        }

    }

    @keyframes pulseAlert {

        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.01);
        }

        100% {
            transform: scale(1);
        }

    }
</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h4 class="font-weight-bold mb-1">
                Data Absensi
            </h4>

            <small class="text-muted">

                Hai Wali Kelas 👋
                Silahkan pilih kelas anda untuk melakukan absensi siswa.

            </small>

        </div>

        <div>

            <span class="badge bg-success px-3 py-2">
                Refresh Otomatis Jam 07:00 WIB
            </span>

        </div>

    </div>


    {{-- ALERT PENGINGAT ABSENSI --}}
    @php

    $hariIni = \Carbon\Carbon::parse(request('tanggal') ?? date('Y-m-d'));

    $isMinggu = $hariIni->dayOfWeek == 0;

    $jamSekarang = now()->format('H:i');

    // TELAT JIKA LEWAT JAM 10
    $telatAbsen = $jamSekarang >= '10:00';

    @endphp

    @if(
    request('kelasid') &&
    request('tanggal') &&
    !$sudahDiabsen &&
    !$hariLibur &&
    !$isMinggu
    )

    <div class="alert-absensi-modern {{ $telatAbsen ? 'alert-telat' : 'alert-belum' }}">

        <div class="d-flex align-items-center">

            <div class="mr-3">

                <i class="fas fa-bell fa-3x"></i>

            </div>

            <div>

                <h5 class="mb-1 font-weight-bold">

                    🚨 Ayo lakukan absensi sekarang

                </h5>

                <div>

                    Kelas ini belum melakukan absensi tanggal

                    <strong>
                        {{ \Carbon\Carbon::parse(request('tanggal'))->format('d-m-Y') }}
                    </strong>

                </div>

                @if($telatAbsen)

                <small>

                    ⚠ Sudah lewat jam 10:00 WIB,
                    segera lakukan absensi sekarang.

                </small>

                @else

                <small>

                    ⏰ Jangan sampai lupa melakukan absensi hari ini.

                </small>

                @endif

            </div>

        </div>

    </div>

    {{-- SUARA + POPUP --}}
    <audio id="notifAbsen">

        <source
            src="https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3"
            type="audio/mpeg">

    </audio>

    <script>
        window.addEventListener('load', function() {

            setTimeout(() => {

                alert('🚨 Kelas ini belum diabsen hari ini!');

            }, 700);

            const audio = document.getElementById('notifAbsen');

            audio.play().catch(() => {});

        });
    </script>

    @endif

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

    {{-- FILTER --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                action="{{ route('absensi.index') }}">

                <div class="row">

                    {{-- JURUSAN --}}
                    <div class="col-md-3 mb-3">

                        <label>Jurusan</label>
                        <select name="jurusanid"
                            id="jurusanid"
                            class="form-control">

                            <option value="">
                                -- Pilih Jurusan --
                            </option>

                            @foreach($jurusan as $j)

                            <option value="{{ $j->id }}"
                                {{ request('jurusanid') == $j->id ? 'selected' : '' }}>

                                {{ $j->namajurusan }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- KELAS --}}
                    <div class="col-md-3 mb-3">

                        <label>Kelas</label>

                        <select name="kelasid"
                            id="kelasid"
                            class="form-control">

                            <option value="">
                                -- Pilih Kelas --
                            </option>

                            @foreach($kelas as $k)

                            <option
                                value="{{ $k->id }}"
                                data-jurusan="{{ $k->jurusanid }}"
                                {{ request('kelasid') == $k->id ? 'selected' : '' }}>

                                {{ $k->namakelas }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- TANGGAL --}}
                    <div class="col-md-3 mb-3">

                        <label>Tanggal</label>

                        <input type="date"
                            name="tanggal"
                            value="{{ request('tanggal') ?? date('Y-m-d') }}"
                            class="form-control">

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-3 mb-3 d-flex align-items-end">

                        <button type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-search mr-1"></i>
                            Filter

                        </button>

                    </div>

                </div>

            </form>

            {{-- INFO ABSENSI --}}
            @if(request('kelasid') && request('tanggal'))
            @if($hariLibur)

            <div class="alert alert-danger mt-3 mb-0">

                <i class="fas fa-calendar-times"></i>

                Tanggal ini merupakan hari libur :

                <strong>
                    {{ $keteranganLibur }}
                </strong>

            </div>

            @endif

            @if(count($siswa) > 0)

            @if($sudahDiabsen)

            <div class="alert alert-success mt-3 mb-0">

                <i class="fas fa-check-circle"></i>

                Kelas ini sudah diabsen pada tanggal

                <strong>
                    {{ \Carbon\Carbon::parse(request('tanggal'))->format('d-m-Y') }}
                </strong>

            </div>

            @elseif(!$hariLibur)

            <div class="alert alert-warning mt-3 mb-0">

                <i class="fas fa-exclamation-triangle"></i>

                Kelas ini belum diabsen pada tanggal

                <strong>
                    {{ \Carbon\Carbon::parse(request('tanggal'))->format('d-m-Y') }}
                </strong>

            </div>

            @endif

            @else

            <div class="alert alert-secondary mt-3 mb-0">

                Tidak ada siswa pada kelas ini

            </div>

            @endif

            @endif



        </div>

    </div>

    {{-- FORM BESAR --}}
    <form method="POST"
        action="{{ route('absensi.store') }}">

        @csrf
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">

        {{-- TABLE --}}
        <div class="card shadow-sm">

            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="bg-dark text-white text-center">

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th>
                                Siswa
                            </th>

                            <th>
                                Kelas
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Status
                            </th>
                            @if(request('kelasid') && request('tanggal'))
                            <th width="450">
                                Input Absensi
                            </th>
                            @endif

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($siswa as $no => $s)

                        @php
                        $absen = $absensi[$s->id] ?? null;
                        @endphp

                        <tr>

                            <td class="text-center">
                                {{ $no + 1 }}
                            </td>

                            <td>
                                {{ $s->nama }}
                            </td>

                            <td>
                                {{ $s->kelas->namakelas ?? '-' }}
                            </td>

                            <td class="text-center">

                                @if(request('tanggal'))

                                {{ \Carbon\Carbon::parse(request('tanggal'))->format('d-m-Y') }}

                                @else

                                -

                                @endif

                            </td>

                            {{-- STATUS --}}
                            <td class="text-center">

                                @if($absen)

                                @php
                                $badge = match($absen->status) {

                                'hadir' => 'success',
                                'izin' => 'warning',
                                'sakit' => 'info',
                                'alpha' => 'danger',
                                default => 'secondary'

                                };
                                @endphp

                                <span class="badge bg-{{ $badge }} px-3 py-2">

                                    {{ strtoupper($absen->status) }}

                                </span>

                                @else

                                <span class="badge bg-secondary px-3 py-2">

                                    BELUM ABSEN

                                </span>

                                @endif

                            </td>

                            {{-- INPUT ABSENSI --}}
                            @if(request('kelasid') && request('tanggal'))

                            <td>

                                <input type="hidden"
                                    name="siswaid[]"
                                    value="{{ $s->id }}">

                                <div class="absensi-wrapper">

                                    {{-- HADIR --}}
                                    <label class="m-0">

                                        <input type="radio"
                                            name="status[{{ $s->id }}]"
                                            value="hadir"
                                            class="radio-absen"
                                            {{ ($sudahDiabsen || $hariLibur) ? 'disabled' : '' }}
                                            {{ $absen && $absen->status == 'hadir' ? 'checked' : '' }}>

                                        <span class="btn-absensi btn-hadir">
                                            Hadir
                                        </span>

                                    </label>

                                    {{-- IZIN --}}
                                    <label class="m-0">

                                        <input type="radio"
                                            name="status[{{ $s->id }}]"
                                            value="izin"
                                            class="radio-absen"
                                            {{ ($sudahDiabsen || $hariLibur) ? 'disabled' : '' }}
                                            {{ $absen && $absen->status == 'izin' ? 'checked' : '' }}>

                                        <span class="btn-absensi btn-izin">
                                            Izin
                                        </span>

                                    </label>

                                    {{-- SAKIT --}}
                                    <label class="m-0">

                                        <input type="radio"
                                            name="status[{{ $s->id }}]"
                                            value="sakit"
                                            class="radio-absen"
                                            {{ ($sudahDiabsen || $hariLibur) ? 'disabled' : '' }}
                                            {{ $absen && $absen->status == 'sakit' ? 'checked' : '' }}>

                                        <span class="btn-absensi btn-sakit">
                                            Sakit
                                        </span>

                                    </label>

                                    {{-- ALPHA --}}
                                    <label class="m-0">

                                        <input type="radio"
                                            name="status[{{ $s->id }}]"
                                            value="alpha"
                                            class="radio-absen"
                                            {{ ($sudahDiabsen || $hariLibur) ? 'disabled' : '' }}
                                            {{ $absen && $absen->status == 'alpha' ? 'checked' : '' }}>

                                        <span class="btn-absensi btn-alpha">
                                            Alpha
                                        </span>

                                    </label>

                                </div>

                            </td>

                            @endif

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted py-4">

                                Data siswa tidak ditemukan

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- BUTTON SIMPAN --}}@if(
        request('kelasid') &&
        request('tanggal') &&
        !$sudahDiabsen &&
        !$hariLibur
        )

        <div class="wrapper-simpan">

            <button type="submit"
                class="btn btn-success btn-simpan-semua">

                <i class="fas fa-save mr-1"></i>
                Simpan Semua Absensi

            </button>

        </div>

        @endif

        {{-- TANGGAL --}}
        <input type="hidden"
            name="tanggal"
            value="{{ request('tanggal') ?? date('Y-m-d') }}">

        {{-- KELAS --}}
        <input type="hidden"
            name="kelasid"
            value="{{ request('kelasid') }}">

    </form>

</div>

{{-- REFRESH JAM 07:00 WIB --}}
<script>
    function refreshJam7Pagi() {

        const sekarang = new Date();

        const jam = sekarang.getHours();

        const menit = sekarang.getMinutes();

        if (jam === 7 && menit === 0) {

            location.reload();

        }

    }

    setInterval(refreshJam7Pagi, 60000);
</script>
<script>
    const jurusanSelect = document.getElementById('jurusanid');
    const kelasSelect = document.getElementById('kelasid');

    function filterKelas() {

        const jurusanId = jurusanSelect.value;
        const selectedKelas = kelasSelect.value;

        for (let option of kelasSelect.options) {

            // OPTION DEFAULT
            if (option.value === '') {
                option.hidden = false;
                continue;
            }

            const jurusanOption = option.getAttribute('data-jurusan');

            // TAMPILKAN KELAS SESUAI JURUSAN
            if (jurusanId === '' || jurusanOption === jurusanId) {

                option.hidden = false;

            } else {

                option.hidden = true;

                // RESET JIKA KELAS TIDAK SESUAI
                if (option.value === selectedKelas) {
                    kelasSelect.value = '';
                }

            }

        }

    }

    // SAAT JURUSAN DIGANTI
    jurusanSelect.addEventListener('change', filterKelas);

    // SAAT HALAMAN LOAD
    window.addEventListener('load', filterKelas);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (!navigator.geolocation) {

            alert('Browser tidak mendukung GPS');
            return;

        }

        navigator.geolocation.getCurrentPosition(

            function(position) {

                document.getElementById('latitude').value =
                    position.coords.latitude;

                document.getElementById('longitude').value =
                    position.coords.longitude;

                console.log(
                    'Latitude:',
                    position.coords.latitude
                );

                console.log(
                    'Longitude:',
                    position.coords.longitude
                );

            },

            function(error) {

                alert(
                    'GPS harus diaktifkan untuk melakukan absensi'
                );

                console.log(error);

            },

            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }

        );

    });
</script>
@endsection