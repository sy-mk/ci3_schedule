<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="float-left title mr-3"><a href="<?php echo base_url('main'); ?>"><i
                            class="fas fa-arrow-circle-left"></i></a>
                </h1>
                <h1 class="m-0 page-header-title"><?php echo $title; ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Semua Kendaraan</h5>
                        <h5 class="mb-0 text-center">-</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event_all['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=all'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event_all['result'] as $today_event_all) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event_all['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event_all['deskripsi_kendaraan'] . " (" . $today_event_all['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event_all['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event_all['end_event'])); ?>
                                <br>
                                <?php echo $today_event_all['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Innova Hitam</h5>
                        <h5 class="mb-0 text-center">B 8880 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event1['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=2'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event1['result'] as $today_event1) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event1['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event1['deskripsi_kendaraan'] . " (" . $today_event1['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event1['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event1['end_event'])); ?>
                                <br>
                                <?php echo $today_event1['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Innova Gray</h5>
                        <h5 class="mb-0 text-center">B 8881 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event2['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=3'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event2['result'] as $today_event2) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event2['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event2['deskripsi_kendaraan'] . " (" . $today_event2['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event2['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event2['end_event'])); ?>
                                <br>
                                <?php echo $today_event2['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Isuzu ELF</h5>
                        <h5 class="mb-0 text-center">B 8882 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event3['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=7'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event3['result'] as $today_event3) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event3['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event3['deskripsi_kendaraan'] . " (" . $today_event3['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event3['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event3['end_event'])); ?>
                                <br>
                                <?php echo $today_event3['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Grand Max</h5>
                        <h5 class="mb-0 text-center">B 8883 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event4['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=14'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event4['result'] as $today_event4) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event4['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event4['deskripsi_kendaraan'] . " (" . $today_event4['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event4['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event4['end_event'])); ?>
                                <br>
                                <?php echo $today_event4['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Isuzu Elf</h5>
                        <h5 class="mb-0 text-center">B 8884 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event5['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=16'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event5['result'] as $today_event5) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event5['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event5['deskripsi_kendaraan'] . " (" . $today_event5['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event5['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event5['end_event'])); ?>
                                <br>
                                <?php echo $today_event5['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Mitsubishi Xpander</h5>
                        <h5 class="mb-0 text-center">B 8885 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event6['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=19'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event6['result'] as $today_event6) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event6['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event6['deskripsi_kendaraan'] . " (" . $today_event6['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event6['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event6['end_event'])); ?>
                                <br>
                                <?php echo $today_event6['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Xenia Putih</h5>
                        <h5 class="mb-0 text-center">B 8886 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event7['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=20'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event7['result'] as $today_event7) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event7['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event7['deskripsi_kendaraan'] . " (" . $today_event7['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event7['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event7['end_event'])); ?>
                                <br>
                                <?php echo $today_event7['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Mitsubishi Xpander</h5>
                        <h5 class="mb-0 text-center">B 8887 FFF</h5>
                    </div>
                    <div class="card-body card-body p-0 mt-3">
                        <div class="col-lg-12 col-12">
                            <div class="small-box bg-light bg-gradient">
                                <div class="inner">
                                    <h3><?php echo $today_event8['count']; ?></h3>
                                    <p>Jadwal Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <a href="<?php echo base_url('schedule/operational_vehicle/vehicle?id=21'); ?>"
                                    class="small-box-footer">
                                    Lihat Kalender <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($today_event8['result'] as $today_event8) { ?>
                    <div class="card-footer card-comments p-2">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="<?php echo getAvatar(); ?>" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event8['nama_user']; ?>
                                    <br>
                                    <?php echo $today_event8['deskripsi_kendaraan'] . " (" . $today_event8['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i:s', strtotime($today_event8['start_event'])) . " s/d <br>" . date('d-M-Y H:i:s', strtotime($today_event8['end_event'])); ?>
                                <br>
                                <?php echo $today_event8['keterangan']; ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.card -->
        <!-- </div> -->
    </div>
</section>
<!-- /.content -->