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
        <li class="text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <a href="#" class="app-menu__item @if(request()->is('admin/state*') || request()->is('admin/pin*') || request()->is('admin/suburb*')) {{ 'active' }} @endif">
                <span class="app-menu__label">Master management</span>
                <i class="app-menu__icon fa fa-chevron-down"></i>
            </a>
        </li>
        <div id="collapseOne" class="collapse @if(request()->is('admin/state*') || request()->is('admin/pin*') || request()->is('admin/suburb*')) {{ 'show' }} @endif" aria-labelledby="headingOne" data-parent="#accordion">
            <!---State management-->
            <li>
                <a class="app-menu__item {{ request()->is('admin/state*') ? 'active' : '' }} {{ sidebar_open(['admin.state']) }}"
                    href="{{ route('admin.state.index') }}">
                    <i class="app-menu__icon fa fa-flag"></i>
                    <span class="app-menu__label">State management</span>
                </a>
            </li>
            <!---Pin code management-->
            <li>
                <a class="app-menu__item {{ request()->is('admin/pin*') ? 'active' : '' }} {{ sidebar_open(['admin.pin']) }}"
                    href="{{ route('admin.pin.index') }}"><i class="app-menu__icon fa fa-map-pin"></i>
                    <span class="app-menu__label">Pin code management</span>
                </a>
            </li>
            <!--- Suburb management --->
            <li>
                <a class="app-menu__item {{ request()->is('admin/suburb*') ? 'active' : '' }} {{ sidebar_open(['admin.suburb']) }}"
                    href="{{ route('admin.suburb.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                    <span class="app-menu__label">Suburb management</span>
                </a>
            </li>

        </div>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.business']) }}"
                href="{{ route('admin.business.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Business Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.business-advertisement']) }}"
                href="{{ route('admin.business.advertisement.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Business Advertisement</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.business-advertisement-report']) }}"
                href="{{ route('admin.business.advertisement.report.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label"> Advertisement Report</span>
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
            <a class="app-menu__item {{ sidebar_open(['admin.blog']) }}"
                href="{{ route('admin.localtrade.question.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Trade Questions</span>
            </a>
        </li>

        <li class="text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <a href="#" class="app-menu__item @if(request()->is('admin/market-cat*') || request()->is('admin/market-subcat*')) {{ 'active' }} @endif">
                <span class="app-menu__label">MarketPlace</span>
                <i class="app-menu__icon fa fa-chevron-down"></i>
            </a>
        </li>
        <div id="collapseThree" class="collapse @if(request()->is('admin/market-cat*') || request()->is('admin/market-cat*')) {{ 'show' }} @endif" aria-labelledby="headingOne" data-parent="#accordion">
            <li>
                <a class="app-menu__item {{ request()->is('admin/market-cat*') ? 'active' : '' }} {{ sidebar_open(['admin.market-cat']) }}"
                href="{{ route('admin.market-cat.index') }}"><i class="app-menu__icon fa fa-folder"></i>
            <span class="app-menu__label">Category management</span>
            </a>
            </li>
            <!---  Directory  management ---->
            <li>
                <a class="app-menu__item {{ request()->is('admin/market-subcat*') ? 'active' : '' }} {{ sidebar_open(['admin.market-subcat']) }}"
                    href="{{ route('admin.market-subcat.index') }}"><i class="app-menu__icon fa fa-folder"></i>
                    <span class="app-menu__label">Subcategory management</span>
                </a>
            </li>
        </div>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.settings']) }}"
                href="{{ route('admin.settings') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Site Settings</span>
            </a>
        </li>

    </ul>
</aside>
