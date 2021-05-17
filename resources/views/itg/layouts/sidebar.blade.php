<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <i class="fa fa-tools nav-icon brand-image mt-2 ml-3"></i>
        <span class="brand-text font-weight-light">Admin Itg</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            เมนู
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('itg/domain')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Domain Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('itg/module')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Module Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
