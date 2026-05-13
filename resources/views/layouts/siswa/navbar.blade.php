<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- LEFT --}}
    <ul class="navbar-nav align-items-center">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        {{-- TEKS BERJALAN --}}
        <li class="nav-item d-none d-md-block ml-2">

            <div class="marquee-wrapper">

                <div class="marquee-text">

                    🎓 Selamat datang di Sistem E-Absensi SMK Negeri 1 Karang Baru •
                    Tetap semangat belajar •
                    Disiplin adalah kunci kesuksesan • 📚

                </div>

            </div>

        </li>

    </ul>

    {{-- RIGHT --}}
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#">

                <i class="fas fa-user-circle"></i>

                {{ auth('siswa')->user()->nama }}
            </a>

            {{-- DROPDOWN --}}
            <div class="dropdown-menu dropdown-menu-right shadow">

                <div class="dropdown-item text-center">

                    <i class="fas fa-user-circle fa-2x text-primary mb-2"></i>

                    <br>

                    <strong>
                        {{ auth('siswa')->user()->nama }}
                    </strong>

                    <div class="text-muted small">
                        {{ auth('siswa')->user()->kelas->namakelas ?? '-' }}
                    </div>

                </div>

                <div class="dropdown-divider"></div>

                <a href="/siswa/profile" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>
                    Profile
                </a>

                {{-- BUTTON LOGOUT --}}
                <button type="button"
                    class="dropdown-item text-danger"
                    data-toggle="modal"
                    data-target="#logoutSiswaModal">

                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>

            </div>

        </li>

    </ul>

</nav>


{{-- ========================================= --}}
{{-- 🔥 MODAL LOGOUT SISWA (WARNING KUNING) --}}
{{-- ========================================= --}}

<div class="modal fade" id="logoutSiswaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content border-0 shadow-lg rounded-lg">

            {{-- HEADER KUNING --}}
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Konfirmasi Logout
                </h5>

                <button type="button" class="close text-dark" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            {{-- BODY --}}
            <div class="modal-body text-center py-4">

                <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>

                <h5>Apakah kamu yakin ingin keluar?</h5>

                <p class="text-muted">
                    Kamu harus login lagi untuk masuk ke sistem.
                </p>

                <audio id="beepSiswa" src="https://www.soundjay.com/buttons/sounds/beep-07.mp3"></audio>

            </div>

            {{-- FOOTER --}}
            <div class="modal-footer justify-content-center">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tidak
                </button>

                <form action="/logout-siswa" method="POST">
                    @csrf

                    <button type="submit"
                        class="btn btn-warning text-dark"
                        onclick="playBeepSiswa()">

                        Iya, Logout

                    </button>

                </form>

            </div>

        </div>

    </div>
</div>


{{-- ========================================= --}}
{{-- 🔊 SCRIPT BEEP --}}
{{-- ========================================= --}}

<script>
    function playBeepSiswa() {
        const audio = document.getElementById('beepSiswa');
        audio.play();
    }
</script>


{{-- ========================================= --}}
{{-- STYLE MARQUEE --}}
{{-- ========================================= --}}

<style>
    .marquee-wrapper {
        width: 420px;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        height: 25px;
        display: flex;
        align-items: center;
    }

    .marquee-text {
        display: inline-block;
        padding-left: 100%;
        animation: marqueeMove 18s linear infinite;
        font-size: 14px;
        font-weight: 600;
        color: #059669;
    }

    @keyframes marqueeMove {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }
</style>