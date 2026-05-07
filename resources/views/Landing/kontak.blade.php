@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="text-center mb-5 animate-fade-in">
        <h2 class="fw-bold text-success">Hubungi Kami</h2>
        <p class="text-muted">Kami siap membantu! Silakan kirimkan pesan atau kendala Anda.</p>
        <div class="mx-auto" style="width: 50px; height: 3px; background: #28a745; border-radius: 10px;"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            {{-- CARD UTAMA --}}
            <div class="card shadow-lg border-0 hover-card" style="border-radius: 20px; overflow: hidden;">
                
                {{-- AKSEN ATAS --}}
                <div style="height: 8px; background: linear-gradient(90deg, #28a745, #85e085);"></div>

                <div class="card-body p-4 p-md-5">
                    <form action="#" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="fw-bold small text-muted text-uppercase mb-2">Nama Lengkap</label>
                            <div class="input-group custom-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-user text-success"></i></span>
                                </div>
                                <input type="text" class="form-control border-0 bg-light" placeholder="Masukkan nama Anda" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold small text-muted text-uppercase mb-2">Subjek Kendala</label>
                            <div class="input-group custom-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-tag text-success"></i></span>
                                </div>
                                <input type="text" class="form-control border-0 bg-light" placeholder="Contoh: Lupa Password" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold small text-muted text-uppercase mb-2">Pesan Anda</label>
                            <textarea class="form-control border-0 bg-light" rows="4" placeholder="Ceritakan detail kendala Anda..." style="border-radius: 10px;" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block py-3 fw-bold shadow-sm btn-submit">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan Sekarang
                        </button>
                    </form>
                </div>
            </div>

            {{-- INFO KONTAK ALTERNATIF --}}
            <div class="row mt-5 text-center">
                <div class="col-12">
                    <p class="text-muted mb-3">Atau hubungi kami melalui:</p>
                    <a href="mailto:info@smkn1karangbaru.sch.id" class="text-decoration-none bg-white px-4 py-2 rounded-pill shadow-sm text-success border border-success d-inline-block transition-all">
                        <i class="fas fa-envelope mr-2"></i> info@smkn1karangbaru.sch.id
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- CSS KHUSUS UNTUK EFEK "HIDUP" --}}
<style>
    /* Animasi Masuk */
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }

    /* Efek Floating pada Card */
    .hover-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(40, 167, 69, 0.15) !important;
    }

    /* Styling Input agar Terasa Modern */
    .custom-input input {
        border-radius: 0 10px 10px 0 !important;
        padding: 12px;
        transition: all 0.3s ease;
    }
    .custom-input .input-group-text {
        border-radius: 10px 0 0 10px !important;
    }
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.1);
        border: 1px solid #28a745 !important;
    }

    /* Animasi Tombol */
    .btn-submit {
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .btn-submit:hover {
        letter-spacing: 1px;
        filter: brightness(1.1);
        transform: scale(1.02);
    }

    /* Transition untuk link email */
    .transition-all:hover {
        background-color: #28a745 !important;
        color: white !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

{{-- Pastikan FontAwesome Terpasang --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection