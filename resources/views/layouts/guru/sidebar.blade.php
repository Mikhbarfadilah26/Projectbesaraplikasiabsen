<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);">

    {{-- LOGO --}}
    <a href="{{ route('guru.dashboard') }}"
        class="brand-link text-center border-0 py-4">

        <span class="brand-text font-weight-bold text-white"
            style="font-size: 20px; letter-spacing: 1px;">

            <i class="fas fa-chalkboard-teacher mr-2 text-warning"></i>

            GURU PANEL
        </span>

    </a>

    <div class="sidebar">

        {{-- USER PANEL --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-3">

            <div class="image">

                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->nama }}&background=0D8ABC&color=fff"
                    class="img-circle elevation-2">

            </div>

            <div class="info">

                <a href="#"
                    class="d-block text-white font-weight-bold">

                    {{ auth()->user()->nama }}

                </a>

                <small class="text-success">

                    <i class="fas fa-circle"
                        style="font-size: 8px;"></i>

                    Online

                </small>

            </div>

        </div>

        {{-- MENU --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('guru.dashboard') }}"
                        class="nav-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-home text-info"></i>

                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- INPUT ABSENSI --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('absensi.index') }}"
                        class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-user-check text-success"></i>

                        <p>Input Absensi</p>
                    </a>
                </li>

                {{-- DATA SISWA --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('siswa.index') }}"
                        class="nav-link {{ request()->is('master/siswa*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-user-graduate text-primary"></i>

                        <p>Data Siswa</p>
                    </a>
                </li>

                {{-- DATA KELAS --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('kelas.index') }}"
                        class="nav-link {{ request()->is('master/kelas*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-school text-danger"></i>

                        <p>Data Kelas</p>
                    </a>
                </li>

                {{-- JURUSAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('jurusan.index') }}"
                        class="nav-link {{ request()->is('master/jurusan*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-building text-purple"></i>

                        <p>Jurusan</p>
                    </a>
                </li>

                {{-- SEMESTER --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('semester.index') }}"
                        class="nav-link {{ request()->is('master/semester*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-calendar-alt text-warning"></i>

                        <p>Semester</p>
                    </a>
                </li>

                {{-- TAHUN AJARAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('tahunajaran.index') }}"
                        class="nav-link {{ request()->is('master/tahunajaran*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-book text-teal"></i>

                        <p>Tahun Ajaran</p>
                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('laporan.absensi') }}"
                        class="nav-link {{ request()->is('master/laporan/absensi') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-chart-bar text-orange"></i>

                        <p>Laporan</p>
                    </a>
                </li>

                {{-- LOGOUT --}}
                <li class="nav-item mt-3">
                    <a href="/logout"
                        class="nav-link text-danger rounded-lg">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>