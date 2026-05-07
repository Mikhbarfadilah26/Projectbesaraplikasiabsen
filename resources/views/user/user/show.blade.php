@extends('layouts.appadmin')

@section('content')
<div class="container">

    <h4>Detail User</h4>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="200">Nama</th>
                    <td>{{ $data->nama }}</td>
                </tr>

                <tr>
                    <th>Username</th>
                    <td>{{ $data->username }}</td>
                </tr>

                <tr>
                    <th>Role</th>
                    <td>{{ $data->role }}</td>
                </tr>
            </table>

            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection