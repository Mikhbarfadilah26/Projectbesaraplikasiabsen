<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    {{-- LEFT --}}
    <ul class="navbar-nav align-items-center">

        {{-- TOGGLE --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        {{-- LOGO --}}
<li class="nav-item d-none d-sm-inline-block">

    <a href="/admin/dashboard"
        class="nav-link d-flex align-items-center font-weight-bold text-success">

        <i class="fas fa-school mr-2"></i>

        <span>SMK APP</span>

    </a>

</li>

        {{-- TEXT BERJALAN (TRANSPARAN / ASLI DI NAVBAR) --}}
        <li class="nav-item d-none d-md-block ml-3" style="min-width: 400px;">
            <marquee behavior="scroll"
                direction="left"
                scrollamount="5"
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
                data-toggle="dropdown"
                href="#">

                <div class="mr-2 text-right d-none d-sm-block">
                    <div class="font-weight-bold">
                        {{ auth()->user()->nama }}
                    </div>
                    <small class="text-muted">
                        Administrator
                    </small>
                </div>

                <i class="fas fa-user-circle fa-2x text-success"></i>
            </a>

            {{-- DROPDOWN --}}
            <div class="dropdown-menu dropdown-menu-right shadow border-0 rounded-lg">

                <div class="dropdown-item text-center py-3">
                    <i class="fas fa-user-shield fa-3x text-success mb-2"></i>
                    <div class="font-weight-bold">
                        {{ auth()->user()->nama }}
                    </div>
                    <small class="text-muted">
                        Administrator Sistem
                    </small>
                </div>

                <div class="dropdown-divider"></div>

                {{-- PROFILE --}}
                <a href="/profile" class="dropdown-item">
                    <i class="fas fa-user mr-2 text-primary"></i>
                    Profile
                </a>

                {{-- DASHBOARD --}}
                <a href="/admin/dashboard" class="dropdown-item">
                    <i class="fas fa-tachometer-alt mr-2 text-success"></i>
                    Dashboard
                </a>

                <div class="dropdown-divider"></div>

                {{-- LOGOUT --}}
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>

            </div>

        </li>

    </ul>

</nav>