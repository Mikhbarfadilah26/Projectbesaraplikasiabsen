@extends('layouts.appadmin')

@section('content')

<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">
                Data Pengumuman
            </h3>

            <small class="text-muted">
                Daftar seluruh pengumuman sekolah
            </small>

        </div>

        <a href="{{ route('pengumuman.create') }}"
            class="btn btn-primary">

            <i class="fas fa-plus-circle mr-1"></i>
            Tambah Pengumuman

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    {{-- TABLE --}}
    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark text-center">

                    <tr>

                        <th width="70">
                            No
                        </th>

                        <th width="120">
                            Foto
                        </th>

                        <th>
                            Judul
                        </th>

                        <th width="180">
                            Tanggal
                        </th>

                        <th width="150">
                            Dibuat Oleh
                        </th>

                        <th width="250">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pengumuman as $item)

                    <tr>

                        {{-- NOMOR --}}
                        <td class="text-center">

                            {{ $loop->iteration }}

                        </td>

                        {{-- FOTO --}}
                        <td class="text-center">

                            @if($item->foto)

                            <img src="{{ asset('storage/' . $item->foto) }}"
                                width="90"
                                class="img-thumbnail rounded">

                            @else

                            <span class="text-muted">
                                Tidak Ada
                            </span>

                            @endif

                        </td>

                        {{-- JUDUL --}}
                        <td>

                            <strong>

                                {{ $item->judul }}

                            </strong>

                        </td>

                        {{-- TANGGAL --}}
                        <td class="text-center">

                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                        </td>

                        {{-- USER --}}
                        <td class="text-center">

                            {{ $item->user->nama ?? '-' }}

                        </td>

                        {{-- AKSI --}}
                        <td class="text-center">

                            {{-- DETAIL --}}
                            <a href="{{ route('pengumuman.show', $item->id) }}"
                                class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>
                                Detail

                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('pengumuman.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>
                                Edit

                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('pengumuman.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus pengumuman ini ?')">

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

                            Data pengumuman masih kosong

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection