@extends('layouts.applanding')

@section('content')

<div class="jumbotron text-center bg-success text-white mb-0" style="padding: 4rem 2rem; background: linear-gradient(135deg, #28a745 0%, #218838 100%);">
    <div class="mb-4">
        <h1 id="jam" class="display-3 font-weight-bold mb-0">00:00:00</h1>
        <p id="tanggal" class="lead">Memuat tanggal...</p>
    </div>
    
    <hr class="my-4 border-light" style="width: 10%; border-width: 3px;">
    
    <h1 class="font-weight-bold">Sistem Absensi Digital</h1>
    <p class="lead">SMK NEGERI 1 KARANG BARU</p>
    
    <a href="{{ route('login.siswa') }}" class="btn btn-outline-light btn-lg shadow-sm font-weight-bold px-5 mt-3" style="border-radius: 50px; border-width: 2px;">
        <i class="fas fa-user-graduate mr-2"></i> LOGIN SISWA
    </a>
</div>

<div class="py-5 bg-light">
    <div class="container-fluid px-lg-5">
        <div class="row">
            
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                    <div class="card-header bg-white border-0 pt-4">
                        <h5 class="font-weight-bold text-success"><i class="fas fa-bullhorn mr-2"></i> Pengumuman</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 p-2 border-left border-success bg-white">
                            <small class="text-muted d-block">26 April 2026</small>
                            <strong class="small">Persiapan Ujian Akhir Semester</strong>
                        </div>
                        <div class="mb-3 p-2 border-left border-success bg-white">
                            <small class="text-muted d-block">24 April 2026</small>
                            <strong class="small">Jadwal Piket Kebersihan Baru</strong>
                        </div>
                        <a href="#" class="btn btn-link btn-sm text-success font-weight-bold p-0">Lihat Semua...</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4" style="border-radius: 15px;">
                    <div class="card-body">
                        <img src="https://via.placeholder.com/150x100?text=Logo+SMK" alt="Logo Sekolah" class="mb-4" style="max-height: 80px;">
                        <h4 class="font-weight-bold">Panduan Absensi</h4>
                        <p class="text-muted">Pastikan Anda berada di area sekolah saat melakukan absensi masuk. Gunakan NIS dan password yang sudah diberikan oleh wali kelas.</p>
                        
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="font-weight-bold mb-1">Masuk</h6>
                                    <small>07:00 - 08:00</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="font-weight-bold mb-1">Pulang</h6>
                                    <small>15:00 - 16:30</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                    <div class="card-header bg-white border-0 pt-4">
                        <h5 class="font-weight-bold text-danger"><i class="fas fa-headset mr-2"></i> Bantuan</h5>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted">Lupa password atau kendala sistem? Hubungi Admin RPL:</p>
                        <div class="d-flex align-items-center p-3 mb-2 bg-light rounded">
                            <i class="fab fa-whatsapp fa-2x text-success mr-3"></i>
                            <div>
                                <small class="d-block text-muted">WhatsApp Admin</small>
                                <strong class="small">08XX-XXXX-XXXX</strong>
                            </div>
                        </div>
                        <p class="x-small text-center text-muted mt-3">Tersedia pada jam kerja (08:00 - 16:00)</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function updateWaktu() {
        const sekarang = new Date();
        const jam = String(sekarang.getHours()).padStart(2, '0');
        const menit = String(sekarang.getMinutes()).padStart(2, '0');
        const detik = String(sekarang.getSeconds()).padStart(2, '0');
        document.getElementById('jam').innerHTML = `${jam}:${menit}:${detik}`;

        const opsi = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('tanggal').innerHTML = sekarang.toLocaleDateString('id-ID', opsi);
    }
    setInterval(updateWaktu, 1000);
    updateWaktu();
</script>

@endsection