<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Cetak Laporan Absensi
    </title>

    <style>

        @page {
            size: auto;
            margin: 15mm;
        }

        body {

            background: #d6d6d6;
            font-family: "Times New Roman", serif;

            margin: 0;
            padding: 20px;

        }

        .page {

            width: 210mm;

            background: #fff;

            margin: auto;

            padding: 15mm;

            box-shadow: 0 0 15px rgba(0,0,0,0.15);

            box-sizing: border-box;

        }

        @media print {

            body {

                background: none;
                padding: 0;

            }

            .page {

                width: 100%;

                margin: 0;

                padding: 0;

                box-shadow: none;

            }

            .footer {

                margin-top: 30px;

            }

        }

        /* =========================
           KOP SURAT
        ========================== */

        .kop {

            width: 100%;
            border-bottom: 3px solid #000;

            padding-bottom: 10px;
            margin-bottom: 20px;

        }

        .kop table {

            width: 100%;

        }

        .kop td {

            vertical-align: middle;

        }

        .logo {

            width: 85px;

        }

        .kop-text {

            text-align: center;

        }

        .kop-text h1 {

            margin: 0;
            font-size: 28px;
            font-weight: bold;

        }

        .kop-text h2 {

            margin: 0;
            font-size: 17px;

        }

        .kop-text p {

            margin: 2px 0;
            font-size: 12px;

        }

        /* =========================
           JUDUL
        ========================== */

        .judul {

            text-align: center;
            margin-bottom: 20px;

        }

        .judul h3 {

            margin: 0;
            font-size: 18px;

        }

        .judul p {

            margin-top: 5px;
            font-size: 12px;

        }

        /* =========================
           INFO SISWA
        ========================== */

        .info-siswa {

            margin-bottom: 15px;

        }

        .info-siswa table td {

            padding: 3px 0;
            font-size: 12px;

        }

        /* =========================
           TABLE
        ========================== */

        table {

            width: 100%;
            border-collapse: collapse;

        }

        .table-data {

            margin-top: 10px;

        }

        .table-data th {

            background: #efefef;

        }

        .table-data th,
        .table-data td {

            border: 1px solid #000;

            padding: 5px;

            font-size: 11px;

        }

        .text-center {

            text-align: center;

        }

        /* =========================
           FOOTER
        ========================== */

        .footer {

            margin-top: 40px;

        }

        .footer table {

            width: 100%;

        }

        .footer td {

            text-align: center;
            vertical-align: top;

        }

        .jabatan {

            margin-bottom: 70px;
            font-size: 12px;

        }

        .nama {

            font-weight: bold;
            text-decoration: underline;

        }

    </style>

</head>

<body>

    <div class="page">

        {{-- =========================
             KOP SURAT
        ========================== --}}
        <div class="kop">

            <table>

                <tr>

                    <td width="15%">

                        <img
                            src="{{ asset('dist/img/sekolah.png') }}"
                            class="logo"
                        >

                    </td>

                    <td width="85%" class="kop-text">

                        <h2>
                            PEMERINTAH KABUPATEN ACEH TAMIANG
                        </h2>

                        <h1>
                            SMK NEGERI 1 KARANG BARU
                        </h1>

                        <p>
                            Jl. Pendidikan No.1 Karang Baru
                        </p>

                        <p>
                            Email : smkn1karangbaru@gmail.com
                        </p>

                    </td>

                </tr>

            </table>

        </div>

        {{-- =========================
             JUDUL
        ========================== --}}
        <div class="judul">

            <h3>
                LAPORAN ABSENSI SISWA
            </h3>

            <p>
                Tahun Ajaran {{ date('Y') }}
            </p>

        </div>

        {{-- =========================
             INFO SISWA
        ========================== --}}
        @if(isset($absensi) && $absensi->count() > 0)

        <div class="info-siswa">

            <table>

                <tr>

                    <td width="120">
                        Nama
                    </td>

                    <td width="10">
                        :
                    </td>

                    <td>
                        {{ $absensi->first()->siswa->nama ?? '-' }}
                    </td>

                </tr>

                <tr>

                    <td>
                        NIS
                    </td>

                    <td>
                        :
                    </td>

                    <td>
                        {{ $absensi->first()->siswa->nis ?? '-' }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Kelas
                    </td>

                    <td>
                        :
                    </td>

                    <td>
                        {{ $absensi->first()->siswa->kelas->namakelas ?? '-' }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Jurusan
                    </td>

                    <td>
                        :
                    </td>

                    <td>
                        {{ $absensi->first()->siswa->kelas->jurusan->namajurusan ?? '-' }}
                    </td>

                </tr>

            </table>

        </div>

        @endif

        {{-- =========================
             TABLE DATA
        ========================== --}}
        <table class="table-data">

            <thead>

                <tr>

                    <th width="8%">
                        No
                    </th>

                    <th width="32%">
                        Tanggal
                    </th>

                    <th width="30%">
                        Status
                    </th>

                    <th width="30%">
                        Guru Penginput
                    </th>

                </tr>

            </thead>
<tbody>

    @php

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA DUPLIKAT BERDASARKAN TANGGAL
        |--------------------------------------------------------------------------
        | Jika tanggal sama:
        | 16 Mei hadir
        | 16 Mei hadir
        | 16 Mei izin
        |
        | Maka hanya tampil 1 data saja
        */

        $uniqueAbsensi = $absensi->unique('tanggal')->values();

    @endphp

    @forelse($uniqueAbsensi as $d)

    <tr>

        <td class="text-center">

            {{ $loop->iteration }}

        </td>

        <td class="text-center">

            {{ \Carbon\Carbon::parse($d->tanggal)->translatedFormat('d F Y') }}

        </td>

        <td class="text-center">

            @if($d->status == 'hadir')

                HADIR

            @elseif($d->status == 'izin')

                IZIN

            @elseif($d->status == 'sakit')

                SAKIT

            @elseif($d->status == 'cabut')

                CABUT

            @else

                ALPHA

            @endif

        </td>

        <td class="text-center">

            {{ $d->guru->name ?? '-' }}

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="4" class="text-center">

            Data absensi tidak tersedia

        </td>

    </tr>

    @endforelse

    {{-- DATA LIBUR --}}
    @if(isset($libur) && $libur)

    <tr style="background:#fff8e1;">

        <td class="text-center">
            -
        </td>

        <td class="text-center">

            {{ \Carbon\Carbon::parse($libur->tanggal)->translatedFormat('d F Y') }}

        </td>

        <td class="text-center">

            LIBUR

        </td>

        <td class="text-center">

            {{ $libur->keterangan }}

        </td>

    </tr>

    @endif

</tbody>

        </table>

        {{-- =========================
             FOOTER
        ========================== --}}
        <div class="footer">

            <table>

                <tr>

                    <td width="50%">

                        <div class="jabatan">

                            Mengetahui,
                            <br>
                            Kepala Sekolah

                        </div>

                        <div class="nama">

                            Fahmi Putra, S.Pd

                        </div>

                        <div>

                            NIP. 19680505 199003 1 003

                        </div>

                    </td>

                    <td width="50%">

                        <div class="jabatan">

                            Bidang Kesiswaan

                        </div>

                        <div class="nama">

                            Fajar Dharma Syaputra, S.Pd

                        </div>

                        <div>

                            NIP. 19711013 199403 2 005

                        </div>

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <script>

        setTimeout(() => {

            window.print();

        }, 500);

    </script>

</body>

</html>