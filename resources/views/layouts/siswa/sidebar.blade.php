<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- LOGO --}}
    <a href="/siswa/dashboard"
        class="brand-link text-center">

        <span class="brand-text font-weight-bold">
            SISWA PANEL
        </span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-header font-weight-bold text-uppercase"
                    style="font-size: 0.7rem; opacity: 0.6;">

                    Menu Utama
                </li>

                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ route('siswa.dashboard') }}"
                        class="nav-link {{ request()->is('siswa/dashboard') ? 'active shadow-sm' : '' }}"
                        style="border-radius: 10px;">

                        <i class="nav-icon fas fa-th-large"></i>

                        <p>Dashboard</p>
                    </a>

                </li>

                {{-- ABSENSI --}}
                <li class="nav-item">

                    <a href="{{ route('siswa.absensi') }}"
                        class="nav-link {{ request()->is('siswa/absensi') ? 'active shadow-sm' : '' }}"
                        style="border-radius: 10px;">

                        <i class="nav-icon fas fa-calendar-check"></i>

                        <p>Absensi Hari Ini</p>
                    </a>

                </li>

                {{-- RIWAYAT --}}
                <li class="nav-item">

                    <a href="{{ route('siswa.riwayat') }}"
                        class="nav-link {{ request()->is('siswa/riwayat') ? 'active shadow-sm' : '' }}"
                        style="border-radius: 10px;">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Riwayat Absen</p>
                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>