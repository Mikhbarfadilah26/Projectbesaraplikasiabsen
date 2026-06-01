<!-- FOOTER -->
<footer
    style="
        background:#0f172a;
        color:white;
        position:relative;
        overflow:hidden;
        border-top:1px solid rgba(34,197,94,.18);
    ">

    {{-- BACKGROUND EFFECT --}}
    <div
        style="
            position:absolute;
            width:220px;
            height:220px;
            background:rgba(34,197,94,.05);
            border-radius:50%;
            top:-90px;
            left:-90px;
            filter:blur(70px);
        ">
    </div>

    <div
        style="
            position:absolute;
            width:200px;
            height:200px;
            background:rgba(59,130,246,.04);
            border-radius:50%;
            bottom:-90px;
            right:-90px;
            filter:blur(70px);
        ">
    </div>

    <div class="container py-4 position-relative">

        <div class="row">

            {{-- SEKOLAH --}}
            <div class="col-lg-3 col-md-6 mb-3">

                <h5
                    class="font-weight-bold text-uppercase mb-3"
                    style="
                        color:white;
                        letter-spacing:1px;
                    ">

                    Sistem Absensi

                </h5>

                <div class="footer-line"></div>

                <p
                    style="
                        color:#94a3b8;
                        line-height:1.7;
                        font-size:.92rem;
                    ">

                    Platform absensi digital modern
                    berbasis Laravel untuk monitoring
                    kehadiran siswa secara realtime.

                </p>

            </div>

            {{-- MENU --}}
            <div class="col-lg-3 col-md-6 mb-3">

                <h5
                    class="font-weight-bold text-uppercase mb-3"
                    style="color:white;">

                    Menu

                </h5>

                <div class="footer-line"></div>

                <ul class="list-unstyled footer-links">

                    <li><a href="/">Home</a></li>

                    <li>
                        <a href="{{ route('landing.pengumuman') }}">
                            Pengumuman
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('landing.jurusan') }}">
                            Jurusan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('login.siswa') }}">
                            Login
                        </a>
                    </li>

                </ul>

            </div>

            {{-- FITUR --}}
            <div class="col-lg-3 col-md-6 mb-3">

                <h5
                    class="font-weight-bold text-uppercase mb-3"
                    style="color:white;">

                    Fitur

                </h5>

                <div class="footer-line"></div>

                <ul class="list-unstyled footer-links">

                    <li><a href="#">Absensi Realtime</a></li>

                    <li><a href="#">Monitoring</a></li>

                    <li><a href="#">Rekap Data</a></li>

                    <li><a href="#">Laporan</a></li>

                </ul>

            </div>

            {{-- KONTAK --}}
            <div class="col-lg-3 col-md-6 mb-3">

                <h5
                    class="font-weight-bold text-uppercase mb-3"
                    style="color:white;">

                    Kontak

                </h5>

                <div class="footer-line"></div>

                <ul class="list-unstyled footer-contact">

                    <li>
                        <i class="fas fa-school text-success me-2"></i>
                        SMKN 1 Karang Baru
                    </li>

                    <li>
                        <i class="fas fa-map-marker-alt text-success me-2"></i>
                        Aceh Tamiang
                    </li>

                    <li>
                        <i class="fas fa-phone-alt text-success me-2"></i>
                        0822-6712-3172
                    </li>

                </ul>

            </div>

        </div>

        {{-- COPYRIGHT --}}
        <hr
            style="
                border-color:rgba(255,255,255,.06);
                margin:10px 0;
            ">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-1">

            <div
                style="
                    color:#94a3b8;
                    font-size:.85rem;
                ">

                © {{ date('Y') }} SMKN 1 Karang Baru

            </div>

            <div class="mt-2 mt-md-0">

                <span
                    style="
                        background:rgba(34,197,94,.10);
                        color:#22c55e;
                        padding:6px 14px;
                        border-radius:50px;
                        font-size:.75rem;
                        font-weight:600;
                    ">

                    Digital School

                </span>

            </div>

        </div>

    </div>

</footer>

<style>

    .footer-line{
        width:55px;
        height:2px;
        background:#22c55e;
        border-radius:10px;
        margin-bottom:18px;
    }

    .footer-links li{
        margin-bottom:10px;
    }

    .footer-links a{
        color:#cbd5e1;
        text-decoration:none;
        transition:.25s;
        font-size:.92rem;
    }

    .footer-links a:hover{
        color:#22c55e;
        padding-left:4px;
        text-decoration:none;
    }

    .footer-contact li{
        color:#cbd5e1;
        line-height:1.8;
        margin-bottom:10px;
        font-size:.92rem;
    }

</style>
