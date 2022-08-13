<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-decoration-none">
        <img src="/assets/image/download.jpg" alt="BANK PALEMBANG" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">BANK PALEMBANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-decoration-none">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/" class="nav-link text-decoration-none {{ Request::is('/') ? 'active' : '' }}">
                        <i class="bi bi-speedometer"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a href="/register"
                            class="nav-link text-decoration-none {{ Request::is('register*') ? 'active' : '' }}">
                            <i class="bi bi-person-plus-fill"></i>
                            <p>
                                Daftar User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/arsip" class="nav-link text-decoration-none {{ Request::is('arsip*') ? 'active' : '' }}">
                            <i class="bi bi-archive-fill"></i>
                            <p>
                                Arsip Permohonan
                            </p>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link text-decoration-none {{ Request::is('marketing*') ? 'active' : '' }} {{ Request::is('analis*') ? 'active' : '' }}">
                            <i class="bi bi-credit-card-fill"></i>
                            <p>
                                Alur Kredit
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('marketing')
                                <li class="nav-item">
                                    <a href="/marketing"
                                        class="nav-link text-decoration-none {{ Request::is('marketing*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemohon Kredit</p>
                                    </a>
                                </li>
                            @elsecan('analis')
                                <li class="nav-item">
                                    <a href="/analis"
                                        class="nav-link text-decoration-none {{ Request::is('analis*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemohon Kredit</p>
                                    </a>
                                </li>
                            @elsecan('komite1')
                                <li class="nav-item">
                                    <a href="/manajer"
                                        class="nav-link text-decoration-none {{ Request::is('manajer*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemohon Kredit</p>
                                    </a>
                                </li>
                            @elsecan('komite2')
                                <li class="nav-item">
                                    <a href="/dirut"
                                        class="nav-link text-decoration-none {{ Request::is('dirut*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemohon Kredit</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
