<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="{{ request()->is('administrative/dashboard') ? 'active' : '' }}">
                    <a href="/administrative/dashboard" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard </span>
                    </a>
                </li>
                <li class="{{ request()->is('administrative/category') ? 'active' : '' }}">
                    <a href="{{ route('administrative.category') }}" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Category</span>
                    </a>
                </li>
                <li class="{{ request()->is('administrative/sub-category') ? 'active' : '' }}">
                    <a href="{{ route('administrative.sub-category') }}" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Sub Category</span>
                    </a>
                </li>

                <li class="{{ request()->is('administrative/team') ? 'active' : '' }}">
                    <a href="{{ route('administrative.team') }}" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Our Team </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
