<ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
        <a class="nav-link @if ($step == 'account') active @endif"
            href="{{ route('pasien.create', 'account') }}"><i class="bx bxs-user me-1"></i>
            Account</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if ($step == 'profile') active @endif "
            href="{{ route('pasien.create', 'profile') }}"><i class="bx bxs-user-detail me-1"></i>
            Profile</a>
    </li>
</ul>
