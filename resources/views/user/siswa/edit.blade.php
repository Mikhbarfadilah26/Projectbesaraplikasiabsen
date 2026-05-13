@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-xl overflow-hidden">

                <div class="card-header py-4"
                     style="background: linear-gradient(135deg,#f59e0b,#d97706);">

                    <h4 class="mb-0 text-white font-weight-bold">

                        <i class="fas fa-user-edit mr-2"></i>
                        Edit Siswa

                    </h4>

                </div>

                <div class="card-body p-5">

                    <form action="{{ route('siswa.update',$siswa->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- FOTO --}}
                        <div class="text-center mb-4">

                            @if($siswa->foto)

                                <img id="preview"
                                     src="{{ Storage::url($siswa->foto) }}"
                                     width="140"
                                     height="140"
                                     style="object-fit:cover;border-radius:50%;border:5px solid #e5e7eb;">

                            @else

                                <img id="preview"
                                     src="{{ asset('dist/img/default.png') }}"
                                     width="140"
                                     height="140"
                                     style="object-fit:cover;border-radius:50%;border:5px solid #e5e7eb;">

                            @endif

                            <div class="mt-3">

                                <input type="file"
                                       name="foto"
                                       class="form-control"
                                       onchange="previewFoto(event)">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>NIS</label>

                                <input type="text"
                                       name="nis"
                                       value="{{ $siswa->nis }}"
                                       class="form-control rounded-lg">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Nama</label>

                                <input type="text"
                                       name="nama"
                                       value="{{ $siswa->nama }}"
                                       class="form-control rounded-lg">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Password Baru</label>

                                <input type="password"
                                       name="password"
                                       class="form-control rounded-lg">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Jenis Kelamin</label>

                                <select name="jeniskelamin"
                                        class="form-control rounded-lg">

                                    <option value="L"
                                        {{ $siswa->jeniskelamin == 'L' ? 'selected' : '' }}>

                                        Laki-laki

                                    </option>

                                    <option value="P"
                                        {{ $siswa->jeniskelamin == 'P' ? 'selected' : '' }}>

                                        Perempuan

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label>Kelas</label>

                                <select name="kelasid"
                                        class="form-control rounded-lg">

                                    @foreach($kelas as $k)

                                        <option value="{{ $k->id }}"
                                            {{ $siswa->kelasid == $k->id ? 'selected' : '' }}>

                                            {{ $k->tingkat }}
                                            -
                                            {{ $k->jurusan->namajurusan }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-12 mb-4">

                                <label>Alamat</label>

                                <textarea name="alamat"
                                          rows="4"
                                          class="form-control rounded-lg">{{ $siswa->alamat }}</textarea>

                            </div>

                        </div>

                        <div class="text-center">

                            <button class="btn btn-warning px-5 rounded-pill text-white">

                                <i class="fas fa-save mr-2"></i>
                                Update

                            </button>

                            <a href="{{ route('siswa.index') }}"
                               class="btn btn-secondary px-5 rounded-pill">

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function previewFoto(event)
{
    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(event.target.files[0]);
}

</script>

@endsection