<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);">

    {{-- LOGO PINTAR --}}
    {{-- Jika admin ke dashboard admin, jika guru ke dashboard guru --}}
    <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('guru.dashboard') }}"
        class="brand-link text-center border-0 py-4">

        <span class="brand-text font-weight-bold text-white"
            style="font-size: 20px; letter-spacing: 1px;">

            @if(auth()->user()->role == 'admin')
            <i class="fas fa-user-shield mr-2 text-warning"></i> ADMIN PANEL
            @else
            <i class="fas fa-chalkboard-teacher mr-2 text-info"></i> GURU PANEL
            @endif
        </span>

    </a>

    <div class="sidebar">

        {{-- USER PANEL DINAMIS --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-3">

            <div class="image">
                {{-- Mengambil inisial nama user secara otomatis --}}
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff"
                    class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block text-white font-weight-bold">
                    {{ auth()->user()->name }}
                </a>

                <small class="text-success">
                    <i class="fas fa-circle" style="font-size: 8px;"></i>
                    Online ({{ ucfirst(auth()->user()->role) }})
                </small>
            </div>

        </div>

        {{-- MENU UTAMA --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- DASHBOARD PINTAR --}}
                <li class="nav-item mb-1">
                    <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('guru.dashboard') }}"
                        class="nav-link {{ (request()->routeIs('admin.dashboard') || request()->routeIs('guru.dashboard')) ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-home text-info"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">DATA MASTER</li>

                {{-- KELAS --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('kelas.index') }}"
                        class="nav-link {{ request()->is('master/kelas*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-door-open text-warning"></i>
                        <p>Kelas</p>
                    </a>
                </li>

                {{-- JURUSAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('jurusan.index') }}"
                        class="nav-link {{ request()->is('master/jurusan*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-building text-primary"></i>
                        <p>Jurusan</p>
                    </a>
                </li>

                {{-- SEMESTER --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('semester.index') }}"
                        class="nav-link {{ request()->is('master/semester*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-calendar-alt text-danger"></i>
                        <p>Semester</p>
                    </a>
                </li>

                {{-- SISWA --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('siswa.index') }}"
                        class="nav-link {{ request()->is('master/siswa*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-user-graduate text-success"></i>
                        <p>Siswa</p>
                    </a>
                </li>

                {{-- TAHUN AJARAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('tahunajaran.index') }}"
                        class="nav-link {{ request()->is('master/tahunajaran*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-school text-purple"></i>
                        <p>Tahun Ajaran</p>
                    </a>
                </li>
                {{-- JADWAL ABSENSI --}}
                <li class="nav-item">
                    <a href="{{ route('jadwalabsensi.index') }}"
                        class="nav-link {{ request()->is('master/jadwalabsensi*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-clock text-warning"></i>

                        <p>Jadwal Absensi</p>
                    </a>
                </li>
                
                

                {{-- USER MANAGEMENT (Hanya Admin) --}}
                @if(auth()->user()->role == 'admin')
                <li class="nav-item mb-1">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->is('master/user*') ? 'active' : '' }} rounded-lg">

                        <i class="nav-icon fas fa-users-cog text-info"></i>

                        <p>Manajemen User</p>
                    </a>
                </li>
                @endif

                <li class="nav-header">TRANSAKSI & LAPORAN</li>

                {{-- ABSENSI --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('absensi.index') }}"
                        class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-user-check text-teal"></i>
                        <p>Absensi</p>
                    </a>
                </li>

                {{-- DETAIL ABSENSI (HANYA ADMIN) --}}
                {{-- Sesuai request: Guru tidak bisa lihat Detail Absensi --}}
                @if(auth()->user()->role == 'admin')
                <li class="nav-item mb-1">
                    <a href="{{ route('detailabsensi.index') }}"
                        class="nav-link {{ request()->routeIs('detailabsensi.*') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-clipboard-list text-pink"></i>
                        <p>Detail Absensi</p>
                    </a>
                </li>
                @endif

                {{-- LAPORAN --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('laporan.absensi') }}"
                        class="nav-link {{ request()->is('master/laporan/absensi') ? 'active' : '' }} rounded-lg">
                        <i class="nav-icon fas fa-chart-bar text-orange"></i>
                        <p>Laporan</p>
                    </a>
                </li>



            </ul>

        </nav>

    </div>

</aside>