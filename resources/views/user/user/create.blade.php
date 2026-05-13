@extends('layouts.appadmin')

@section('content')
<div class="container">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Tambah User
            </h5>
        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>

                </div>

            @endif

            <form action="{{ route('user.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Nama</label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama user"
                           value="{{ old('nama') }}">
                </div>

                <div class="mb-3">
                    <label>Username</label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Masukkan username"
                           value="{{ old('username') }}">
                </div>

                <div class="mb-3">
                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password">
                </div>

                <div class="mb-3">

                    <label>Foto</label>

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/*"
                           onchange="previewFoto(event)">

                    <img id="preview"
                         class="mt-3 rounded shadow-sm"
                         width="130"
                         height="130"
                         style="display:none; object-fit:cover;">

                </div>

                <div class="mb-3">

                    <label>Role</label>

                    <select name="role" class="form-control">

                        <option value="">-- Pilih Role --</option>

                        <option value="admin">
                            Admin
                        </option>

                        <option value="guru">
                            Guru
                        </option>

                    </select>

                </div>

                <button type="submit" class="btn btn-success">

                    <i class="fas fa-save mr-1"></i>
                    Simpan

                </button>

                <a href="{{ route('user.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<script>
function previewFoto(event)
{
    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(event.target.files[0]);

    preview.style.display = 'block';
}
</script>

@endsection