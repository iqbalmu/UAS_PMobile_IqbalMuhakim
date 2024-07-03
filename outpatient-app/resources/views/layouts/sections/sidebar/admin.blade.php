<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item @if ($activeMenu == 'dashboard') active @endif">
        <a href="/" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    <!-- Poli -->
    <li class="menu-item @if ($activeMenu == 'poli') active @endif">
        <a href="{{ route('poli.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Poli">Poli</div>
        </a>
    </li>

    <!-- User -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>
    <li class="menu-item @if ($activeMenu == 'pasien' || $activeMenu == 'pasien-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Pasien</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'pasien') active @endif">
                <a href="{{ route('pasien.index') }}" class="menu-link">
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
                <a href="{{ route('dokter.index') }}" class="menu-link">
                    <div data-i18n="Error">Data Dokter</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'dokter-new') active @endif ">
                <a href={{ route('dokter.create') }} class="menu-link">
                    <div data-i18n="Error">Dokter Baru</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item @if ($activeMenu == 'apoteker' || $activeMenu == 'apoteker-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
            <div data-i18n="Misc">Apoteker</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'apoteker') active @endif ">
                <a href="{{ route('apoteker.index') }}" class="menu-link">
                    <div data-i18n="Error">Data Apoteker</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'apoteker-new') active @endif ">
                <a href="{{ route('apoteker.create') }}" class="menu-link">
                    <div data-i18n="Error">Apoteker Baru</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item @if ($activeMenu == 'admisi' || $activeMenu == 'admisi-new') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
            <div data-i18n="Misc">Admisi</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'admisi') active @endif ">
                <a href="{{ route('admisi.index') }}" class="menu-link">
                    <div data-i18n="Error">Data Admisi</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'admisi-new') active @endif ">
                <a href="{{ route('admisi.create') }}" class="menu-link">
                    <div data-i18n="Error">Admisi Baru</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
