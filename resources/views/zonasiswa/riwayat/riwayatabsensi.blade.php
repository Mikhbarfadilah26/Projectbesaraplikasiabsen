@extends('layouts.appsiswa')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="font-weight-bold">Riwayat Kehadiranmu 📜</h4>
        <button class="btn btn-outline-primary btn-sm rounded-pill px-3">
            <i class="fas fa-download mr-1"></i> Cetak Laporan
        </button>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-4 py-3">Tanggal</th>
                            <th class="border-0 py-3">Jam Masuk</th>
                            <th class="border-0 py-3">Status Masuk</th>
                            <th class="border-0 py-3">Jam Pulang</th>
                            <th class="border-0 py-3">Status Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $row)
                        <tr>
                            <td class="px-4 font-weight-bold">{{ \Carbon\Carbon::parse($row->tanggal)->isoFormat('D MMM YYYY') }}</td>
                            <td>{{ $row->jam_masuk ?? '--:--' }}</td>
                            <td>
                                <span class="badge badge-pill 
                                    {{ $row->status_masuk == 'hadir' ? 'badge-success' : ($row->status_masuk == 'alpha' ? 'badge-danger' : 'badge-warning') }}">
                                    {{ ucfirst($row->status_masuk) }}
                                </span>
                            </td>
                            <td>{{ $row->jam_pulang ?? '--:--' }}</td>
                            <td>
                                <span class="badge badge-pill 
                                    {{ $row->status_pulang == 'hadir' ? 'badge-primary' : 'badge-secondary' }}">
                                    {{ $row->status_pulang ? ucfirst($row->status_pulang) : 'Belum Pulang' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada riwayat absensi. Semangat! 🚀</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection