@extends('layouts.appguru')

@section('content')
<div class="container">

    <h4 class="mb-3">Edit Data Siswa</h4>

    {{-- VALIDASI ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- NIS --}}
        <div class="form-group mb-2">
            <label>NIS</label>
            <input type="text" name="nis" value="{{ $siswa->nis }}" class="form-control" required>
        </div>

        {{-- NAMA --}}
        <div class="form-group mb-2">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" required>
        </div>

        {{-- JENIS KELAMIN (🔥 WAJIB ADA) --}}
        <div class="form-group mb-2">
            <label>Jenis Kelamin</label>
            <select name="jeniskelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ $siswa->jeniskelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->jeniskelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- KELAS --}}
        <div class="form-group mb-2">
            <label>Kelas</label>
            <select name="kelasid" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ $siswa->kelasid == $k->id ? 'selected' : '' }}>
                        {{ $k->namakelas }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- ALAMAT --}}
        <div class="form-group mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $siswa->alamat }}</textarea>
        </div>

        {{-- BUTTON --}}
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection