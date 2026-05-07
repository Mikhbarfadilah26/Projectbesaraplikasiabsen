@extends('layouts.appsiswa')

@section('content')
<style>
    .absensi-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .time-display {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-absen {
        border-radius: 50px;
        padding: 15px 40px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s;
    }

    .btn-absen:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .status-badge {
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 0.9rem;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h3 class="font-weight-bold mb-4">Presensi Digital Siswa 📱</h3>

            <div class="absensi-card p-5">
                <!-- Live Clock -->
                <div class="mb-2 text-muted font-weight-bold">Waktu Saat Ini</div>
                <div id="clock" class="time-display mb-4">00:00:00</div>
                <p class="text-muted mb-5">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}</p>

                <div class="row">
                    {{-- TOMBOL ABSEN MASUK --}}
                    <div class="col-md-6 mb-4">
                        <div class="p-3 border rounded-lg">
                            <h6><i class="fas fa-sign-in-alt text-success mb-2"></i><br>Absen Masuk</h6>
                            @if(!isset($absen) || $absen->status_masuk == null)
                            <form action="{{ route('siswa.absensi.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="masuk">
                                <button type="submit" class="btn btn-success btn-absen w-100">Klik Masuk</button>
                            </form>
                            @else
                            <div class="status-badge bg-light-success text-success border-success border">
                                Sudah Masuk: <strong>{{ $absen->jam_masuk }}</strong>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- TOMBOL ABSEN PULANG --}}
                    <div class="col-md-6 mb-4">
                        <div class="p-3 border rounded-lg">
                            <h6><i class="fas fa-sign-out-alt text-danger mb-2"></i><br>Absen Pulang</h6>
                            @if(isset($absen) && $absen->status_masuk != null && $absen->status_pulang == null)
                            <form action="{{ route('siswa.absensi.update', $absen->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="type" value="pulang">
                                <button type="submit" class="btn btn-danger btn-absen w-100">Klik Pulang</button>
                            </form>
                            @elseif(isset($absen) && $absen->status_pulang != null)
                            <div class="status-badge bg-light-danger text-danger border-danger border">
                                Sudah Pulang: <strong>{{ $absen->jam_pulang }}</strong>
                            </div>
                            @else
                            <button class="btn btn-secondary btn-absen w-100" disabled title="Harus absen masuk dulu">Terkunci</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <a href="/siswa/dashboard" class="btn btn-link text-muted mt-4">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const clock = document.getElementById('clock');
        clock.textContent = now.toLocaleTimeString('id-ID', {
            hour12: false
        });
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endsection