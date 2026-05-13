@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="font-weight-bold mb-1">
                Data Siswa
            </h3>

            <p class="text-muted mb-0">
                Daftar siswa berdasarkan kelas
            </p>

        </div>

        <a href="{{ route('siswa.create') }}"
           class="btn btn-primary shadow-sm px-4 rounded-pill">

            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Siswa

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-lg">

            {{ session('success') }}

        </div>

    @endif

    @php

        $grouped = $data->groupBy(function($item){

            return ($item->kelas->tingkat ?? '-') . ' - ' .
                   ($item->kelas->jurusan->namajurusan ?? '-');

        });

    @endphp

    @foreach($grouped as $kelas => $siswas)

    <div class="card border-0 shadow-lg rounded-xl mb-4 overflow-hidden">

        <div class="card-header py-3"
             style="background:linear-gradient(135deg,#2563eb,#1e40af);">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="text-white mb-0 font-weight-bold">

                    <i class="fas fa-school mr-2"></i>
                    Kelas {{ $kelas }}

                </h5>

                <span class="badge badge-light px-3 py-2">

                    {{ $siswas->count() }} Siswa

                </span>

            </div>

        </div>

        <div class="card-body bg-light">

            <div class="row">

                @foreach($siswas as $d)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow-sm siswa-card h-100 rounded-xl">

                        <div class="card-body text-center p-4">

                            @if($d->foto)

                                <img src="{{ Storage::url($d->foto) }}"
                                     width="110"
                                     height="110"
                                     style="object-fit:cover;border-radius:50%;border:5px solid #e5e7eb;">

                            @else

                                <img src="{{ asset('dist/img/default.png') }}"
                                     width="110"
                                     height="110"
                                     style="object-fit:cover;border-radius:50%;border:5px solid #e5e7eb;">

                            @endif

                            <h5 class="font-weight-bold mt-3 mb-1">

                                {{ $d->nama }}

                            </h5>

                            <p class="text-muted mb-2">

                                NIS : {{ $d->nis }}

                            </p>

                            <span class="badge {{ $d->jeniskelamin == 'L' ? 'badge-primary' : 'badge-danger' }} px-3 py-2 mb-3">

                                {{ $d->jeniskelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}

                            </span>

                            <div class="small text-muted mb-3">

                                {{ $d->alamat ?? 'Alamat belum diisi' }}

                            </div>

                            <div class="d-flex justify-content-center">

                                <a href="{{ route('siswa.show',$d->id) }}"
                                   class="btn btn-info btn-sm mx-1">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('siswa.edit',$d->id) }}"
                                   class="btn btn-warning btn-sm mx-1 text-white">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('siswa.destroy',$d->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm mx-1">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    @endforeach

</div>

<style>

.rounded-xl{
    border-radius:25px;
}

.rounded-lg{
    border-radius:15px;
}

.siswa-card{
    transition:0.3s;
}

.siswa-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,0.1);
}

</style>

@endsection