@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h4 class="mb-3">Detail Jurusan</h4>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            {{-- DATA JURUSAN --}}
            <table class="table table-bordered">

                <tr>
                    <th width="200">Nama Jurusan</th>

                    <td>
                        {{ $jurusan->namajurusan }}
                    </td>
                </tr>

            </table>

            {{-- RELASI KE KELAS --}}
            <h5 class="mt-4 mb-3">

                Daftar Kelas

            </h5>

            <table class="table table-bordered">

                <tr>

                    <th width="80">No</th>
                    <th>Kelas</th>
                    <th>Tingkat</th>

                </tr>

                @forelse($jurusan->kelas as $k)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    {{-- KELAS OTOMATIS --}}
                    <td>

                        {{ $k->tingkat }}
                        {{ $jurusan->namajurusan }}

                    </td>

                    <td>
                        {{ $k->tingkat }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center text-muted">

                        Belum ada kelas

                    </td>

                </tr>

                @endforelse

            </table>

            <a href="{{ route('jurusan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection