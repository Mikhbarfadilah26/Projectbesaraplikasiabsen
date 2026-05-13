<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(180deg, #2c3e50 0%, #000000 100%); border-right: none;">

    {{-- LOGO --}}
    <a href="/siswa/dashboard" 
       class="brand-link text-center" 
       style="border-bottom: 1px solid rgba(255,255,255,0.1); background: rgba(0,0,0,0.2);">
        <span class="brand-text font-weight-light" style="letter-spacing: 2px;">
            <strong style="color: #3498db;">SISWA</strong> PANEL
        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" 
                data-widget="treeview" 
                role="menu" 
                data-accordion="false">

                <li class="nav-header font-weight-bold text-uppercase" 
                    style="font-size: 0.65rem; opacity: 0.5; color: #ecf0f1; margin-bottom: 5px; padding-left: 20px;">
                    Menu Utama
                </li>

                {{-- DASHBOARD --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('siswa.dashboard') }}" 
                       class="nav-link {{ request()->is('siswa/dashboard') ? 'active' : '' }}" 
                       style="border-radius: 8px; margin: 0 10px; transition: all 0.3s ease;">
                        <i class="nav-icon fas fa-th-large {{ request()->is('siswa/dashboard') ? 'text-white' : 'text-info' }}"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- ABSENSI --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('siswa.absensi') }}" 
                       class="nav-link {{ request()->is('siswa/absensi') ? 'active' : '' }}" 
                       style="border-radius: 8px; margin: 0 10px; transition: all 0.3s ease;">
                        <i class="nav-icon fas fa-calendar-check {{ request()->is('siswa/absensi') ? 'text-white' : 'text-success' }}"></i>
                        <p>Absensi Hari Ini</p>
                    </a>
                </li>

                {{-- RIWAYAT --}}
                <li class="nav-item mb-1">
                    <a href="{{ route('siswa.riwayat') }}" 
                       class="nav-link {{ request()->is('siswa/riwayat') ? 'active' : '' }}" 
                       style="border-radius: 8px; margin: 0 10px; transition: all 0.3s ease;">
                        <i class="nav-icon fas fa-history {{ request()->is('siswa/riwayat') ? 'text-white' : 'text-warning' }}"></i>
                        <p>Riwayat Absen</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<style>
    /* Tambahkan CSS ini di file style Anda atau dalam tag <style> */
    
    /* Warna saat menu Aktif (Gradient Biru) */
    .nav-sidebar .nav-item .nav-link.active {
        background: linear-gradient(90deg, #007bff, #00c6ff) !important;
        color: #fff !important;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3) !important;
    }

    /* Efek Hover untuk menu yang tidak aktif */
    .nav-sidebar .nav-item .nav-link:not(.active):hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
        transform: translateX(5px);
    }

    /* Warna Icon saat tidak aktif agar lebih hidup */
    .nav-link:not(.active) i {
        opacity: 0.8;
    }
</style>