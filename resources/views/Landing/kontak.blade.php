@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Hubungi Kami</h2>
        <p class="text-muted">Silakan kirim pesan jika ada kendala.</p>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4">

                    <form action="#" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Anda" required>
                        </div>

                        <div class="form-group">
                            <label>Subjek</label>
                            <input type="text" class="form-control" placeholder="Subjek pesan" required>
                        </div>

                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control" rows="4" placeholder="Tulis pesan..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">
                            Kirim Pesan
                        </button>

                    </form>

                </div>
            </div>

            <div class="text-center mt-4 text-muted small">
                Atau hubungi: info@smkn1karangbaru.sch.id
            </div>

        </div>

    </div>

</div>

@endsection