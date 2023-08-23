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
            <li class="sidebar-menu-title">Dashboard</li>
            <li class="">
                <a href="{{ route('admin.dashboard') }}" class="navItem {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>

            <li class="sidebar-menu-title">Main</li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:computer-desktop"></iconify-icon>
                        <span>Pemesanan</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.order.index') }}" class="{{ $route == 'admin.order.index' ? 'active' : '' }}">Semua Pemesanan</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.order.create') }}" class="{{ $route == 'admin.order.create' ? 'active' : '' }}">Tambah Pemesanan</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.order.excel') }}" class="{{ $route == 'admin.order.excel' ? 'active' : '' }}">Export Excel</a>
                  </li>
                </ul>
            </li>

            <li class="">
                <a href="{{ route('admin.order-level.index') }}" class="navItem {{ $route == 'admin.order-level.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:identification"></iconify-icon>
                        <span>Semua Persetujuan</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:cloud"></iconify-icon>
                        <span>Peminjaman</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.car-history.index') }}" class="{{ $route == 'admin.car-history.index' ? 'active' : '' }}">Semua Peminjaman</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.car-history.create') }}" class="{{ $route == 'admin.car-history.create' ? 'active' : '' }}">Tambah Peminjaman</a>
                  </li>
                </ul>
            </li>


            <li class="sidebar-menu-title">Data</li>
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
                    <a href="{{ route('admin.driver.index') }}" class="{{ $route == 'admin.driver.index' ? 'active' : '' }}">Semua Driver</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.driver.create') }}" class="{{ $route == 'admin.driver.create' ? 'active' : '' }}">Tambah Driver</a>
                  </li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Pegawai</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.employee.index') }}" class="{{ $route == 'admin.employee.index' ? 'active' : '' }}">All Pegawai</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.employee.create') }}" class="{{ $route == 'admin.employee.create' ? 'active' : '' }}">Add Pegawai</a>
                  </li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Mobil</span>
                    </span>
                  <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                  <li class="">
                    <a href="{{ route('admin.car.index') }}" class="{{ $route == 'admin.car.index' ? 'active' : '' }}">Semua Mobil</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.car.create') }}" class="{{ $route == 'admin.car.create' ? 'active' : '' }}">Tambah Mobil</a>
                  </li>
                </ul>
            </li>

            <li class="">
                <a href="{{ route('admin.log.index') }}" class="navItem {{ $route == 'admin.log.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:archive-box"></iconify-icon>
                        <span>Log</span>
                    </span>
                </a>
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
                    <a href="{{ route('admin.user.index') }}" class="{{ $route == 'admin.user.index' ? 'active' : '' }}">Semua User</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.user.create') }}" class="{{ $route == 'admin.user.create' ? 'active' : '' }}">Tambah User</a>
                  </li>
                  <li class="">
                    <a href="{{ route('admin.user.archive') }}" class="{{ $route == 'admin.user.archive' ? 'active' : '' }}">Arsip</a>
                  </li>
                </ul>
              </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
