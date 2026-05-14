@extends('layouts.appsiswa')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <h1>
                Laporan Absensi Anda
            </h1>

        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($laporan as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->tanggal }}
                                    </td>

                                    <td>
                                        {{ ucfirst($item->status) }}
                                    </td>

                                    <td>
                                        {{ $item->keterangan ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center">
                                        Belum ada data absensi
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection