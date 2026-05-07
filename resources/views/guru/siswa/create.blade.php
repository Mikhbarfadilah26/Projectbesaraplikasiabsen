@extends('layouts.appguru')

@section('content')
<div class="container">

    <h4 class="mb-3">Tambah Siswa</h4>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <input type="text" name="nis" placeholder="NIS" class="form-control mb-2" required>
        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>

        {{-- JENIS KELAMIN --}}
        <select name="jeniskelamin" class="form-control mb-2" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        {{-- KELAS --}}
        <select name="kelasid" class="form-control mb-2" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->namakelas }}</option>
            @endforeach
        </select>

        {{-- ALAMAT --}}
        <textarea name="alamat" class="form-control mb-2" placeholder="Alamat"></textarea>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection