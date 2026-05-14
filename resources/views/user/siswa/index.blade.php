@extends('layouts.appadmin')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="font-weight-bold">
                    Data Siswa
                </h1>

                <small class="text-muted">
                    Manajemen data siswa sekolah
                </small>
            </div>

            <a href="{{ route('siswa.create') }}"
               class="btn btn-primary shadow-sm">

                <i class="fas fa-plus mr-1"></i>
                Tambah Siswa

            </a>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        {{-- ALERT SUCCESS --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show shadow-sm">

                <button type="button"
                        class="close"
                        data-dismiss="alert">

                    &times;

                </button>

                <i class="fas fa-check-circle mr-1"></i>

                {{ session('success') }}

            </div>

        @endif

        {{-- ====================================================== --}}
        {{-- SISWA PENDING --}}
        {{-- ====================================================== --}}
        <div class="card card-warning card-outline shadow-sm">

            <div class="card-header border-0">

                <h3 class="card-title font-weight-bold">

                    <i class="fas fa-user-clock mr-1"></i>
                   REGISTRASI SISWA

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-striped text-nowrap">

                    <thead class="bg-warning text-white">

                        <tr>

                            <th width="60">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pending as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->nis }}
                                </td>

                                <td class="font-weight-bold">
                                    {{ $item->nama }}
                                </td>

                                <td>
                                    {{ $item->kelas->namakelas ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->kelas->jurusan->namajurusan ?? '-' }}
                                </td>

                                <td>

                                    <span class="badge badge-warning px-3 py-2">

                                        Pending

                                    </span>

                                </td>

                                <td>

                                    <a href="{{ route('master.siswa.setujui', $item->id) }}"
                                       class="btn btn-success btn-sm shadow-sm">

                                        <i class="fas fa-check"></i>
                                        Setujui

                                    </a>

                                    <a href="{{ route('master.siswa.tolak', $item->id) }}"
                                       class="btn btn-danger btn-sm shadow-sm">

                                        <i class="fas fa-times"></i>
                                        Tolak

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center text-muted py-4">

                                    <i class="fas fa-inbox fa-2x mb-2"></i>

                                    <br>

                                    Tidak ada data pending

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- ====================================================== --}}
        {{-- DATA SISWA AKTIF --}}
        {{-- ====================================================== --}}
        <div class="card card-primary card-outline shadow-sm">

            <div class="card-header border-0">

                <h3 class="card-title font-weight-bold">

                    <i class="fas fa-user-graduate mr-1"></i>
                    Data Siswa Aktif

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-striped text-nowrap">

                    <thead class="bg-primary text-white">

                        <tr>

                            <th width="60">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->nis }}
                                </td>

                                <td class="font-weight-bold">
                                    {{ $item->nama }}
                                </td>

                                <td>
                                    {{ $item->kelas->namakelas ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->kelas->jurusan->namajurusan ?? '-' }}
                                </td>

                                <td>

                                    <a href="{{ route('siswa.show', $item->id) }}"
                                       class="btn btn-info btn-sm shadow-sm">

                                        <i class="fas fa-eye"></i>
                                        Detail

                                    </a>

                                    <a href="{{ route('siswa.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm shadow-sm">

                                        <i class="fas fa-edit"></i>
                                        Edit

                                    </a>

                                    <form action="{{ route('siswa.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm shadow-sm"
                                                onclick="return confirm('Hapus data siswa?')">

                                            <i class="fas fa-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center text-muted py-4">

                                    <i class="fas fa-database fa-2x mb-2"></i>

                                    <br>

                                    Belum ada data siswa

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection