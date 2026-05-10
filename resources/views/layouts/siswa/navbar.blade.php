<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- LEFT --}}
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
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
                        {{ auth('siswa')->user()->kelas->nama ?? '-' }}
                    </div>

                </div>

                <div class="dropdown-divider"></div>

                <a href="/siswa/profile" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>
                    Profile
                </a>

                <form action="/logout-siswa" method="POST">
                    @csrf

                    <button class="dropdown-item text-danger">

                        <i class="fas fa-sign-out-alt mr-2"></i>

                        Logout
                    </button>
                </form>

            </div>

        </li>

    </ul>

</nav>