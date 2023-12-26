<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Menu</span>
</li>

<li class="menu-item {{ $menuDashboard ?? '' }}">
    <a href="{{ route('main.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div data-i18n="Account Settings">Dashboard</div>
    </a>
</li>

<li class="menu-item {{ $menuPost ?? '' }}">
    <a href="{{ route('admin.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
        <div data-i18n="Account Settings">Perizinan</div>
    </a>
</li>

<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Jurusan</span>
</li>

<li class="menu-item {{ $menuPPL ?? '' }}">
    <a href="{{ route('ppl_class.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-code-alt"></i>
        <div data-i18n="Account Settings">PPL</div>
    </a>
</li>

<li class="menu-item {{ $menuDM ?? '' }}">
    <a href="{{ route('dm_class.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div data-i18n="Account Settings">DM</div>
    </a>
</li>