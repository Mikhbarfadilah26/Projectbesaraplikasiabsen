@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">

            Edit Hari Libur

        </div>

        <div class="card-body">

            <form action="{{ route('libur.update', $data->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>Tanggal</label>

                    <input type="date"
                           name="tanggal"
                           value="{{ $data->tanggal }}"
                           class="form-control">

                </div>

                <div class="form-group">

                    <label>Keterangan</label>

                    <input type="text"
                           name="keterangan"
                           value="{{ $data->keterangan }}"
                           class="form-control">

                </div>

                <div class="form-group">

                    <label>Jenis Libur</label>

                    <select name="jenis"
                            class="form-control">

                        <option value="nasional"
                            {{ $data->jenis == 'nasional' ? 'selected' : '' }}>

                            Libur Nasional

                        </option>

                        <option value="sekolah"
                            {{ $data->jenis == 'sekolah' ? 'selected' : '' }}>

                            Libur Sekolah

                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select name="aktif"
                            class="form-control">

                        <option value="1"
                            {{ $data->aktif ? 'selected' : '' }}>

                            Aktif

                        </option>

                        <option value="0"
                            {{ !$data->aktif ? 'selected' : '' }}>

                            Nonaktif

                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

@endsection