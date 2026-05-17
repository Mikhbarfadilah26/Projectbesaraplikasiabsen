<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>
        Laporan Absensi Siswa
    </title>

    <style>
        @page {
            margin: 20px 25px;
        }

        body{
            font-family: "Times New Roman", serif;
            font-size: 11px;
            color:#000;

            /* SUPAYA FOOTER TTD NEMPEL BAWAH */
            position: relative;
            min-height: 100%;
        }

        /* =========================
           KOP SURAT
        ==========================*/
        .kop-wrapper{
            width:100%;
            border-bottom:3px solid #000;
            padding-bottom:10px;
            margin-bottom:20px;
        }

        .kop-table{
            width:100%;
            border:none;
        }

        .kop-table td{
            border:none;
            vertical-align:middle;
        }

        .logo{
            width:80px;
        }

        .kop-text{
            text-align:center;
        }

        .kop-text h1{
            margin:0;
            font-size:28px;
            font-weight:bold;
        }

        .kop-text h2{
            margin:0;
            font-size:18px;
            font-weight:bold;
        }

        .kop-text p{
            margin:2px 0;
            font-size:12px;
        }

        /* =========================
           JUDUL
        ==========================*/
        .judul{
            text-align:center;
            margin-top:20px;
            margin-bottom:20px;
        }

        .judul h3{
            margin:0;
            font-size:20px;
            text-transform:uppercase;
        }

        .judul p{
            margin-top:5px;
            font-size:13px;
        }

        /* =========================
           TABLE
        ==========================*/
        table{
            width:100%;
            border-collapse:collapse;
        }

        .table-data{
            table-layout:fixed;
        }

        .table-data th,
        .table-data td{
            border:1px solid #000;
            padding:6px 5px;
            font-size:11px;
            word-wrap:break-word;
        }

        .table-data th{
            background:#f2f2f2;
            text-align:center;
            font-weight:bold;
        }

        .text-center{
            text-align:center;
        }

        .text-left{
            text-align:left;
        }

        /* =========================
           UKURAN KOLOM
        ==========================*/
        .col-no{
            width:5%;
        }

        .col-nama{
            width:24%;
        }

        .col-nis{
            width:10%;
        }

        .col-kelas{
            width:15%;
        }

        .col-jurusan{
            width:12%;
        }

        .col-tanggal{
            width:18%;
        }

        .col-status{
            width:16%;
        }

        /* =========================
           FOOTER
        ==========================*/
        .footer{
            position: fixed;
            bottom: 20px;
            left: 25px;
            right: 25px;
            width: auto;
        }

        .footer-table{
            width:100%;
            border:none;
        }

        .footer-table td{
            border:none;
            text-align:center;
            vertical-align:top;
        }

        .jabatan{
            margin-bottom:80px;
            font-size:12px;
        }

        .ttd{
            font-weight:bold;
            text-decoration:underline;
        }
    </style>

</head>

<body>

    {{-- =========================
         KOP SURAT
    ========================== --}}
    <div class="kop-wrapper">

        <table class="kop-table">

            <tr>

                <td width="15%">

                    <img src="{{ public_path('dist/img/sekolah.png') }}"
                        class="logo">

                </td>

                <td width="85%" class="kop-text">

                    <h2>
                        PEMERINTAH KABUPATEN ACEH
                    </h2>

                    <h1>
                        SMK NEGERI 1 KARANG BARU
                    </h1>

                    <p>
                        Jl. Pendidikan No. 1 Karang Baru
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
         TABEL
    ========================== --}}
    <table class="table-data">

        <thead>

            <tr>

                <th class="col-no">
                    No
                </th>

                <th class="col-nama">
                    Nama Siswa
                </th>

                <th class="col-nis">
                    NIS
                </th>

                <th class="col-kelas">
                    Kelas
                </th>

                <th class="col-jurusan">
                    Jurusan
                </th>

                <th class="col-tanggal">
                    Tanggal
                </th>

                <th class="col-status">
                    Status
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($data as $d)

                <tr>

                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="text-left">
                        {{ $d->siswa->nama ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $d->siswa->nis ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $d->kelas->namakelas ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $d->kelas->jurusan->namajurusan ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($d->tanggal)->translatedFormat('d M Y') }}
                    </td>

                    <td class="text-center">

                        @if($d->status == 'hadir')
                            HADIR
                        @elseif($d->status == 'izin')
                            IZIN
                        @elseif($d->status == 'sakit')
                            SAKIT
                        @else
                            ALPHA
                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Data absensi tidak tersedia

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    {{-- =========================
         FOOTER TTD
    ========================== --}}
    <div class="footer">

        <table class="footer-table">

            <tr>

                <td width="50%">

                    <div class="jabatan">

                        Mengetahui,
                        <br>
                        Kepala Sekolah

                    </div>

                    <div class="ttd">

                        Fahmi Putra, S.pd

                    </div>

                    <div>

                        NIP. 19680505 199003 1 003

                    </div>

                </td>

                <td width="50%">

                    <div class="jabatan">

                        Bidang Kesiswaan

                    </div>

                    <div class="ttd">

                        Fajar Dharma Syaputra, S.Pd

                    </div>

                    <div>

                        NIP. 19711013 199403 2 005

                    </div>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>