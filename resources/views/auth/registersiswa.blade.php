@extends('layouts.applanding')

@section('content')

<style>

    body{
        background: #f3f4f6;
    }

    .register-box{
        max-width: 700px;
        margin: 50px auto;
    }

    .card-register{
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .card-header-custom{
        background: linear-gradient(135deg,#10b981,#059669);
        color: white;
        padding: 30px;
        text-align: center;
    }

    .btn-register{
        background: linear-gradient(135deg,#10b981,#059669);
        border: none;
        padding: 12px;
        border-radius: 12px;
        font-weight: bold;
    }

</style>

<div class="container">

    <div class="register-box">

        <div class="card card-register">

            <div class="card-header-custom">

                <h2>
                    Register Siswa
                </h2>

                <p class="mb-0">
                    Silahkan daftar akun siswa
                </p>

            </div>

            <div class="card-body p-4">

                {{-- ALERT ERROR --}}
                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('register.siswa.store') }}" method="POST">

                    @csrf

                    {{-- NAMA --}}
                    <div class="form-group mb-3">

                        <label>Nama Lengkap</label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Masukkan nama lengkap"
                            required
                        >

                    </div>

                    {{-- NIS --}}
                    <div class="form-group mb-3">

                        <label>NIS</label>

                        <input
                            type="text"
                            name="nis"
                            class="form-control"
                            placeholder="Masukkan NIS"
                            required
                        >

                    </div>

                    {{-- JENIS KELAMIN --}}
                    <div class="form-group mb-3">

                        <label>Jenis Kelamin</label>

                        <select
                            name="jeniskelamin"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Jenis Kelamin --
                            </option>

                            <option value="L">
                                Laki-Laki
                            </option>

                            <option value="P">
                                Perempuan
                            </option>

                        </select>

                    </div>

                    {{-- KELAS --}}
                    <div class="form-group mb-3">

                        <label>Kelas</label>

                        <select
                            name="kelasid"
                            class="form-control"
                            required
                        >

                            <option value="">
                                -- Pilih Kelas --
                            </option>

                            @foreach($kelas as $item)

                                <option value="{{ $item->id }}">

                                    {{ $item->namakelas }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- ALAMAT --}}
                    <div class="form-group mb-3">

                        <label>Alamat</label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan alamat"
                            required
                        ></textarea>

                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-group mb-4">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required
                        >

                    </div>

                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="btn btn-success btn-block btn-register"
                    >

                        <i class="fas fa-user-plus mr-2"></i>

                        Register Sekarang

                    </button>

                </form>

                {{-- LOGIN --}}
                <div class="text-center mt-4">

                    <a href="{{ route('login.siswa') }}">

                        Sudah punya akun? Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection