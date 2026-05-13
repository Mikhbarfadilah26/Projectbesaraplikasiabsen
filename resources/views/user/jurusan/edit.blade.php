@extends('layouts.appadmin')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <h5 class="mb-0 font-weight-bold">
                Edit Jurusan
            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('jurusan.update', $jurusan->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="font-weight-bold">
                        Nama Jurusan
                    </label>

                    <input type="text"
                           name="namajurusan"
                           value="{{ $jurusan->namajurusan }}"
                           class="form-control"
                           required>

                </div>

                <button class="btn btn-primary rounded-pill px-4">

                    <i class="fas fa-save mr-1"></i>
                    Update

                </button>

                <a href="{{ route('jurusan.index') }}"
                   class="btn btn-secondary rounded-pill px-4">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection