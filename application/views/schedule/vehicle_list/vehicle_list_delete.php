<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('main'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Schedule</li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-maximize" data-card-widget="maximize"><i
                            class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php echo form_open('', 'id="kendaraan_edit" autocomplete="off"'); ?>
                <div class="form-group row has-validation">
                    <label class="col-sm-3 col-form-label">Deskripsi Kendaraan</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskripsi_kendaraan" class="form-control" id="deskripsi_kendaraan"
                            placeholder="Deskripsi Kendaraan"
                            value="<?php echo set_value('deskripsi_kendaraan', $result['deskripsi_kendaraan']); ?>"
                            readonly>
                        <?php echo form_error('deskripsi_kendaraan'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row has-validation">
                    <label class="col-sm-3 col-form-label">Plat Nomor</label>
                    <div class="col-sm-9">
                        <input type="text" name="plat_nomor" class="form-control" id="plat_nomor"
                            placeholder="Plat Nomor"
                            value="<?php echo set_value('plat_nomor', $result['plat_nomor']); ?>" readonly>
                        <?php echo form_error('plat_nomor'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kondisi kendaraan</label>
                    <div class="col-sm-9">
                        <select name="kondisi" id="kondisi" class="form-control" readonly>
                            <option value="Boleh_Dipakai"
                                <?php echo set_select('kondisi', $result['kondisi'], ($result['kondisi'] === "Boleh_Dipakai" ? TRUE : FALSE)); ?>>
                                Boleh Dipakai
                            </option>
                            <option value="Tidak_Boleh_Dipakai"
                                <?php echo set_select('kondisi', $result['kondisi'], ($result['kondisi'] === "Tidak_Boleh_Dipakai" ? TRUE : FALSE)); ?>>
                                Tidak Boleh
                                Dipakai</option>
                        </select>
                        <?php echo form_error('kondisi'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"
                            placeholder="Keterangan"
                            readonly><?php echo set_value('keterangan', $result['keterangan']); ?></textarea>
                        <?php echo form_error('keterangan'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="float-right">
                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                    <a href="<?php echo base_url('schedule/vehicle_list'); ?>" class="btn btn-secondary"> <i
                            class="fas fa-undo"></i>
                        Back</a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->