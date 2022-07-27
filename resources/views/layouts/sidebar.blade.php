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
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class='fas fa-th' style='font-size:24px'></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('document.index')}}" class="nav-link {{ Route::is('document.*') ? 'active' : '' }}">
                        <i class='far fa-file-alt' style='font-size:24px'></i>
                        <p>รายการเอกสาร</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('document.index')}}" class="nav-link {{ Route::is('document.*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>ข้อมูลพื้นฐาน</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('document.index')}}" class="nav-link {{ Route::is('document.*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>จัดการสิทธิ์ผู้ใช้งาน</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('document.index')}}" class="nav-link {{ Route::is('document.*') ? 'active' : '' }}">
                        <i class='fas fa-sign-out-alt' style='font-size:24px'></i>
                        <p>ออกจากระบบ</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
