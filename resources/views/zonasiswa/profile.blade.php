@extends('layouts.appsiswa')

@section('title', 'Profile Siswa')

@section('content')

<style>
    .profile-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .profile-header {
        background: linear-gradient(135deg, #10b981, #059669);
        padding: 40px 20px;
        text-align: center;
        color: white;
        position: relative;
    }

    .btn-kembali {
        position: absolute;
        left: 20px;
        top: 20px;
        background: rgba(255,255,255,0.2);
        color: white;
        border-radius: 10px;
        padding: 8px 14px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-kembali:hover {
        background: rgba(255,255,255,0.3);
        color: white;
        text-decoration: none;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        font-size: 45px;
        border: 4px solid rgba(255,255,255,0.3);
    }

    .profile-name {
        margin-top: 15px;
        font-size: 24px;
        font-weight: 700;
    }

    .profile-role {
        opacity: 0.9;
        font-size: 14px;
    }

    .info-table td {
        padding: 14px 18px;
        vertical-align: middle;
    }

    .info-title {
        width: 220px;
        font-weight: 600;
        color: #374151;
    }

    .badge-status {
        background: #10b981;
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
    }
</style>

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card profile-card">

                {{-- HEADER --}}
                <div class="profile-header">

                    {{-- TOMBOL KEMBALI --}}
                    <a href="/siswa/dashboard" class="btn-kembali">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>

                    <div class="profile-avatar">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <div class="profile-name">
                        {{ $siswa->nama }}
                    </div>

                    <div class="profile-role">
                        Siswa Aktif
                    </div>

                </div>

                {{-- BODY --}}
                <div class="card-body p-0">

                    <table class="table table-borderless info-table mb-0">

                        <tr>
                            <td class="info-title">
                                <i class="fas fa-id-card mr-2 text-success"></i>
                                NIS
                            </td>

                            <td>
                                {{ $siswa->nis }}
                            </td>
                        </tr>

                        <tr>
                            <td class="info-title">
                                <i class="fas fa-user mr-2 text-primary"></i>
                                Nama Lengkap
                            </td>

                            <td>
                                {{ $siswa->nama }}
                            </td>
                        </tr>

                        <tr>
                            <td class="info-title">
                                <i class="fas fa-school mr-2 text-warning"></i>
                                Kelas
                            </td>

                            <td>
                                {{ $siswa->kelas->namakelas ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="info-title">
                                <i class="fas fa-venus-mars mr-2 text-danger"></i>
                                Jenis Kelamin
                            </td>

                            <td>
                                {{ $siswa->jeniskelamin }}
                            </td>
                        </tr>

                        <tr>
                            <td class="info-title">
                                <i class="fas fa-map-marker-alt mr-2 text-info"></i>
                                Alamat
                            </td>

                            <td>
                                {{ $siswa->alamat ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="info-title">
                                <i class="fas fa-check-circle mr-2 text-success"></i>
                                Status
                            </td>

                            <td>
                                <span class="badge-status">
                                    Aktif
                                </span>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection