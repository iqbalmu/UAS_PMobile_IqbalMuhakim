<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item @if ($activeMenu == 'dashboard') active @endif">
        <a href="/" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div>Dashboards</div>
        </a>
    </li>

    <li class="menu-item @if ($activeMenu == 'tebus-obat') active @endif">
        <a href="{{route('tebus-obat.index')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div>Tebus Obat</div>
        </a>
    </li>

    <!-- Data -->
    {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li> --}}
    <li class="menu-item @if ($activeMenu == 'obat' || $activeMenu == 'obat-input') active open @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
            <div>Obat</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @if ($activeMenu == 'obat') active @endif ">
                <a href="/obat" class="menu-link">
                    <div>Data Obat</div>
                </a>
            </li>
            <li class="menu-item @if ($activeMenu == 'obat-input') active @endif ">
                <a href="/obat/input" class="menu-link">
                    <div>Input Obat</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
