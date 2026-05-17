<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="
        background: linear-gradient(
            180deg,
            #0f172a 0%,
            #1e293b 100%
        );
    ">

    {{-- BRAND LOGO --}}
    <a href="{{ auth()->user()->role == 'admin'
        ? route('admin.dashboard')
        : route('guru.dashboard') }}"
        class="brand-link text-center border-0 py-3">

        <span class="brand-text font-weight-bold text-white"
            style="font-size: 18px; letter-spacing: .5px;">

            @if(auth()->user()->role == 'admin')

                <i class="fas fa-user-shield mr-2 text-warning"></i>
                ADMIN PANEL

            @else

                <i class="fas fa-chalkboard-teacher mr-2 text-info"></i>
                GURU PANEL

            @endif

        </span>

    </a>

    <div class="sidebar"
        style="
            overflow-y: auto;
            height: calc(100vh - 80px);
        ">

        {{-- USER --}}
        <div class="user-panel mt-2 pb-2 mb-2 d-flex align-items-center px-3">

            <div class="image">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&background=0D8ABC&color=fff"
                    class="img-circle elevation-2"
                    style="width: 38px; height: 38px;">
            </div>

            <div class="info py-0">

                <a href="#"
                    class="d-block text-white font-weight-bold"
                    style="font-size: 14px;">

                    {{ auth()->user()->nama }}

                </a>

                <small class="text-success"
                    style="font-size: 11px;">

                    <i class="fas fa-circle"
                        style="font-size: 7px;"></i>

                    Online ({{ ucfirst(auth()->user()->role) }})

                </small>

            </div>

        </div>

        {{-- MENU --}}
        <nav class="mt-1">

            <ul class="nav nav-pills nav-sidebar flex-column text-sm"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item mb-1">

                    <a href="{{ auth()->user()->role == 'admin'
                        ? route('admin.dashboard')
                        : route('guru.dashboard') }}"
                        class="nav-link">

                        <i class="nav-icon fas fa-home text-info"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                {{-- DATA MASTER --}}
                <li class="nav-header text-uppercase"
                    style="font-size: 11px;">
                    DATA MASTER
                </li>

                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}"
                        class="nav-link">

                        <i class="nav-icon fas fa-door-open text-warning"></i>

                        <p>Kelas</p>

                    </a>
                </li>

                {{-- ADMIN ONLY --}}
                @if(auth()->user()->role == 'admin')

                    <li class="nav-item">
                        <a href="{{ route('jurusan.index') }}"
                            class="nav-link">

                            <i class="nav-icon fas fa-building text-primary"></i>

                            <p>Jurusan</p>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}"
                            class="nav-link">

                            <i class="nav-icon fas fa-user-graduate text-success"></i>

                            <p>Data Siswa</p>

                        </a>
                    </li>

                    <li class="nav-item">

                        <a href="{{ route('libur.index') }}"
                            class="nav-link">

                            <i class="nav-icon fas fa-calendar-times text-danger"></i>

                            <p>Hari Libur</p>

                        </a>

                    </li>

                @endif

                <li class="nav-item">
                    <a href="{{ route('semester.index') }}"
                        class="nav-link">

                        <i class="nav-icon fas fa-calendar-alt text-danger"></i>

                        <p>Semester</p>

                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tahunajaran.index') }}"
                        class="nav-link">

                        <i class="nav-icon fas fa-school text-purple"></i>

                        <p>Tahun Ajaran</p>

                    </a>
                </li>

                {{-- PENGUMUMAN --}}
                @if(auth()->user()->role == 'admin')

                    <li class="nav-item">
                        <a href="{{ route('pengumuman.index') }}"
                            class="nav-link">

                            <i class="nav-icon fas fa-bullhorn text-info"></i>

                            <p>Pengumuman</p>

                        </a>
                    </li>

                @endif

                {{-- KHUSUS ADMIN --}}
                @if(auth()->user()->role == 'admin')

                    <li class="nav-header text-uppercase"
                        style="font-size: 11px;">
                        KHUSUS ADMIN
                    </li>

                    <li class="nav-item">

                        <a href="{{ route('user.index') }}"
                            class="nav-link">

                            <i class="nav-icon fas fa-users-cog text-info"></i>

                            <p>Manajemen User</p>

                        </a>

                    </li>

                @endif

                {{-- TRANSAKSI --}}
                <li class="nav-header text-uppercase"
                    style="font-size: 11px;">
                    TRANSAKSI & LAPORAN
                </li>

                {{-- GURU --}}
                @if(auth()->user()->role == 'guru')

                    <li class="nav-item">

                        <a href="{{ route('absensi.index') }}"
                            class="nav-link">

                            <i class="nav-icon fas fa-pen-alt text-success"></i>

                            <p>Input Absensi</p>

                        </a>

                    </li>

                @endif

                {{-- MENU LAPORAN --}}
                <li class="nav-item mt-2">

                    <a href="{{ route('laporan.absensi') }}"
                        class="nav-link bg-primary elevation-1">

                        <i class="nav-icon fas fa-chart-bar"></i>

                        <p class="font-weight-bold">
                            Laporan Absensi
                        </p>

                    </a>

                </li>

                {{-- SUB LAPORAN --}}
                <li class="nav-item ml-2">
                    <a href="{{ route('laporan.absensi.harian') }}"
                        class="nav-link py-1">

                        <i class="nav-icon fas fa-circle text-success"
                            style="font-size: 8px;"></i>

                        <p style="font-size: 13px;">
                            Harian
                        </p>

                    </a>
                </li>

                <li class="nav-item ml-2">
                    <a href="{{ route('laporan.absensi.mingguan') }}"
                        class="nav-link py-1">

                        <i class="nav-icon fas fa-circle text-info"
                            style="font-size: 8px;"></i>

                        <p style="font-size: 13px;">
                            Mingguan
                        </p>

                    </a>
                </li>

                <li class="nav-item ml-2">
                    <a href="{{ route('laporan.absensi.bulanan') }}"
                        class="nav-link py-1">

                        <i class="nav-icon fas fa-circle text-warning"
                            style="font-size: 8px;"></i>

                        <p style="font-size: 13px;">
                            Bulanan
                        </p>

                    </a>
                </li>

                <li class="nav-item ml-2">
                    <a href="{{ route('laporan.absensi.tahunan') }}"
                        class="nav-link py-1">

                        <i class="nav-icon fas fa-circle text-danger"
                            style="font-size: 8px;"></i>

                        <p style="font-size: 13px;">
                            Tahunan
                        </p>

                    </a>
                </li>

                <li class="nav-item ml-2 mb-3">
                    <a href="{{ route('laporan.absensi.semester') }}"
                        class="nav-link py-1">

                        <i class="nav-icon fas fa-circle text-purple"
                            style="font-size: 8px;"></i>

                        <p style="font-size: 13px;">
                            Semester
                        </p>

                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>