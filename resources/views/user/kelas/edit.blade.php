@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h4>Edit Kelas</h4>

    <form action="{{ route('kelas.update',$kelas->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- TINGKAT --}}
        <select name="tingkat"
                class="form-control mb-3"
                required>

            <option value="X" {{ $kelas->tingkat == 'X' ? 'selected' : '' }}>
                X
            </option>

            <option value="XI" {{ $kelas->tingkat == 'XI' ? 'selected' : '' }}>
                XI
            </option>

            <option value="XII" {{ $kelas->tingkat == 'XII' ? 'selected' : '' }}>
                XII
            </option>

        </select>

        {{-- JURUSAN --}}
        <select name="jurusanid"
                class="form-control mb-3"
                required>

            @foreach($jurusan as $j)

                <option value="{{ $j->id }}"
                    {{ $kelas->jurusanid == $j->id ? 'selected' : '' }}>

                    {{ $j->namajurusan }}

                </option>

            @endforeach

        </select>

        <button class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection