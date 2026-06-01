
@extends('layouts.appsiswa')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <div class="col-sm-6">
                <h1 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">
                    <i class="fas fa-file-invoice text-primary mr-2"></i>Laporan Absensi Siswa
                </h1>
                <p class="text-muted mb-0">Pantau dan cetak riwayat kehadiran Anda secara real-time</p>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        {{-- AREA FILTER DATA --}}
        <form method="GET" action="{{ route('siswa.laporan') }}">
            <div class="card shadow-sm border-0 rounded-lg mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        
                        {{-- FILTER TANGGAL --}}
                        <div class="col-md-4 mb-3 mb-md-0">
                            <label class="font-weight-bold text-secondary mb-2 small text-uppercase tracking-wider">
                                <i class="far fa-calendar-alt mr-1"></i> Filter Tanggal
                            </label>
                            <input type="date" 
                                   name="tanggal" 
                                   value="{{ request('tanggal') }}" 
                                   class="form-control form-control-lg custom-input">
                        </div>

                        {{-- FILTER STATUS --}}
                        <div class="col-md-4 mb-3 mb-md-0">
                            <label class="font-weight-bold text-secondary mb-2 small text-uppercase tracking-wider">
                                <i class="fas fa-filter mr-1"></i> Filter Status Kehadiran
                            </label>
                            <select name="status" class="form-control form-control-lg custom-input">
                                <option value="">Semua Status Kehadiran</option>
                                <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ request('status') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                                <option value="cabut" {{ request('status') == 'cabut' ? 'selected' : '' }}>Cabut</option>
                            </select>
                        </div>

                        {{-- TOMBOL AKSI --}}
                        <div class="col-md-4 d-flex align-items-end pt-2">
                            <button type="submit" class="btn btn-primary btn-lg px-4 mr-2 shadow-sm flex-fill custom-btn">
                                <i class="fas fa-search mr-2"></i> Cari Data
                            </button>
                            <a href="{{ route('cetak.laporan', request()->query()) }}" 
                               target="_blank" 
                               class="btn btn-success btn-lg px-4 shadow-sm flex-fill custom-btn">
                                <i class="fas fa-print mr-2"></i> Cetak PDF
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        {{-- RINGKASAN STATISTIK (INFO-BOX PREMIUM) --}}
        <div class="row mb-4">
            
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <div class="info-box shadow-sm border-0 stat-card">
                    <span class="info-box-icon bg-success-light text-success rounded-lg"><i class="fas fa-check-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-muted text-uppercase font-weight-bold small">Hadir</span>
                        <span class="info-box-number h3 mb-0 font-weight-bold">
                            {{ isset($laporan) ? $laporan->where('status', 'hadir')->count() : 0 }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <div class="info-box shadow-sm border-0 stat-card">
                    <span class="info-box-icon bg-warning-light text-warning rounded-lg"><i class="fas fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-muted text-uppercase font-weight-bold small">Izin</span>
                        <span class="info-box-number h3 mb-0 font-weight-bold">
                            {{ isset($laporan) ? $laporan->where('status', 'izin')->count() : 0 }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="info-box shadow-sm border-0 stat-card">
                    <span class="info-box-icon bg-info-light text-info rounded-lg"><i class="fas fa-first-aid"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-muted text-uppercase font-weight-bold small">Sakit</span>
                        <span class="info-box-number h3 mb-0 font-weight-bold">
                            {{ isset($laporan) ? $laporan->where('status', 'sakit')->count() : 0 }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="info-box shadow-sm border-0 stat-card">
                    <span class="info-box-icon bg-danger-light text-danger rounded-lg"><i class="fas fa-times-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-muted text-uppercase font-weight-bold small">Alpha</span>
                        <span class="info-box-number h3 mb-0 font-weight-bold">
                            {{ isset($laporan) ? $laporan->where('status', 'alpha')->count() : 0 }}
                        </span>
                    </div>
                </div>
            </div>

        </div>

        {{-- TABEL UTAMA --}}
        <div class="card shadow border-0 rounded-lg overflow-hidden">
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <h5 class="font-weight-bold text-dark mb-0">
                    <i class="fas fa-list-alt text-primary mr-2"></i> Rincian Absensi Harian
                </h5>
            </div>
            
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover align-middle mb-0 custom-table">
                    <thead>
                        <tr class="text-secondary text-uppercase tracking-wider small">
                            <th width="8%" class="text-center font-weight-bold py-3">No</th>
                            <th width="25%" class="font-weight-bold py-3">Tanggal</th>
                            <th width="22%" class="text-center font-weight-bold py-3">Status</th>
                            <th width="45%" class="font-weight-bold py-3">Keterangan / Konfirmasi Guru</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($laporan ?? [] as $item)
                        <tr>
                            <td class="text-center font-weight-bold text-muted">{{ $loop->iteration }}</td>
                            <td class="font-weight-bold text-dark">
                                <i class="far fa-calendar text-muted mr-2"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </td>
                            <td class="text-center">
                                @switch($item->status)
                                    @case('hadir')
                                        <span class="badge custom-badge badge-success-light text-success"><i class="fas fa-circle mr-1 small"></i> HADIR</span>
                                        @break
                                    @case('izin')
                                        <span class="badge custom-badge badge-warning-light text-warning"><i class="fas fa-circle mr-1 small"></i> IZIN</span>
                                        @break
                                    @case('sakit')
                                        <span class="badge custom-badge badge-info-light text-info"><i class="fas fa-circle mr-1 small"></i> SAKIT</span>
                                        @break
                                    @case('cabut')
                                        <span class="badge custom-badge badge-dark-light text-dark-badge"><i class="fas fa-circle mr-1 small"></i> CABUT</span>
                                        @break
                                    @default
                                        <span class="badge custom-badge badge-danger-light text-danger"><i class="fas fa-circle mr-1 small"></i> ALPHA</span>
                                @endswitch
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-2">
                                        <i class="fas fa-user-tie text-secondary"></i>
                                    </div>
                                    <span class="text-secondary font-weight-medium">
                                        {{ $item->guru->name ?? 'Dikonfirmasi oleh Sistem' }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <div class="mb-3"><i class="fas fa-folder-open fa-3x text-muted opacity-5"></i></div>
                                <h5>Belum Ada Riwayat Absensi</h5>
                                <p class="small mb-0">Data absensi Anda pada filter yang dipilih tidak ditemukan.</p>
                            </td>
                        </tr>
                        @endforelse

                        {{-- DATA HARI LIBUR NASIONAL / SEKOLAH --}}
                        @if(isset($libur) && $libur)
                        <tr class="holiday-row">
                            <td class="text-center text-danger font-weight-bold"><i class="fas fa-star"></i></td>
                            <td class="font-weight-bold text-danger">
                                <i class="far fa-calendar text-danger mr-2"></i>
                                {{ \Carbon\Carbon::parse($libur->tanggal)->translatedFormat('d F Y') }}
                            </td>
                            <td class="text-center">
                                <span class="badge custom-badge badge-danger text-white shadow-sm"><i class="fas fa-flag mr-1"></i> LIBUR</span>
                            </td>
                            <td class="text-danger font-weight-bold">
                                <i class="fas fa-info-circle mr-1"></i> {{ $libur->keterangan }}
                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<style>
    /* Global Card styling */
    .card { border-radius: 12px !important; }
    .custom-input { border-radius: 8px !important; border: 1px solid #e2e8f0; font-size: 15px; }
    .custom-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .custom-btn { border-radius: 8px !important; font-size: 15px; font-weight: 600; padding: 11px 20px !important; transition: all 0.2s; }
    .custom-btn:hover { transform: translateY(-1px); }

    /* Custom Info Box */
    .stat-card { border-radius: 12px !important; padding: 15px !important; min-height: 90px !important; transition: all 0.25s; }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; }
    .info-box-icon { width: 55px !important; height: 55px !important; display: flex !important; align-items: center; justify-content: center; font-size: 22px !important; }

    /* Info Box Soft Background Colors */
    .bg-success-light { background-color: #ecfdf5 !important; }
    .bg-warning-light { background-color: #fffde7 !important; }
    .bg-info-light { background-color: #f0f9ff !important; }
    .bg-danger-light { background-color: #fef2f2 !important; }
    .badge-dark-light { background-color: #f1f5f9 !important; }
    .text-dark-badge { color: #475569 !important; }

    /* Table & Badge Design */
    .custom-table thead { background-color: #f8fafc; border-bottom: 2px solid #edf2f7; }
    .custom-table tbody tr { transition: background-color 0.15s; }
    .custom-table tbody tr:hover { background-color: #f8fafc !important; }
    .custom-badge { font-size: 12px !important; padding: 6px 14px !important; border-radius: 30px !important; font-weight: 700 !important; letter-spacing: 0.3px; }
    
    /* Holiday Special Row */
    .holiday-row { background-color: #fffbeb !important; }
    .holiday-row:hover { background-color: #fef3c7 !important; }

    /* Avatar Icon wrapper */
    .avatar-sm { width: 28px; height: 28px; background: #f1f5f9; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; }
</style>

@endsection

