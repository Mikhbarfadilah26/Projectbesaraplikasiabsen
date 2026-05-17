<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">

    {{-- LEFT --}}
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link" data-widget="pushmenu" href="#">

                <i class="fas fa-bars text-primary"></i>

            </a>

        </li>

    </ul>

    {{-- RIGHT --}}
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- JAM WIB --}}
        <li class="nav-item mr-4 text-center">

            <div class="d-flex flex-column">

                <span id="jamWib"
                    class="font-weight-bold text-dark"
                    style="font-size:15px; line-height:1;">

                    00:00:00

                </span>

                <small class="text-muted">

                    WIB • Indonesia

                </small>

            </div>

        </li>

        {{-- USER --}}
        <li class="nav-item mr-3">

            <span class="navbar-user font-weight-bold text-dark">

                <i class="fas fa-user-circle text-primary mr-1"></i>

                {{ auth()->user()->nama }}

            </span>

        </li>

        {{-- LOGOUT BUTTON --}}
        <li class="nav-item">

            <button type="button"
                class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm"
                data-toggle="modal"
                data-target="#logoutGuruModal">

                <i class="fas fa-sign-out-alt mr-1"></i>

                Logout

            </button>

        </li>

    </ul>

</nav>


{{-- ========================================= --}}
{{-- MODAL LOGOUT GURU --}}
{{-- ========================================= --}}

<div class="modal fade"
    id="logoutGuruModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered"
        role="document">

        <div class="modal-content border-0 shadow-lg rounded-lg">

            {{-- HEADER --}}
            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">

                    <i class="fas fa-sign-out-alt mr-2"></i>

                    Konfirmasi Logout

                </h5>

                <button type="button"
                    class="close text-white"
                    data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>

            {{-- BODY --}}
            <div class="modal-body text-center py-4">

                <i class="fas fa-power-off fa-3x text-danger mb-3"></i>

                <h5 class="font-weight-bold">
                    Apakah Anda yakin ingin logout?
                </h5>

                <p class="text-muted mb-0">
                    Anda akan keluar dari sistem guru.
                </p>

                <audio id="beepGuru">

                    <source src="https://www.soundjay.com/buttons/sounds/beep-07.mp3"
                        type="audio/mpeg">

                </audio>

            </div>

            {{-- FOOTER --}}
            <div class="modal-footer justify-content-center border-0 pb-4">

                <button type="button"
                    class="btn btn-secondary px-4"
                    data-dismiss="modal">

                    Tidak

                </button>

                <form action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button type="submit"
                        class="btn btn-danger px-4"
                        onclick="playBeepGuru()">

                        Iya, Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- ========================================= --}}
{{-- STYLE --}}
{{-- ========================================= --}}

<style>
    .main-header {
        border-bottom: none;
        min-height: 65px;
    }

    .navbar-user {
        font-size: 14px;
        white-space: nowrap;
    }

    #jamWib {
        letter-spacing: 1px;
    }
</style>


{{-- ========================================= --}}
{{-- SCRIPT --}}
{{-- ========================================= --}}

<script>
    function playBeepGuru() {

        const audio =
            document.getElementById('beepGuru');

        audio.play();

    }

    function updateJamWIB() {

        const sekarang =
            new Date();

        const options = {
            timeZone: 'Asia/Jakarta',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };

        const jam =
            sekarang.toLocaleTimeString('id-ID', options);

        document.getElementById('jamWib').innerHTML =
            jam;

    }

    setInterval(updateJamWIB, 1000);

    updateJamWIB();
</script>