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
        class="brand-link text-center border-0 py-4">

        <span class="brand-text font-weight-bold text-white"
            style="font-size: 20px; letter-spacing: 1px;">

            @if(auth()->user()->role == 'admin')

            <i class="fas fa-user-shield mr-2 text-warning"></i>
            ADMIN PANEL

            @else

            <i class="fas fa-chalkboard-teacher mr-2 text-info"></i>
            GURU PANEL

            @endif

        </span>

    </a>

    <div class="sidebar">

        {{-- USER --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-3">

            <div class="image">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&background=0D8ABC&color=fff"
                    class="img-circle elevation-2">
            </div>

            <div class="info">
                <a href="#" class="d-block text-white font-weight-bold">
                    {{ auth()->user()->nama }}
                </a>

                <small class="text-success">
                    <i class="fas fa-circle" style="font-size: 8px;"></i>
                    Online ({{ ucfirst(auth()->user()->role) }})
                </small>
            </div>

        </div>

        {{-- MENU --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">

                {{-- DASHBOARD --}}
                <li class="nav-item mb-1">

                    <a href="{{ auth()->user()->role == 'admin'
                        ? route('admin.dashboard')
                        : route('guru.dashboard') }}"
                        class="nav-link rounded-lg">

                        <i class="nav-icon fas fa-home text-info"></i>
                        <p>Dashboard</p>

                    </a>

                </li>

                {{-- DATA MASTER (GURU + ADMIN) --}}
                <li class="nav-header">DATA MASTER</li>

                <li class="nav-item mb-1">
                    <a href="{{ route('kelas.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-door-open text-warning"></i>
                        <p>Kelas</p>
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('jurusan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building text-primary"></i>
                        <p>Jurusan</p>
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('siswa.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate text-success"></i>
                        <p>Data Siswa</p>
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('semester.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt text-danger"></i>
                        <p>Semester</p>
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('tahunajaran.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-school text-purple"></i>
                        <p>Tahun Ajaran</p>
                    </a>
                </li>

                {{-- PENGUMUMAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('pengumuman.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn text-info"></i>
                        <p>Kelola Pengumuman</p>
                    </a>
                </li>

                {{-- KHUSUS ADMIN --}}
                @if(auth()->user()->role == 'admin')

                <li class="nav-header">KHUSUS ADMIN</li>

                <li class="nav-item mb-1">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog text-info"></i>
                        <p>Manajemen User</p>
                    </a>
                </li>

                @endif

                {{-- TRANSAKSI & LAPORAN --}}
                <li class="nav-header">TRANSAKSI & LAPORAN</li>

                {{-- ADMIN ONLY: DATA ABSENSI --}}
                @if(auth()->user()->role == 'admin')

                <li class="nav-item mb-1">
                    <a href="{{ route('absensi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-check text-teal"></i>
                        <p>Data Absensi Siswa</p>
                    </a>
                </li>

                @endif
                {{-- GURU ONLY: ISI ABSENSI --}}
                @if(auth()->user()->role == 'guru')

                <li class="nav-item mb-1">
                    <a href="{{ route('absensi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-pen-alt text-success"></i>
                        <p>Isi Absensi</p>
                    </a>
                </li>
                @endif

                {{-- LAPORAN (BISA DUA-DUA) --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('laporan.absensi') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar text-orange"></i>
                        <p>Laporan Absensi</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>