@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">

            Tambah Hari Libur

        </div>

        <div class="card-body">

            <form action="{{ route('libur.store') }}"
                  method="POST">

                @csrf

                <div class="form-group">

                    <label>Tanggal</label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Keterangan</label>

                    <input type="text"
                           name="keterangan"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Jenis Libur</label>

                    <select name="jenis"
                            class="form-control">

                        <option value="nasional">
                            Libur Nasional
                        </option>

                        <option value="sekolah">
                            Libur Sekolah
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select name="aktif"
                            class="form-control">

                        <option value="1">
                            Aktif
                        </option>

                        <option value="0">
                            Nonaktif
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection