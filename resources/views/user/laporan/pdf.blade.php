<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Absensi Siswa</title>

    <style>
        body{
            font-family: "Times New Roman", serif;
            font-size: 12px;
            color: #000;
            margin: 25px;
        }

        .kop-wrapper{
            width: 100%;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .kop-table{
            width: 100%;
            border: none;
        }

        .kop-table td{
            border: none;
            vertical-align: middle;
        }

        .logo{
            width: 90px;
        }

        .kop-text{
            text-align: center;
        }

        .kop-text h1{
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .kop-text h2{
            margin: 3px 0;
            font-size: 18px;
        }

        .kop-text p{
            margin: 2px 0;
            font-size: 12px;
        }

        .judul{
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .judul h3{
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .judul p{
            margin-top: 5px;
            font-size: 13px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th,
        table td{
            border: 1px solid #000;
            padding: 8px;
            font-size: 12px;
        }

        table th{
            background: #f2f2f2;
            text-align: center;
        }

        .text-center{
            text-align: center;
        }

        .footer{
            margin-top: 60px;
            width: 100%;
        }

        .footer-table{
            width: 100%;
            border: none;
        }

        .footer-table td{
            border: none;
            text-align: center;
            vertical-align: top;
        }

        .ttd{
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }

        .jabatan{
            margin-bottom: 5px;
        }
    </style>

</head>

<body>

    {{-- KOP SURAT --}}
    <div class="kop-wrapper">

        <table class="kop-table">

            <tr>

                <td width="100">

                    {{-- LOGO SEKOLAH --}}
          
              <img src="{{ public_path('dist/img/sekolah.png') }}"
     class="logo">


                </td>

                <td class="kop-text">

                    <h2>PEMERINTAH KABUPATEN ACEH</h2>

                    <h1>SMK NEGERI 1 KARANG BARU</h1>

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

    {{-- JUDUL --}}
    <div class="judul">

        <h3>Laporan Absensi Siswa</h3>

        <p>
            Tahun Ajaran {{ date('Y') }}
        </p>

    </div>

    {{-- TABEL --}}
    <table>

        <thead>

            <tr>
                <th width="40">No</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse($data as $d)

            <tr>

                <td class="text-center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $d->siswa->nama }}
                </td>

                <td class="text-center">
                    {{ $d->siswa->nis }}
                </td>

                <td class="text-center">
                    {{ $d->siswa->kelas->tingkat ?? '-' }}
                </td>

                <td>
                    {{ $d->siswa->kelas->jurusan->namajurusan ?? '-' }}
                </td>

                <td class="text-center">
                    {{ \Carbon\Carbon::parse($d->tanggal)->translatedFormat('d F Y') }}
                </td>

                <td class="text-center">
                    {{ ucfirst($d->status_masuk) }}
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

    {{-- TANDA TANGAN --}}
    <div class="footer">

        <table class="footer-table">

            <tr>

                <td width="50%">

                    <p class="jabatan">
                        Mengetahui,
                        <br>
                        Kepala Sekolah
                    </p>

                    <div class="ttd">
                        Drs. Ahmad Muslim, M.Pd
                    </div>

                    <p>
                        NIP. 19680505 199003 1 003
                    </p>

                </td>

                <td width="50%">

                    <p class="jabatan">
                        Bidang Kesiswaan
                    </p>

                    <div class="ttd">
                        Endang Lestari, S.Pd
                    </div>

                    <p>
                        NIP. 19711013 199403 2 005
                    </p>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>