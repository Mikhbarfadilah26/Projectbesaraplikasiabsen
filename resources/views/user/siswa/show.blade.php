@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-xl overflow-hidden">

                {{-- HEADER --}}
                <div class="card-header text-center py-5"
                     style="background: linear-gradient(135deg, #2563eb, #1e40af);">

                    @if($siswa->foto)

                        <img src="{{ Storage::url($siswa->foto) }}"
                             width="150"
                             height="150"
                             style="object-fit:cover;border-radius:50%;border:5px solid white;">

                    @else

                        <img src="{{ asset('dist/img/default.png') }}"
                             width="150"
                             height="150"
                             style="object-fit:cover;border-radius:50%;border:5px solid white;">

                    @endif

                    <h3 class="text-white font-weight-bold mt-3 mb-1">
                        {{ $siswa->nama }}
                    </h3>

                    <p class="text-white-50 mb-0">
                        NIS : {{ $siswa->nis }}
                    </p>

                </div>

                {{-- BODY --}}
                <div class="card-body p-5">

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <div class="info-box">

                                <label>Jenis Kelamin</label>

                                <h5>
                                    {{ $siswa->jeniskelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </h5>

                            </div>

                        </div>

                        <div class="col-md-6 mb-4">

                            <div class="info-box">

                                <label>Kelas</label>

                                <h5>
                                    {{ $siswa->kelas->tingkat ?? '-' }}
                                    -
                                    {{ $siswa->kelas->jurusan->namajurusan ?? '-' }}
                                </h5>

                            </div>

                        </div>

                        <div class="col-12">

                            <div class="info-box">

                                <label>Alamat</label>

                                <p class="mb-0">
                                    {{ $siswa->alamat ?? 'Alamat belum diisi' }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="mt-4 text-center">

                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                           class="btn btn-warning px-4 text-white">

                            <i class="fas fa-edit mr-1"></i>
                            Edit

                        </a>

                        <a href="{{ route('siswa.index') }}"
                           class="btn btn-secondary px-4">

                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    .rounded-xl {
        border-radius: 25px;
    }

    .info-box {
        background: #f8fafc;
        padding: 20px;
        border-radius: 18px;
        border: 1px solid #e5e7eb;
    }

    .info-box label {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 5px;
        display: block;
    }

    .info-box h5 {
        font-weight: 700;
        margin: 0;
        color: #0f172a;
    }

</style>

@endsection