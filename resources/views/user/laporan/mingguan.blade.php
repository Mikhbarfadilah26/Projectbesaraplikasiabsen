@extends('layouts.appadmin')

@section('content')

@php

use App\Models\ModelAbsensi;
use App\Models\ModelKelas;
use App\Models\ModelSiswa;
use Carbon\Carbon;

Carbon::setLocale('id');

$kelasid = request('kelasid');

$minggu = request('minggu') ?? now()->format('Y-\WW');

$tahun = substr($minggu, 0, 4);
$mingguKe = substr($minggu, 6);

$awalMinggu = Carbon::now()
    ->setISODate($tahun, $mingguKe)
    ->startOfWeek(Carbon::MONDAY);

$akhirMinggu = Carbon::now()
    ->setISODate($tahun, $mingguKe)
    ->endOfWeek(Carbon::SATURDAY);

$kelas = ModelKelas::orderBy('namakelas')->get();

/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
| JIKA BELUM PILIH KELAS
| MAKA DATA JANGAN DITAMPILKAN
|--------------------------------------------------------------------------
*/

$siswa = collect();

if($kelasid){

    $siswa = ModelSiswa::with('kelas.jurusan')
        ->where('kelasid', $kelasid)
        ->orderBy('nama')
        ->get();
}

$dataAbsensi = ModelAbsensi::whereBetween('tanggal', [
        $awalMinggu->format('Y-m-d'),
        $akhirMinggu->format('Y-m-d')
    ])
    ->get();

/*
|--------------------------------------------------------------------------
| HARI SENIN - SABTU
|--------------------------------------------------------------------------
*/

$hari = [];

for($i = 0; $i < 6; $i++){

    $hari[] = $awalMinggu->copy()->addDays($i);
}

@endphp

<style>

body{
    background:#eef3f9;
    font-family:'Segoe UI',sans-serif;
}

.card{
    border:none;
    border-radius:22px;
    overflow:hidden;
}

.absensi-sheet{
    background:white;
    border-radius:28px;
    padding:35px;
    box-shadow:0 10px 40px rgba(0,0,0,0.08);
    position:relative;
    overflow:hidden;
}

.absensi-sheet::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:10px;
    background:linear-gradient(90deg,#0d47a1,#1976d2,#42a5f5);
}

.logo-sekolah{
    width:85px;
    height:85px;
    object-fit:contain;
}

.nama-sekolah{
    font-size:28px;
    font-weight:800;
    color:#0d47a1;
    line-height:1.2;
}

.sub-sekolah{
    font-size:14px;
    color:#5f6368;
}

.judul{
    font-size:52px;
    font-weight:900;
    color:#0d47a1;
    letter-spacing:3px;
}

