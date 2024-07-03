<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item @if ($activeMenu == 'dashboard') active @endif">
        <a href="/" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    {{-- Admisi --}}
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Admisi</span>
    </li>
    <li class="menu-item @if ($activeMenu == 'antrian') active @endif">
        <a href="{{ route('antrian.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-envelope"></i>
            <div data-i18n="Antrian">Antrian</div>
            <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">3</div>
        </a>
    </li>
    <li class="menu-item @if ($activeMenu == 'pembayaran') active @endif">
        <a href="{{ route('pembayaran.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-envelope"></i>
            <div data-i18n="Pembayaran">Pembayaran</div>
            <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">1</div>
        </a>
    </li>

    <!-- Data -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
    <li class="menu-item @if ($activeMenu == 'jadwal-praktek') active @endif">
        <a href="{{ route('jpraktek.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chat"></i>
            <div data-i18n="">Jadwal Praktek</div>
        </a>
    </li>
    <li class="menu-item @if ($activeMenu == 'pasien' || $activeMenu == 'pasien-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Pasien</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'pasien') active @endif">
                <a href="/pasien" class="menu-link">
                    <div data-i18n="Notifications">Data Pasien</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'pasien-new') active @endif ">
                <a href="{{ route('pasien.create') }}" class="menu-link">
                    <div data-i18n="Connections">Pasien Baru</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item @if ($activeMenu == 'dokter' || $activeMenu == 'dokter-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
            <div data-i18n="Misc">Dokter</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'dokter') active @endif ">
                <a href="/dokter" class="menu-link">
                    <div data-i18n="Error">Data Dokter</div>
                </a>
            </li>
        </ul>
    </li>

</ul>
