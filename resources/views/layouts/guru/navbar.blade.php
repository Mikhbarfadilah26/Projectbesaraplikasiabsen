<nav class="main-header navbar navbar-expand">

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

        {{-- USER --}}
        <li class="nav-item mr-3">

            <span class="navbar-user">
                <i class="fas fa-user-circle mr-1"></i>
                {{ auth()->user()->nama }}
            </span>

        </li>

        {{-- LOGOUT BUTTON (OPEN MODAL) --}}
        <li class="nav-item">

            <button type="button"
                class="btn btn-sm btn-danger rounded-pill px-3"
                data-toggle="modal"
                data-target="#logoutGuruModal">

                <i class="fas fa-sign-out-alt mr-1"></i>
                Logout

            </button>

        </li>

    </ul>

</nav>


{{-- ========================================= --}}
{{-- 🔥 MODAL LOGOUT GURU --}}
{{-- ========================================= --}}

<div class="modal fade" id="logoutGuruModal" tabindex="-1" role="dialog" aria-hidden="true">
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

                <p class="text-muted">
                    Anda akan keluar dari sistem guru.
                </p>

                <audio id="beepGuru" src="https://www.soundjay.com/buttons/sounds/beep-07.mp3"></audio>

            </div>

            <div class="modal-footer justify-content-center">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tidak
                </button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="btn btn-danger"
                        onclick="playBeepGuru()">

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
    function playBeepGuru() {
        const audio = document.getElementById('beepGuru');
        audio.play();
    }
</script>