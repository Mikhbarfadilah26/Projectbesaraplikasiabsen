@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-xl overflow-hidden">

                <div class="card-header py-4"
                     style="background: linear-gradient(135deg,#2563eb,#1d4ed8);">

                    <h4 class="mb-0 text-white font-weight-bold">
                        <i class="fas fa-user-plus mr-2"></i>
                        Tambah Siswa
                    </h4>

                </div>

                <div class="card-body p-5">

                    @if ($errors->any())

                        <div class="alert alert-danger rounded-lg">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('siswa.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- FOTO --}}
                        <div class="text-center mb-4">

                            <img id="preview"
                                 src="{{ asset('dist/img/default.png') }}"
                                 width="140"
                                 height="140"
                                 style="object-fit:cover;border-radius:50%;border:5px solid #e5e7eb;">

                            <div class="mt-3">

                                <input type="file"
                                       name="foto"
                                       class="form-control"
                                       accept="image/*"
                                       onchange="previewFoto(event)">

                            </div>

                        </div>

                        <div class="row">

                            {{-- NIS --}}
                            <div class="col-md-6 mb-3">

                                <label>NIS</label>

                                <input type="text"
                                       name="nis"
                                       class="form-control rounded-lg"
                                       value="{{ old('nis') }}"
                                       required>

                            </div>

                            {{-- NAMA --}}
                            <div class="col-md-6 mb-3">

                                <label>Nama Siswa</label>

                                <input type="text"
                                       name="nama"
                                       class="form-control rounded-lg"
                                       value="{{ old('nama') }}"
                                       required>

                            </div>

                            {{-- PASSWORD --}}
                            <div class="col-md-6 mb-3">

                                <label>Password</label>

                                <input type="password"
                                       name="password"
                                       class="form-control rounded-lg"
                                       required>

                            </div>

                            {{-- JK --}}
                            <div class="col-md-6 mb-3">

                                <label>Jenis Kelamin</label>

                                <select name="jeniskelamin"
                                        class="form-control rounded-lg"
                                        required>

                                    <option value="">-- Pilih --</option>

                                    <option value="L">
                                        Laki-laki
                                    </option>

                                    <option value="P">
                                        Perempuan
                                    </option>

                                </select>

                            </div>

                            {{-- KELAS --}}
                            <div class="col-md-12 mb-3">

                                <label>Kelas</label>

                                <select name="kelasid"
                                        class="form-control rounded-lg"
                                        required>

                                    <option value="">
                                        -- Pilih Kelas --
                                    </option>

                                    @foreach($kelas as $k)

                                        <option value="{{ $k->id }}">

                                            {{ $k->tingkat }}
                                            -
                                            {{ $k->jurusan->namajurusan }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            {{-- ALAMAT --}}
                            <div class="col-md-12 mb-4">

                                <label>Alamat</label>

                                <textarea name="alamat"
                                          rows="4"
                                          class="form-control rounded-lg"></textarea>

                            </div>

                        </div>

                        <div class="text-center">

                            <button class="btn btn-primary px-5 rounded-pill">

                                <i class="fas fa-save mr-2"></i>
                                Simpan

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

<style>

.rounded-xl{
    border-radius:25px;
}

.rounded-lg{
    border-radius:15px;
}

</style>

@endsection