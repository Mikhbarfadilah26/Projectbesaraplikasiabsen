@extends('layouts.appadmin')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Tambah Absensi
        </div>

        <div class="card-body">
            <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Siswa</label>
                <select name="siswaid" class="form-control">
                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
            </div>

            <div class="form-group">
                <label>Status Masuk</label>
                <select name="status_masuk" class="form-control">
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="alpha">Alpha</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jam Masuk</label>
                <input type="time" name="jam_masuk" class="form-control">
            </div>

            <div class="form-group">
                <label>Status Pulang</label>
                <select name="status_pulang" class="form-control">
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="alpha">Alpha</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jam Pulang</label>
                <input type="time" name="jam_pulang" class="form-control">
            </div>

            <div class="form-group">
                <label>Tahun Ajaran</label>
                <select name="tahunid" class="form-control">
                    @foreach($tahun as $t)
                        <option value="{{ $t->id }}">{{ $t->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="semesterid" class="form-control">
                    @foreach($semester as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success mt-3">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('absensi.index') }}" class="btn btn-secondary mt-3">
                Kembali
            </a>

            </form>
        </div>
    </div>

</div>
@endsection