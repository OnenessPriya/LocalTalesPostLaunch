<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.users']) }}"
                href="{{ route('admin.users.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">User Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.business']) }}"
                href="{{ route('admin.business.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Business Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.event']) }}"
                href="{{ route('admin.event.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Event Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.deal']) }}"
                href="{{ route('admin.deal.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Deal Management</span>
            </a>
        </li>
        <!-- <li>
            <a class="app-menu__item {{ sidebar_open(['admin.property']) }}"
                href="{{ route('admin.property.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Property Management</span>
            </a>
        </li> -->
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.loop']) }}"
                href="{{ route('admin.loop.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Local Loops</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.notification']) }}"
                href="{{ route('admin.notification.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Send Notifications</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.category']) }}"
                href="{{ route('admin.category.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Category Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.banner']) }}"
                href="{{ route('admin.banner.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Banner Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.blog']) }}"
                href="{{ route('admin.blog.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Blog Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.settings']) }}"
                href="{{ route('admin.settings') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Site Settings</span>
            </a>
        </li>
        
    </ul>
</aside>