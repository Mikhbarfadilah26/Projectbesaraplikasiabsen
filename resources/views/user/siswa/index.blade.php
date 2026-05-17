@extends('layouts.appadmin')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="font-weight-bold mb-1">
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

        {{-- ALERT --}}
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

        {{-- ===================================================== --}}
        {{-- REGISTRASI SISWA --}}
        {{-- ===================================================== --}}
        <div class="card card-warning card-outline shadow-sm">

            <div class="card-header border-0">

                <h3 class="card-title font-weight-bold">

                    <i class="fas fa-user-clock mr-1"></i>
                    Registrasi Siswa

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-striped text-nowrap mb-0">

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

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nis }}</td>

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

                                    Tidak ada data pending

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- ===================================================== --}}
        {{-- DATA SISWA PER KELAS --}}
        {{-- ===================================================== --}}

        @php
            $grouped = $data->groupBy(function ($item) {
                return ($item->kelas->jurusan->namajurusan ?? '-') . ' - ' .
                       ($item->kelas->namakelas ?? '-');
            });
        @endphp

        @forelse($grouped as $kelas => $items)

            <div class="card card-primary card-outline shadow-sm">

                {{-- HEADER CARD --}}
                <div class="card-header border-0">

                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <h3 class="card-title font-weight-bold mb-2 mb-md-0">

                            <i class="fas fa-users mr-1"></i>

                            {{ $kelas }}

                        </h3>

                        <div>

                            <span class="badge badge-primary px-3 py-2"
                                  style="font-size:14px;">

                                Total :
                                {{ $items->count() }} Siswa

                            </span>

                        </div>

                    </div>

                </div>

                {{-- BODY --}}
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover table-striped text-nowrap mb-0">

                        <thead class="bg-primary text-white">

                            <tr>

                                <th width="60">No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th width="170">Jenis Kelamin</th>
                                <th width="220">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($items as $item)

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

                                        @if($item->jeniskelamin == 'L')

                                            <span class="badge d-inline-flex justify-content-center align-items-center"
                                                  style="
                                                    background:#17a2b8;
                                                    color:white;
                                                    width:120px;
                                                    height:35px;
                                                    font-size:13px;
                                                    border-radius:8px;
                                                  ">

                                                Laki-Laki

                                            </span>

                                        @else

                                            <span class="badge d-inline-flex justify-content-center align-items-center"
                                                  style="
                                                    background:#e83e8c;
                                                    color:white;
                                                    width:120px;
                                                    height:35px;
                                                    font-size:13px;
                                                    border-radius:8px;
                                                  ">

                                                Perempuan

                                            </span>

                                        @endif

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

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @empty

            <div class="card shadow-sm">

                <div class="card-body text-center text-muted py-5">

                    <i class="fas fa-database fa-3x mb-3"></i>

                    <h5>
                        Belum ada data siswa
                    </h5>

                </div>

            </div>

        @endforelse

    </div>

</section>

@endsection