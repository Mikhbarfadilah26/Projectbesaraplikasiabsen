<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    {{-- LEFT --}}
    <ul class="navbar-nav align-items-center">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="/admin/dashboard"
                class="nav-link d-flex align-items-center font-weight-bold text-success">
                <i class="fas fa-school mr-2"></i>
                <span>SMK APP</span>
            </a>
        </li>

        <li class="nav-item d-none d-md-block ml-3" style="min-width: 400px;">
            <marquee behavior="scroll" direction="left" scrollamount="5"
                class="font-weight-bold text-success">

                👋 Selamat Datang {{ auth()->user()->nama }}
                Sebagai Administrator Sistem Absensi Digital
                SMK Negeri 1 Karang Baru • Semoga Hari Anda Menyenangkan 🚀

            </marquee>
        </li>

    </ul>

    {{-- RIGHT --}}
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle d-flex align-items-center"
                data-toggle="dropdown" href="#">

                <div class="mr-2 text-right d-none d-sm-block">
                    <div class="font-weight-bold">
                        {{ auth()->user()->nama }}
                    </div>
                    <small class="text-muted">Administrator</small>
                </div>

                <i class="fas fa-user-circle fa-2x text-success"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow border-0 rounded-lg">

                <div class="dropdown-item text-center py-3">
                    <i class="fas fa-user-shield fa-3x text-success mb-2"></i>
                    <div class="font-weight-bold">{{ auth()->user()->nama }}</div>
                    <small class="text-muted">Administrator Sistem</small>
                </div>

                <div class="dropdown-divider"></div>


                <a href="/admin/dashboard" class="dropdown-item">
                    <i class="fas fa-tachometer-alt mr-2 text-success"></i> Dashboard
                </a>

                <div class="dropdown-divider"></div>

                <button type="button"
                    class="dropdown-item text-danger"
                    data-toggle="modal"
                    data-target="#logoutModal">

                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>

            </div>

        </li>

    </ul>

</nav>


{{-- ========================================= --}}
{{-- 🔥 MODAL LOGOUT (IYA / TIDAK) --}}
{{-- ========================================= --}}

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg rounded-lg">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Konfirmasi Logout
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-center py-4">

                <i class="fas fa-power-off fa-3x text-danger mb-3"></i>

                <h5>Apakah Anda yakin ingin logout?</h5>
                <p class="text-muted">Anda akan keluar dari sistem.</p>

                <audio id="beepSound" src="https://www.soundjay.com/buttons/sounds/beep-07.mp3"></audio>

            </div>

            <div class="modal-footer justify-content-center">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tidak
                </button>

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="playBeep()">
                        Iya, Logout
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>


{{-- ========================================= --}}
{{-- 🔊 SOUND SCRIPT --}}
{{-- ========================================= --}}

<script>
    function playBeep() {
        const audio = document.getElementById('beepSound');
        audio.play();
    }
</script>