<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('main'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Request Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="row">

                                <div class="col-lg-6 col-6">

                                    <div class="small-box bg-light bg-gradient">
                                        <div class="inner">
                                            <h3>2</h3>
                                            <p>Jadwal</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <a href="<?php echo base_url('schedule/operational_vehicle'); ?>"
                                            class="small-box-footer">
                                            Operational Vehicle <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-6">

                                    <div class="small-box bg-light bg-gradient">
                                        <div class="inner">
                                            <h3>2</h3>
                                            <p>Jadwal</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-car-side"></i>
                                        </div>
                                        <a href="<?php echo base_url('schedule/vehicle_list'); ?>"
                                            class="small-box-footer">
                                            Daftar Kendaraan <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Latest Activity</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Modul</th>
                                        <th>Waktu Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Booking Kendaraan</td>
                                        <td>2022-11-21 12:27:51</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Booking Kendaraan</td>
                                        <td>2022-11-21 12:27:51</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Booking Kendaraan</td>
                                        <td>2022-11-21 12:27:51</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Booking Kendaraan</td>
                                        <td>2022-11-21 12:27:51</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Booking Kendaraan</td>
                                        <td>2022-11-21 12:27:51</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Booking Kendaraan</td>
                                        <td>2022-11-21 12:27:51</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->