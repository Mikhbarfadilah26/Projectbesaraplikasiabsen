@extends('layouts.appguru')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h5>Tambah Tahun Ajaran</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('tahunajaran.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text"
                           name="tahun"
                           class="form-control"
                           placeholder="contoh: 2025/2026"
                           required>
                </div>

                <button class="btn btn-success mt-3">
                    Simpan
                </button>

                <a href="{{ route('tahunajaran.index') }}"
                   class="btn btn-secondary mt-3">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection