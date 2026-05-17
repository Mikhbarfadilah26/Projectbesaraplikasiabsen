@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0 font-weight-bold">
                <i class="fas fa-user-plus mr-2"></i>
                Tambah Siswa
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('siswa.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- FOTO --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        Foto
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control custom-input">

                </div>

                {{-- NIS --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        NIS
                    </label>

                    <input type="text"
                           name="nis"
                           class="form-control custom-input"
                           placeholder="Masukkan NIS"
                           required>

                </div>

                {{-- NAMA --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        Nama Siswa
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control custom-input"
                           placeholder="Masukkan Nama Siswa"
                           required>

                </div>

                {{-- PASSWORD --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        Password
                    </label>

                    <div class="input-group">

                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control custom-input"
                               placeholder="Masukkan Password"
                               required>

                        <div class="input-group-append">

                            <button type="button"
                                    class="btn btn-outline-secondary"
                                    id="togglePassword">

                                <i class="fas fa-eye"></i>

                            </button>

                        </div>

                    </div>

                </div>

                {{-- JENIS KELAMIN --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        Jenis Kelamin
                    </label>

                    <select name="jeniskelamin"
                            class="form-control custom-input"
                            required>

                        <option value="">
                            Pilih Jenis Kelamin
                        </option>

                        <option value="L">
                            Laki-laki
                        </option>

                        <option value="P">
                            Perempuan
                        </option>

                    </select>

                </div>

                {{-- KELAS --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        Kelas
                    </label>

                    <select name="kelasid"
                            class="form-control custom-input"
                            required>

                        <option value="">
                            Pilih Kelas
                        </option>

                        @foreach($kelas as $k)

                            <option value="{{ $k->id }}">

                                {{ $k->namakelas }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- ALAMAT --}}
                <div class="form-group">

                    <label class="font-weight-bold">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              class="form-control custom-input"
                              rows="4"
                              placeholder="Masukkan alamat siswa"></textarea>

                </div>

                {{-- BUTTON --}}
                <button type="submit"
                        class="btn btn-primary px-4 shadow-sm">

                    <i class="fas fa-save mr-1"></i>
                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

<style>

    .custom-input{
        border-radius: 12px;
        border: 1px solid #dcdcdc;
        transition: all 0.25s ease;
        box-shadow: none;
    }

    .custom-input:focus{
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.15);
        transform: scale(1.01);
    }

    .card{
        border-radius: 18px;
        overflow: hidden;
    }

    .btn{
        border-radius: 10px;
    }

</style>

<script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('password');

    togglePassword.addEventListener('click', function () {

        const type =
            password.getAttribute('type') === 'password'
            ? 'text'
            : 'password';

        password.setAttribute('type', type);

        this.innerHTML =
            type === 'password'
            ? '<i class="fas fa-eye"></i>'
            : '<i class="fas fa-eye-slash"></i>';
    });

</script>

@endsection