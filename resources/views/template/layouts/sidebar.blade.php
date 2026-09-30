@php
    $userMenu = Auth::user()->can('read', \App\Models\User::class);
    $settingMenu = Auth::user()->can('read', \App\Models\Setting::class);
    $seoSettingsMenu = [
        
    ];

    $hasAnySeoPermission = in_array(true, $seoSettingsMenu);
@endphp

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="javascript:void(0)" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/template/images/logo/logo-white.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/template/images/logo/logo-white.png') }}" alt="" height="100">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="javascript:void(0)" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/template/images/logo/logo-white.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/template/images/logo/logo-white.png') }}" alt="" height="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="bx bx-radio-circle-marked"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('backend.dashboard') }}">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                @if($userMenu)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('backend.users.index') }}">
                            <i class="bx bx-user-plus"></i> <span data-key="t-user-management">User Management</span>
                        </a>
                    </li>
                @endif

                @if($settingMenu)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('backend.settings.index', 'general') }}">
                        <i class="bx bx-cog"></i> <span data-key="t-user-management">Settings</span>
                    </a>
                </li>
                @endif
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
