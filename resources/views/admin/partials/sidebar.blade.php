<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('backend/images/logo/logo-c.svg') }}" class="black_logo" alt="logo">
            <img src="{{ asset('backend/images/logo/logo-c-white.svg') }}" class="white_logo" alt="logo">
            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
    opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
        id="sidebar_menus">
        @php
            $route = Route::currentRouteName();
        @endphp
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">HOME</li>
            <li class="">
                <a href="{{ route('admin.dashboard') }}" class="navItem {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Home</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Driver</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.driver.index') }}" class="{{ $route == 'admin.driver.index' ? 'active' : '' }}">All Driver</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.driver.create') }}" class="{{ $route == 'admin.driver.create' ? 'active' : '' }}">Add Driver</a>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Employee</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.employee.index') }}" class="{{ $route == 'admin.employee.index' ? 'active' : '' }}">All Employee</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.employee.create') }}" class="{{ $route == 'admin.employee.create' ? 'active' : '' }}">Add Employee</a>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Car</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.car.index') }}" class="{{ $route == 'admin.car.index' ? 'active' : '' }}">All Car</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.car.create') }}" class="{{ $route == 'admin.car.create' ? 'active' : '' }}">Add Car</a>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Car History</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.car-history.index') }}" class="{{ $route == 'admin.car-history.index' ? 'active' : '' }}">All Car History</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.car-history.create') }}" class="{{ $route == 'admin.car-history.create' ? 'active' : '' }}">Add Car History</a>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Order</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.order.index') }}" class="{{ $route == 'admin.order.index' ? 'active' : '' }}">All Order</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.order.create') }}" class="{{ $route == 'admin.order.create' ? 'active' : '' }}">Add Order</a>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Order Level</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.order-level.index') }}" class="{{ $route == 'admin.order-level.index' ? 'active' : '' }}">All Order Level</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.order-level.create') }}" class="{{ $route == 'admin.order-level.create' ? 'active' : '' }}">Add Order Level</a>
                  </li>
                </ul>
              </li>

            <li class="sidebar-menu-title">User</li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>User</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.user.index') }}" class="{{ $route == 'admin.user.index' ? 'active' : '' }}">All User</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.user.create') }}" class="{{ $route == 'admin.user.create' ? 'active' : '' }}">Add User</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.user.archive') }}" class="{{ $route == 'admin.user.archive' ? 'active' : '' }}">Archive</a>
                  </li>
                </ul>
              </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
