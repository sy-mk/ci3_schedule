<link rel="stylesheet" href="<?php echo base_url(); ?>mylib/css/custom_datatable.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="float-left title mr-3"><a href="<?php echo base_url('main'); ?>"><i class="fas fa-arrow-circle-left"></i></a>
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
        <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-end">
                <div class="btn-group page-top-button" role="group" aria-label="Button group with nested dropdown">
                    <a href="<?php echo base_url('schedule/vehicle_list/add'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                        Add</a>
                    <button type="button" class="btn btn-primary btn-maximize" data-card-widget="maximize"><i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-3">
                <table id="data" class="table table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Deskripsi Kendaraan</th>
                            <th>Plat Nomor</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($vehicle_list as $v_list) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $v_list['deskripsi_kendaraan']; ?></td>
                                <td><?php echo $v_list['plat_nomor']; ?></td>
                                <td><?php echo $v_list['kondisi']; ?></td>
                                <td><?php echo $v_list['keterangan']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('schedule/vehicle_list/edit/' . $v_list['id_kendaraan']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- /.card -->
                <!-- </div> -->
            </div>
        </div>
</section>
<!-- /.content -->

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>mylib/js/myfunction.js"></script>
<script src="<?php echo base_url(); ?>mylib/js/filter_datatable.js"></script>

<script>
    $('#data').dataTable({
        'responsive': true
    });
</script>