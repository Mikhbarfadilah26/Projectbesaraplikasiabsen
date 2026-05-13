@extends('layouts.appadmin')

@section('content')

<div class="container">

    <h4>Tambah Jadwal Absensi</h4>

    <form action="{{ route('jadwalabsensi.store') }}"
          method="POST">

        @csrf

        <select name="hari" class="form-control mb-2" required>

            <option value="">-- Pilih Hari --</option>

            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>

        </select>

        <label>Jam Masuk</label>
        <input type="time"
               name="jam_masuk"
               class="form-control mb-2"
               required>

        <label>Batas Telat</label>
        <input type="time"
               name="batas_telat"
               class="form-control mb-2"
               required>

        <label>Jam Pulang</label>
        <input type="time"
               name="jam_pulang"
               class="form-control mb-3"
               required>

        <button class="btn btn-success">

            Simpan

        </button>

    </form>

</div>

@endsection