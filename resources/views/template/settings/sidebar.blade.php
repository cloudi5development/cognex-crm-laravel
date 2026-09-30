<ul class="list-group">
    <a href="{{ route('backend.settings.index', 'general')}}"><li class="list-group-item {{ request()->routeIs('backend.settings.index') && request()->route('type') === 'general' ? 'active' : '' }}"><i class="bx bx-cog align-middle me-2"></i> General </li></a>
    <a href="{{ route('backend.settings.index', 'mail')}}"><li class="list-group-item {{ request()->routeIs('backend.settings.index') && request()->route('type') === 'mail' ? 'active' : '' }}"><i class="bx bx-envelope align-middle me-2"></i> Email</li></a>
</ul>
