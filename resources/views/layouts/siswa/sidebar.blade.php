<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="
        background: linear-gradient(180deg, #1f2a44 0%, #0b0f1a 100%);
        border-right: none;
    ">

    {{-- BRAND / LOGO --}}
    <a href="/siswa/dashboard"
        class="brand-link text-center"
        style="
            border-bottom: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.03);
            padding: 18px 10px;
        ">

        {{-- ICON LOGO --}}
        <div style="font-size: 28px; margin-bottom: 5px;">
            🎓
        </div>

        <span class="brand-text font-weight-bold"
            style="
                letter-spacing: 2px;
                font-size: 14px;
            ">

            <span style="color:#00c6ff;">SISWA</span>
            <span style="color:#ffffff;">PANEL</span>

        </span>

        <div style="font-size: 10px; color: rgba(255,255,255,0.5); margin-top: 2px;">
            Absensi & Laporan
        </div>

    </a>

    <div class="sidebar">

        <nav class="mt-3">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- HEADER --}}
                <li class="nav-header text-uppercase"
                    style="
                        font-size: 11px;
                        color: rgba(255,255,255,0.4);
                        padding-left: 18px;
                        margin-bottom: 10px;
                        letter-spacing: 1px;
                    ">

                    MENU UTAMA

                </li>

                {{-- DASHBOARD --}}
                <li class="nav-item mb-1">

                    <a href="{{ route('siswa.dashboard') }}"
                        class="nav-link {{ request()->is('siswa/dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home {{ request()->is('siswa/dashboard') ? 'text-white' : 'text-info' }}"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                {{-- LAPORAN --}}
                <li class="nav-item mb-1">

                    <a href="{{ route('siswa.laporan') }}"
                        class="nav-link {{ request()->is('siswa/laporan') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-file-alt {{ request()->is('siswa/laporan') ? 'text-white' : 'text-success' }}"></i>

                        <p>Laporan Absensi</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>
<style>

/* ACTIVE MENU */
.nav-sidebar .nav-item .nav-link.active {
    background: linear-gradient(90deg, #00c6ff, #0072ff) !important;
    color: #fff !important;
    border-radius: 10px;
    margin: 0 10px;
    box-shadow: 0 4px 15px rgba(0, 114, 255, 0.25);
}

/* HOVER EFFECT */
.nav-sidebar .nav-item .nav-link {
    border-radius: 10px;
    margin: 0 10px;
    transition: 0.25s ease;
    color: rgba(255,255,255,0.8);
}

.nav-sidebar .nav-item .nav-link:hover {
    background: rgba(255,255,255,0.08) !important;
    transform: translateX(6px);
    color: #fff !important;
}

/* ICON STYLE */
.nav-sidebar .nav-item .nav-link i {
    width: 22px;
    text-align: center;
}

/* BRAND ANIMATION */
.brand-link:hover {
    opacity: 0.95;
    transition: 0.3s;
}

</style>