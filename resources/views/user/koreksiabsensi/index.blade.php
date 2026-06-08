@extends('layouts.appadmin')

@section('content')

<style>
    /* =========================================
       STYLE BUTTON ABSENSI INTERAKTIF
    ==========================================*/
    .absensi-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .radio-absen {
        display: none;
    }

    .btn-absensi {
        border: none;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
        min-width: 75px;
        text-align: center;
        cursor: pointer;
        position: relative;
    }

    .btn-absensi:hover {
        opacity: 0.90;
        transform: translateY(-1px);
    }

    .btn-hadir { background: #16a34a; }
    .btn-izin { background: #f59e0b; }
    .btn-sakit { background: #0ea5e9; }
    .btn-alpha { background: #dc2626; }

    /* =========================================
       TANDA JIKA DIPILIH (CHECKED)
    ==========================================*/
    .radio-absen:checked+.btn-absensi {
        transform: scale(1.05);
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.15);
    }

    .radio-absen:checked+.btn-absensi::after {
        content: "✓";
        position: absolute;
        top: -6px;
        right: -6px;
        width: 18px;
        height: 18px;
        background: white;
        color: #111;
        border-radius: 50%;
        font-size: 11px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-weight-bold mb-1">Koreksi Data Absensi</h4>
            <small class="text-muted">
                Halaman khusus untuk mengubah atau memperbaiki data absensi siswa yang salah input.
            </small>
        </div>
    </div>

    {{-- FLASH MESSAGES --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
        </div>
    @endif

    {{-- BLOCK FILTER CANTIK --}}
    <div class="card shadow-sm mb-4 border-0" style="border-radius: 15px;">
        <div class="card-body p-4">
            <form method="GET" action="{{ route('koreksi.absensi.index') }}">
                <div class="row">
                    {{-- JURUSAN --}}
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold text-dark">Jurusan</label>
                        <select name="jurusanid" id="jurusanid" class="form-control text-dark" style="border-radius: 10px;">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach($jurusan as $j)
                                <option value="{{ $j->id }}" {{ request('jurusanid') == $j->id ? 'selected' : '' }}>
                                    {{ $j->namajurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- KELAS --}}
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold text-dark">Kelas</label>
                        <select name="kelasid" id="kelasid" class="form-control text-dark" style="border-radius: 10px;">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" data-jurusan="{{ $k->jurusanid }}" {{ request('kelasid') == $k->id ? 'selected' : '' }}>
                                    {{ $k->namakelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- TANGGAL --}}
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold text-dark">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ request('tanggal') ?? date('Y-m-d') }}" class="form-control text-dark" style="border-radius: 10px;">
                    </div>

                    {{-- BUTTON SUBMIT --}}
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 font-weight-bold" style="border-radius: 10px; padding: 10px;">
                            <i class="fas fa-filter mr-1"></i> Tampilkan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- MAIN TABLE DATA --}}
    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th width="60" class="py-3">No</th>
                        <th class="text-left py-3">Siswa</th>
                        <th width="140" class="py-3">Tanggal</th>
                        <th width="160" class="py-3">Status Saat Ini</th>
                        <th width="420" class="py-3">Koreksi Menjadi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $no => $d)
                        <tr>
                            <td class="text-center font-weight-bold text-muted">{{ $no + 1 }}</td>
                            <td class="font-weight-bold text-dark py-3">
                                {{ $d->siswa->nama }}
                                <div class="small text-muted font-weight-normal mt-1">
                                    Kelas: {{ $d->siswa->kelas->namakelas ?? '-' }}
                                </div>
                            </td>
                            <td class="text-center font-weight-bold text-secondary">
                                {{ \Carbon\Carbon::parse($d->tanggal)->format('d-m-Y') }}
                            </td>
                            {{-- BADGE STATUS LAMA --}}
                            <td class="text-center">
                                @php
                                    $badge = match($d->status) {
                                        'hadir' => 'success',
                                        'izin' => 'warning',
                                        'sakit' => 'info',
                                        'alpha' => 'danger',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $badge }} text-white px-3 py-2 w-75" style="border-radius: 6px;">
                                    {{ strtoupper($d->status) }}
                                </span>
                            </td>
                            {{-- FORM KOREKSI DENGAN INTEGRATED SUBMIT --}}
                            <td>
                                <form method="POST" action="{{ route('koreksi.absensi.update', $d->id) }}">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-between">
                                        
                                        <div class="absensi-wrapper">
                                            @foreach(['hadir' => 'btn-hadir', 'izin' => 'btn-izin', 'sakit' => 'btn-sakit', 'alpha' => 'btn-alpha'] as $statusKey => $btnClass)
                                                <label class="m-0">
                                                    <input type="radio" 
                                                           name="status" 
                                                           value="{{ $statusKey }}" 
                                                           class="radio-absen"
                                                           {{ $d->status == $statusKey ? 'checked' : '' }}
                                                           onchange="this.form.submit()"> {{-- Otomatis simpan saat diklik! --}}
                                                    <span class="btn-absensi {{ $btnClass }}">
                                                        {{ ucfirst($statusKey) }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>

                                        {{-- Fallback button jika auto-submit terhambat --}}
                                        <button type="submit" class="btn btn-sm btn-light border ml-1 text-muted d-none d-md-block" title="Simpan Manual">
                                            <i class="fas fa-save"></i>
                                        </button>

                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-5">
                                <div class="mb-2"><i class="fas fa-folder-open fa-3x text-light"></i></div>
                                Tidak ada data absensi ditemukan. Silahkan tentukan filter pencarian Anda di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- DEPENDENT DROP-DOWN SCRIPT (JURUSAN -> KELAS) --}}
<script>
    const jurusanSelect = document.getElementById('jurusanid');
    const kelasSelect = document.getElementById('kelasid');

    function filterKelas() {
        const jurusanId = jurusanSelect.value;
        const selectedKelas = kelasSelect.value;

        for (let option of kelasSelect.options) {
            if (option.value === '') {
                option.hidden = false;
                continue;
            }

            const jurusanOption = option.getAttribute('data-jurusan');

            if (jurusanId === '' || jurusanOption === jurusanId) {
                option.hidden = false;
            } else {
                option.hidden = true;
                if (option.value === selectedKelas) {
                    kelasSelect.value = '';
                }
            }
        }
    }

    jurusanSelect.addEventListener('change', filterKelas);
    window.addEventListener('load', filterKelas);
</script>

@endsection