<?php if (!isMobileResolution() || !getUserAgent()) { ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?php echo base_url(); ?>" class="brand-link text-center">
            <!-- <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Minori Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light">My Scheduler</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo getAvatar(); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $username; ?> <?php echo " - " . $divisi; ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline mt-2">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('main'); ?>" class="nav-link <?php echo $page['main']['a']; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-is-opening menu-open <?php echo $page['schedule']['li']; ?>">
                        <a href="#" class="nav-link <?php echo $page['schedule']['a']; ?>">
                            <i class="nav-icon fas fa-business-time"></i>
                            <p>
                                Schedule
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('schedule/operational_vehicle'); ?>" class="nav-link <?php echo $page['operational_vehicle']['a']; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Operational Vehicle</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('schedule/vehicle_list'); ?>" class="nav-link <?php echo $page['vehicle_list']['a']; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vehicle List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link <?php echo $page['main']['a']; ?>">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php } ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">