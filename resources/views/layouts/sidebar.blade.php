<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <div class="logo">
                    <img src="{{ asset('template/assets/img/favicon') }}/logo.png" alt="Logo Kemendagri" class="img-thumbnail" width="200">
                </div>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="/home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">PERJADIN</span>
        </li>
        <li class="menu-item {{ request()->is('spd','spd/create', 'history') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-plane'></i>
                <div>Pengajuan Perjadin</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('spd/create') ? 'active' : '' }}">
                    <a href="/spd/create" class="menu-link">
                        <div>Form Pengajuan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('spd') ? 'active' : '' }}">
                    <a href="/spd" class="menu-link">
                        <div>Daftar Pengajuan</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('laporan','laporan/laporanSelesai') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-report'></i>
                <div>Laporan Perjadin</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('laporan/laporanDitolak') ? 'active' : '' }}">
                    <a href="{{ route('laporan.laporanDitolak') }}" class="menu-link">
                        <div>Laporan Ditolak</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('laporan/laporanSelesai') ? 'active' : '' }}">
                    <a href="{{ route('laporan.laporanSelesai') }}" class="menu-link">
                        <div>Laporan Selesai</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">SETTING</span>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="menu-item {{ request()->is('representasi','biaya', 'biayaTransportasiDarat', 'biayaTiketPesawat') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-money'></i>
                <div>Standar Biaya</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('representasi') ? 'active' : '' }}">
                    <a href="/representasi" class="menu-link">
                        <div>Representasi</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('biaya') ? 'active' : '' }}">
                    <a href="/biaya" class="menu-link">
                        <div>Harian & Penginapan & Taksi</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('biayaTransportasiDarat') ? 'active' : '' }}">
                    <a href="/biayaTransportasiDarat" class="menu-link">
                        <div>Transportasi Darat</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('biayaTiketPesawat') ? 'active' : '' }}">
                    <a href="/biayaTiketPesawat" class="menu-link">
                        <div>Biaya Tiket Pesawat</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('mataAnggaran') ? 'active' : '' }}">
            <a href="/mataAnggaran" class="menu-link">
                <i class='menu-icon tf-icons bx bx-purchase-tag'></i>
                <div>Mata Anggaran</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('user','golongan','jabatan') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-user-circle'></i>
                <div>Akun</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
                    <a href="/user" class="menu-link">
                        <div>Daftar Akun</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('jabatan') ? 'active' : '' }}">
                    <a href="/jabatan" class="menu-link">
                        <div>Jabatan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('golongan') ? 'active' : '' }}">
                    <a href="/golongan" class="menu-link">
                        <div>Golongan</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->role !== 'admin')
        <li class="menu-item {{ request()->is('profile') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxs-user-circle'></i>
                <div>Akun</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('profile') ? 'active' : '' }}">
                    <a href="/profile" class="menu-link">
                        <div>Profile</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('jabatan') ? 'active' : '' }}">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</aside>
<!-- / Menu -->