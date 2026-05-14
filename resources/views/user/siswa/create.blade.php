@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h4 class="mb-3 font-weight-bold">Tambah Siswa</h4>

    <form action="{{ route('siswa.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- FOTO --}}
        <input type="file"
               name="foto"
               class="form-control mb-2">

        {{-- NIS --}}
        <input type="text"
               name="nis"
               class="form-control mb-2"
               placeholder="NIS"
               required>

        {{-- NAMA --}}
        <input type="text"
               name="nama"
               class="form-control mb-2"
               placeholder="Nama Siswa"
               required>

        {{-- PASSWORD --}}
        <input type="password"
               name="password"
               class="form-control mb-2"
               placeholder="Password"
               required>

        {{-- JENIS KELAMIN --}}
        <select name="jeniskelamin"
                class="form-control mb-2"
                required>

            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>

        </select>

        {{-- KELAS --}}
        <select name="kelasid"
                class="form-control mb-3"
                required>

            <option value="">Pilih Kelas</option>

            @foreach($kelas as $k)
<option value="{{ $k->id }}">
    {{ $k->namakelas }}
</option>

            @endforeach

        </select>

        {{-- ALAMAT --}}
        <textarea name="alamat"
                  class="form-control mb-3"
                  placeholder="Alamat"></textarea>

        {{-- BUTTON --}}
        <button type="submit"
                class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

@endsection