.garis{
    width:220px;
    height:5px;
    background:linear-gradient(90deg,#1565c0,#64b5f6);
    border-radius:30px;
    margin:auto;
}

.info-table td{
    padding:4px 10px;
    font-size:14px;
}

.table-absen{
    width:100%;
    border-collapse:collapse;
}

.table-absen thead th{
    background:linear-gradient(135deg,#1565c0,#0d47a1);
    color:white;
    border:1px solid #dbe5f1;
    text-align:center;
    padding:8px;
    font-size:13px;
}

.table-absen tbody td{
    border:1px solid #dbe5f1;
    padding:7px;
    font-size:13px;
}

.table-absen tbody tr:nth-child(even){
    background:#f8fbff;
}

.nama{
    min-width:230px;
    font-weight:600;
}

.kotak{
    width:42px;
    text-align:center;
    font-weight:bold;
}

.hari{
    display:block;
    font-size:10px;
    font-weight:500;
    opacity:.9;
    margin-top:2px;
}

.rekap{
    background:#e3f2fd;
    font-weight:bold;
}

.footer-box{
    background:#f8fbff;
    border:1px solid #dbe5f1;
    border-radius:18px;
    padding:18px;
}

.ttd{
    margin-top:20px;
    text-align:center;
}

.ttd-line{
    width:220px;
    border-bottom:2px dashed #444;
    margin:70px auto 10px;
}

.footer-bottom{
    margin-top:30px;
    padding-top:15px;
    border-top:2px dashed #dbe5f1;
    font-size:13px;
    color:#666;
    display:flex;
    justify-content:space-between;
}

.badge-kelas{
    background:#0d47a1;
    color:white;
    padding:8px 18px;
    border-radius:40px;
    font-size:13px;
    font-weight:600;
}

.kosong{
    padding:80px 20px;
    text-align:center;
    color:#6b7280;
}

@media print{

    .no-print{
        display:none;
    }

    body{
        background:white;
    }

    .absensi-sheet{
        box-shadow:none;
        border-radius:0;
    }

}

</style>

<div class="container-fluid mt-4">

    {{-- FILTER --}}
    <div class="card shadow-sm mb-4 no-print">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-4">

                        <label class="font-weight-bold">
                            Pilih Minggu
                        </label>

                        <input type="week"
                               name="minggu"
                               value="{{ $minggu }}"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label class="font-weight-bold">
                            Pilih Kelas
                        </label>

                        <select name="kelasid"
                                class="form-control">

                            <option value="">
                                -- Pilih Kelas Dulu --
                            </option>

                            @foreach($kelas as $k)

                                <option value="{{ $k->id }}"
                                    {{ $kelasid == $k->id ? 'selected' : '' }}>

                                    {{ $k->namakelas }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button class="btn btn-primary btn-block">

                            <i class="fas fa-search"></i>
                            Tampilkan

                        </button>

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button type="button"
                                onclick="window.print()"
                                class="btn btn-success btn-block">

                            <i class="fas fa-print"></i>
                            Cetak

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- SHEET --}}
    <div class="absensi-sheet">

        {{-- HEADER --}}
        <div class="row align-items-center mb-4">

            <div class="col-md-4">

                <div class="d-flex align-items-center">

                    <img src="{{ asset('dist/img/foto1.png') }}"
                         class="logo-sekolah mr-3">

                    <div>

                        <div class="nama-sekolah">
                            SMK NEGERI 1 KARANG BARU
                        </div>

                        <div class="sub-sekolah">
                            Sistem Informasi Absensi Sekolah
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-8 text-center">

                <div class="judul">
                    ABSENSI SISWA
                </div>

                <div class="garis mb-3"></div>

                <div class="badge-kelas">

                    {{ optional(optional($siswa->first())->kelas)->namakelas ?? 'BELUM PILIH KELAS' }}

                </div>

            </div>

        </div>

        {{-- INFO --}}
        <div class="row mb-4">

            <div class="col-md-6">

                <table class="info-table">

                    <tr>
                        <td width="140">
                            <b>Kelas</b>
                        </td>

                        <td width="10">:</td>

                        <td>
                            {{ optional(optional($siswa->first())->kelas)->namakelas ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Jurusan</b>
                        </td>

                        <td>:</td>

                        <td>
                            {{ optional(optional(optional($siswa->first())->kelas)->jurusan)->namajurusan ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Minggu</b>
                        </td>

                        <td>:</td>

                        <td>

                            {{ $awalMinggu->translatedFormat('d F Y') }}

                            s/d

                            {{ $akhirMinggu->translatedFormat('d F Y') }}

                        </td>
                    </tr>

                </table>

            </div>

            <div class="col-md-6">

                <table class="info-table float-md-right">

                    <tr>
                        <td width="150">
                            <b>Total Siswa</b>
                        </td>

                        <td width="10">:</td>

                        <td>
                            {{ $siswa->count() }} Siswa
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Tanggal Cetak</b>
                        </td>

                        <td>:</td>

                        <td>
                            {{ now()->translatedFormat('d F Y') }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Jam Cetak</b>
                        </td>

                        <td>:</td>

                        <td>
                            {{ now()->format('H:i') }} WIB
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        {{-- JIKA BELUM PILIH KELAS --}}
        @if(!$kelasid)

            <div class="kosong">

                <i class="fas fa-school fa-4x mb-4"></i>

                <h4 class="font-weight-bold">
                    Silakan Pilih Kelas Terlebih Dahulu
                </h4>

                <p>
                    Data absensi mingguan akan tampil setelah kelas dipilih.
                </p>

            </div>

        @else

        {{-- TABEL --}}
        <div class="table-responsive">

            <table class="table-absen">

                <thead>

                    <tr>

                        <th rowspan="2" width="50">
                            No
                        </th>

                        <th rowspan="2">
                            Nama Siswa
                        </th>

                        <th colspan="6">
                            TANGGAL
                        </th>

                        <th colspan="4">
                            REKAP
                        </th>

                    </tr>

                    <tr>

                        @foreach($hari as $h)

                            <th class="kotak">

                                {{ $h->format('d') }}

                                <span class="hari">

                                    {{ strtoupper($h->translatedFormat('l')) }}

                                </span>

                            </th>

                        @endforeach

                        <th class="kotak">
                            H
                        </th>

                        <th class="kotak">
                            S
                        </th>

                        <th class="kotak">
                            I
                        </th>

                        <th class="kotak">
                            A
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($siswa as $item)

                    @php

                        $h = 0;
                        $s = 0;
                        $i = 0;
                        $a = 0;

                    @endphp

                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="nama">
                            {{ $item->nama }}
                        </td>

                        @foreach($hari as $tgl)

                            @php

                                $absen = $dataAbsensi
                                    ->where('siswaid', $item->id)
                                    ->where('tanggal', $tgl->format('Y-m-d'))
                                    ->first();

                                $kode = '';

                                if($absen){

                                    if($absen->status == 'hadir'){
                                        $kode = 'H';
                                        $h++;
                                    }

                                    elseif($absen->status == 'sakit'){
                                        $kode = 'S';
                                        $s++;
                                    }

                                    elseif($absen->status == 'izin'){
                                        $kode = 'I';
                                        $i++;
                                    }

                                    elseif($absen->status == 'alpha'){
                                        $kode = 'A';
                                        $a++;
                                    }

                                }

                            @endphp

                            <td class="kotak">

                                {{ $kode }}

                            </td>

                        @endforeach

                        <td class="kotak rekap">
                            {{ $h }}
                        </td>

                        <td class="kotak rekap">
                            {{ $s }}
                        </td>

                        <td class="kotak rekap">
                            {{ $i }}
                        </td>

                        <td class="kotak rekap">
                            {{ $a }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @endif

        {{-- FOOTER --}}
        <div class="row mt-5">

            <div class="col-md-4">

                <div class="footer-box">

                    <h5 class="font-weight-bold mb-3">
                        KETERANGAN
                    </h5>

                    <table>

                        <tr>
                            <td width="30"><b>H</b></td>
                            <td>: Hadir</td>
                        </tr>

                        <tr>
                            <td><b>S</b></td>
                            <td>: Sakit</td>
                        </tr>

                        <tr>
                            <td><b>I</b></td>
                            <td>: Izin</td>
                        </tr>

                        <tr>
                            <td><b>A</b></td>
                            <td>: Alpha</td>
                        </tr>

                    </table>

                </div>

            </div>

            <div class="col-md-4">

                <div class="footer-box text-center">

                    <i class="fas fa-school fa-3x text-primary mb-3"></i>

                    <h5 class="font-weight-bold">
                        Sistem Absensi Digital
                    </h5>

                    <div class="text-muted">

                        Dicetak otomatis melalui sistem
                        absensi sekolah berbasis Laravel

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="ttd">

                    Mengetahui,

                    <br>

                    <b>Wali Kelas</b>

                    <div class="ttd-line"></div>

                    ________________________

                </div>

            </div>

        </div>

        {{-- FOOTER --}}
        <div class="footer-bottom">

            <div>
                Sistem Absensi Sekolah
            </div>

            <div>
                SMK Negeri 1 Karang Baru
            </div>

        </div>

    </div>

</div>

@endsection