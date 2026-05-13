

@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 font-weight-bold text-primary">
                Data User
            </h5>

            <a href="{{ route('user.create') }}"
               class="btn btn-primary shadow-sm">

                <i class="fas fa-plus mr-2"></i>
                Tambah User

            </a>
        </div>

        <div class="card-body p-0">

            @if(session('success'))
                <div class="alert alert-success m-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="bg-light">

                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th class="text-center">Foto</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center" width="20%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $d)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">

                                @if($d->foto)

                                    <img src="{{ asset('storage/'.$d->foto) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit: cover; border-radius: 50%;">

                                @else

                                    <img src="{{ asset('dist/img/default.png') }}"
                                         width="60"
                                         height="60"
                                         style="object-fit: cover; border-radius: 50%;">

                                @endif

                            </td>

                            <td class="font-weight-bold">
                                {{ $d->nama }}
                            </td>

                            <td>
                                {{ $d->username }}
                            </td>

                            <td>

                                <span class="badge {{ $d->role == 'admin' ? 'badge-success' : 'badge-info' }} px-3 py-2">

                                    {{ ucfirst($d->role) }}

                                </span>

                            </td>

                            <td class="text-center">

                                <a href="{{ route('user.show', $d->id) }}"
                                   class="btn btn-info btn-sm text-white">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('user.edit', $d->id) }}"
                                   class="btn btn-warning btn-sm text-white">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('user.destroy', $d->id) }}"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-4 text-muted">

                                Belum ada data user.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
@endsection