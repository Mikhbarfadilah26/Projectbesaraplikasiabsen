@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h4>Edit Jadwal Absensi</h4>

    <form action="{{ route('jadwalabsensi.update',$jadwal->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <input type="text"
               name="hari"
               value="{{ $jadwal->hari }}"
               class="form-control mb-2"
               required>

        <input type="time"
               name="jam_masuk"
               value="{{ $jadwal->jam_masuk }}"
               class="form-control mb-2"
               required>

        <input type="time"
               name="batas_telat"
               value="{{ $jadwal->batas_telat }}"
               class="form-control mb-2"
               required>

        <input type="time"
               name="jam_pulang"
               value="{{ $jadwal->jam_pulang }}"
               class="form-control mb-3"
               required>

        <button class="btn btn-primary">

            Update

        </button>

    </form>

</div>

@endsection