<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 color-default">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/images/gear.png') }}" alt="LOGO"
            class="brand-image img-circle elevation-3 bg-white">
        <span class="brand-text font-weight-ligth">DOC-MANAGE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel text-center mt-3 pb-3">
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->getFullName()}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class='nav-icon fas fa-th' style='font-size:24px'></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('document.index')}}" class="nav-link {{ Route::is('document.*') ? 'active' : '' }}">
                        <i class='nav-icon far fa-file-alt' style='font-size:24px'></i>
                        <p>รายการเอกสาร</p>
                    </a>
                </li>

                @if (auth()->user()->role_id == 1)
                <li class="nav-item {{ Route::is('setting.*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-chart-pie"></i>
                      <p>
                        ตั้งค่า
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: {{ Route::is('setting.*') ? 'block' : 'none' }}">
                      <li class="nav-item">
                        <a href="{{ route('setting.information.index') }}" class="nav-link {{ Route::is('setting.information.index') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>ข้อมูลพื้นฐาน</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('setting.user.index') }}" class="nav-link {{ Route::is('setting.user.index') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>จัดการผู้ใช้งาน</p>
                        </a>
                      </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <ul class="nav nav-pills nav-sidebar flex-column position-absolute bottom-0" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="onLogout();">
                    <i class='fas fa-sign-out-alt nav-icon' style='font-size:24px'></i>
                    <p>ออกจากระบบ</p>
                </a>

                <form action="{{route('logout')}}" method="post" id="logoutForm">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
