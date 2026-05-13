@extends('layouts.appadmin')

@section('content')

<style>
    .tahun-card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 10px 35px rgba(0,0,0,0.08);
    }

    .tahun-header {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        padding: 22px 28px;
        color: white;
    }

    .tahun-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0;
    }

    .btn-modern {
        border-radius: 14px;
        padding: 10px 18px;
        font-weight: 600;
        border: none;
        transition: 0.3s;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    }

    .btn-add {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
    }

    .table-modern {
        margin: 0;
    }

    .table-modern thead {
        background: #f8fafc;
    }

    .table-modern thead th {
        border: none;
        padding: 16px;
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        text-transform: uppercase;
    }

    .table-modern tbody td {
        padding: 18px 16px;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
        font-weight: 500;
        color: #334155;
    }

    .table-modern tbody tr {
        transition: 0.25s;
    }

    .table-modern tbody tr:hover {
        background: #f8fafc;
        transform: scale(1.002);
    }

    .tahun-badge {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 999px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .5px;
        box-shadow: 0 6px 15px rgba(59,130,246,.25);
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 8px 14px;
        font-weight: 600;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 8px 14px;
        font-weight: 600;
    }

    .alert-modern {
        border: none;
        border-radius: 16px;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        font-weight: 600;
        box-shadow: 0 10px 25px rgba(34,197,94,.2);
    }

    .empty-data {
        padding: 40px;
        text-align: center;
        color: #94a3b8;
        font-weight: 600;
    }

    .icon-header {
        width: 55px;
        height: 55px;
        border-radius: 18px;
        background: rgba(255,255,255,.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }
</style>

<div class="container-fluid">

    <div class="card tahun-card">

        {{-- HEADER --}}
        <div class="tahun-header d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
                <div class="icon-header mr-3">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div>
                    <h3 class="tahun-title">
                        Data Tahun Ajaran
                    </h3>

                    <small class="text-light">
                        Management data tahun ajaran sekolah
                    </small>
                </div>
            </div>

            <a href="{{ route('tahunajaran.create') }}"
               class="btn btn-modern btn-add">

                <i class="fas fa-plus-circle mr-1"></i>
                Tambah Data

            </a>

        </div>

        {{-- BODY --}}
        <div class="card-body p-0">

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-modern m-3">
                    <i class="fas fa-check-circle mr-1"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-modern">

                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Tahun Ajaran</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($data as $no => $item)

                        <tr>

                            <td>
                                <strong>{{ $no + 1 }}</strong>
                            </td>

                            <td>
                                <span class="tahun-badge">
                                    {{ $item->tahun }}
                                </span>
                            </td>

                            <td>

                                <a href="{{ route('tahunajaran.edit', $item->id) }}"
                                   class="btn btn-edit btn-sm">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <form action="{{ route('tahunajaran.destroy', $item->id) }}"
                                      method="POST"
                                      style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-delete btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini ?')">

                                        <i class="fas fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="3">

                                <div class="empty-data">

                                    <i class="fas fa-folder-open fa-3x mb-3"></i>

                                    <br>

                                    Data tahun ajaran belum tersedia

                                </div>

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