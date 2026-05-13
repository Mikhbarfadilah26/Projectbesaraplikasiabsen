@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h4>Tambah Kelas</h4>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        {{-- TINGKAT --}}
        <select name="tingkat"
                class="form-control mb-3"
                required>

            <option value="">-- Pilih Tingkat --</option>

            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>

        </select>

        {{-- JURUSAN --}}
        <select name="jurusanid"
                class="form-control mb-3"
                required>

            <option value="">-- Pilih Jurusan --</option>

            @foreach($jurusan as $j)
                <option value="{{ $j->id }}">
                    {{ $j->namajurusan }}
                </option>
            @endforeach

        </select>

        <button class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

@endsection