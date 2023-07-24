<?php if (!isMobileResolution() || !getUserAgent()) { ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="<?php echo base_url(); ?>" class="navbar-brand">
                <!-- <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">My Scheduler</span>
            </a>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <button class="navbar-toggler order-1" type="button" data-widget="pushmenu" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
<?php } ?>