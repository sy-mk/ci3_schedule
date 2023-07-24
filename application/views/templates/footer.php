</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php if (loggedSession()) { ?>
    <?php if (!isMobileResolution() || !getUserAgent()) { ?>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                <b>Version</b> 1.0
            </div>
            <strong><a href="https://github.com/sy-mk/ci3_schedule">sy-mk</a> &copy; <?php echo date('Y'); ?>.</strong>
        </footer>
    <?php } else { ?>
        <footer class="main-footer">
            <!-- Bottom Navbar -->
            <nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom p-0">
                <ul class="navbar-nav nav-justified w-100">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>" class="nav-link text-center">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            <span class="small d-block">Home</span>
                        </a>
                    </li>
                    <li class="nav-item dropup position-static">
                        <a href="#" class="nav-link text-center" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-up" viewBox="0 0 16 16">
                                <path d="M7.646 15.854a.5.5 0 0 0 .708 0L10.207 14H14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3.793l1.853 1.854zM1 9V6h14v3H1zm14 1v2a1 1 0 0 1-1 1h-3.793a1 1 0 0 0-.707.293l-1.5 1.5-1.5-1.5A1 1 0 0 0 5.793 13H2a1 1 0 0 1-1-1v-2h14zm0-5H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v2zM2 11.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1h-8a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0-.5.5z" />
                            </svg>
                            <span class="small d-block">Menu</span>
                        </a>
                        <div class="dropdown-menu p-0 w-100" aria-labelledby="dropdownMenuProfile">
                            <div class="card mb-0">
                                <div class="card-header border-bottom-0">
                                    <h4 class="text-center mb-0">Menu Selection</h4>
                                </div>
                                <div class="dropdown-divider mt-0"></div>
                                <a class="dropdown-item h5 mb-0" id="collapse-parent-operational-vehicle" data-toggle="collapse" href="#collapse-operational-vehicle" role="button" aria-expanded="false" aria-controls="collapse-operational-vehicle">
                                    <i class="fas fa-car text-danger align-middle w-10 icon-bottom-navbar"></i>Operational
                                    Vehicle
                                </a>
                                <div class="collapse" id="collapse-operational-vehicle">
                                    <div class="text-center row">
                                        <div class="col">
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle'); ?>">Schedule <br>
                                                List
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=all'); ?>">Semua
                                                <br> Kendaraan
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=2'); ?>">Innova
                                                Hitam <br> (B 8880 FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=3'); ?>">Innova
                                                Gray
                                                <br>
                                                (B
                                                8881 FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=7'); ?>">Isuzu
                                                ELF <br>
                                                (B
                                                8882
                                                FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=14'); ?>">Grand
                                                Max
                                                <br> (B
                                                8883
                                                FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=16'); ?>">Isuzu
                                                Elf
                                                <br> (B
                                                8884
                                                FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=19'); ?>">Mitsubishi
                                                Xpander <br> (B 8885 FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=20'); ?>">Xenia
                                                Putih
                                                <br>
                                                (B
                                                8885 FFF)
                                            </a>
                                            <a class="btn btn-sm btn-default m-1" href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=21'); ?>">Mitsubishi
                                                Xpander <br> (B 8886 FFF)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item h5" href="<?php echo base_url('schedule/vehicle_list'); ?>">
                                    <i class="fas fa-car-side text-danger align-middle w-10 icon-bottom-navbar"></i>Daftar
                                    Kendaraan
                                </a>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                <a href="#" class="nav-link text-center">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd"
                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                    <span class="small d-block">Search</span>
                </a>
            </li> -->
                    <li class="nav-item dropup">
                        <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                            <span class="small d-block">Profile</span>
                        </a>
                        <!-- Dropup menu for profile -->
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                            <!-- <a class="dropdown-item" href="#">Edit Profile</a>
                    <a class="dropdown-item" href="#">Notification</a>
                    <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </footer>
    <?php } ?>

    </div>
    <!-- ./wrapper -->
<?php } ?>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/main.js"></script>
</script>
<!-- Bootstrap Date Picker -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Custom JS File -->
<script src="<?= base_url(); ?>mylib/js/custom.js"></script>
<script src="<?= base_url(); ?>mylib/js/myfunction.js"></script>

<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script>
    <?php if ($this->session->flashdata('response')) { ?>
        <?php echo $this->session->flashdata('response') ?>
    <?php } ?>
</script>
<script>
    let width = $(window).width();
    let height = $(window).height();

    $.ajax({
        url: "<?php echo base_url(); ?>utils/setScreenResolution",
        method: "POST",
        data: {
            screen_width: width,
            screen_height: height
        }
    });
</script>
<script>
    // Prevent dropdown to be closed when we click on an accordion link
    $('#collapse-parent-meeting-room, #collapse-parent-meeting-zoom, #collapse-parent-operational-vehicle').on('click',
        function(event) {
            event.preventDefault();
            event.stopPropagation();
            $('.collapse').collapse('hide');
            $($(this).attr('href')).collapse('show');
        })
</script>
</body>

</html>