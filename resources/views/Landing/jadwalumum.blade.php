@extends('layouts.applanding')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="font-weight-bold">Jadwal Umum</h2>
        <p class="text-muted">Jadwal kegiatan sekolah</p>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Senin - Upacara & Pembelajaran</h5>
                    <p class="mb-0 text-muted">
                        07:00 - 15:00 WIB
                    </p>
                </div>
            </div>

            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Selasa - Jumat - KBM Normal</h5>
                    <p class="mb-0 text-muted">
                        07:30 - 15:00 WIB
                    </p>
                </div>
            </div>

            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="font-weight-bold">Sabtu - Kegiatan Ekstrakurikuler</h5>
                    <p class="mb-0 text-muted">
                        08:00 - 12:00 WIB
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection