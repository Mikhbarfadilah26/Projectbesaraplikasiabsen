@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h5>Edit Tahun Ajaran</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('tahunajaran.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text"
                           name="tahun"
                           class="form-control"
                           value="{{ $data->tahun }}"
                           required>
                </div>

                <button class="btn btn-primary mt-3">
                    Update
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