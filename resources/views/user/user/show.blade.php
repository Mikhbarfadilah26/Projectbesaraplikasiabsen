{{-- resources/views/user/user/show.blade.php --}}

@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Detail User
            </h5>

        </div>

        <div class="card-body">

            <div class="text-center mb-4">

                @if($data->foto)

                    <img src="{{ asset('storage/'.$data->foto) }}"
                         width="150"
                         height="150"
                         style="object-fit: cover; border-radius: 50%; border:4px solid #e5e7eb;">

                @else

                    <img src="{{ asset('dist/img/default.png') }}"
                         width="150"
                         height="150"
                         style="object-fit: cover; border-radius: 50%; border:4px solid #e5e7eb;">

                @endif

            </div>

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
                    <td>

                        <span class="badge {{ $data->role == 'admin' ? 'badge-success' : 'badge-info' }} px-3 py-2">

                            {{ ucfirst($data->role) }}

                        </span>

                    </td>
                </tr>

                <tr>
                    <th>Dibuat</th>
                    <td>
                        {{ $data->created_at->format('d M Y H:i') }}
                    </td>
                </tr>

            </table>

            <a href="{{ route('user.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left mr-1"></i>
                Kembali

            </a>

        </div>

    </div>

</div>

@endsection