
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- LOGO (Mengikuti Standar Layout Admin) --}}
    <a href="{{ route('siswa.dashboard') }}"
        class="brand-link d-flex align-items-center justify-content-center"
        style="height: 72px;">

        {{-- ICON --}}
        <div class="d-flex align-items-center justify-content-center mr-2"
            style="
                width: 44px;
                height: 44px;
                border-radius: 12px;
                background: linear-gradient(135deg, #007bff, #6610f2);
                box-shadow: 0 4px 10px rgba(0,0,0,0.25);
            ">

            <i class="fas fa-graduation-cap text-white"
                style="font-size: 18px;"></i>

        </div>

        {{-- TEXT --}}
        <div class="text-left">

            <span class="brand-text font-weight-bold text-white d-block"
                style="
                    font-size: 15px;
                    letter-spacing: 1px;
                    line-height: 1.1;
                ">

                DASHBOARD SISWA

            </span>

            <small style="
                    color: rgba(255,255,255,0.7);
                    font-size: 11px;
                    letter-spacing: 1px;
                ">

                ABSENSI & LAPORAN

            </small>

        </div>

    </a>

    {{-- SIDEBAR MENU --}}
    <div class="sidebar pt-3">
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" 
                role="menu" 
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ route('siswa.dashboard') }}"
                        class="nav-link {{ request()->is('siswa/dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                {{-- LAPORAN ABSENSI --}}
                <li class="nav-item">

                    <a href="{{ route('siswa.laporan') }}"
                        class="nav-link {{ request()->is('siswa/laporan*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-file-alt"></i>

                        <p>Laporan Absensi</p>

                    </a>

                </li>

            </ul>

        </nav>
    </div>

</aside>

