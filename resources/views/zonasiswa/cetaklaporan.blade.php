<!DOCTYPE html>
<html>

<head>
    <title>Laporan Absensi</title>

    <style>
        body {
            font-family: sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>LAPORAN ABSENSI SISWA</h2>

    <div class="info">
        <strong>Nama:</strong> {{ $siswa->nama }} <br>
        <strong>NIS:</strong> {{ $siswa->nis }} <br>
        <strong>Kelas:</strong> {{ $siswa->kelas->namakelas ?? '-' }}
    </div>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Status Masuk</th>
                <th>Jam Pulang</th>
                <th>Status Pulang</th>
            </tr>

        </thead>

        <tbody>

            @foreach($absensi as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ date('d-m-Y', strtotime($item->tanggal)) }}
                </td>

                <td>
                    {{ $item->jam_masuk ?? '-' }}
                </td>

                <td>
                    {{ ucfirst($item->status_masuk) }}
                </td>

                <td>
                    {{ $item->jam_pulang ?? '-' }}
                </td>

                <td>
                    {{ $item->status_pulang ?? '-' }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>