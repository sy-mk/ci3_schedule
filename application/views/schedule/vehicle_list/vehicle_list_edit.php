<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="float-left title mr-3"><a href="<?php echo base_url('schedule/vehicle_list'); ?>"><i
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
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-maximize float-right" data-card-widget="maximize"><i
                        class="fas fa-expand"></i>
                </button>
            </div>
            <div class="card-body">
                <?php echo form_open('', 'id="kendaraan_edit" autocomplete="off"'); ?>
                <div class="form-group row has-validation">
                    <label class="col-sm-3 col-form-label">Deskripsi Kendaraan</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskripsi_kendaraan" class="form-control" id="deskripsi_kendaraan"
                            placeholder="Deskripsi Kendaraan"
                            value="<?php echo set_value('deskripsi_kendaraan', $result['deskripsi_kendaraan']); ?>">
                        <?php echo form_error('deskripsi_kendaraan'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row has-validation">
                    <label class="col-sm-3 col-form-label">Plat Nomor</label>
                    <div class="col-sm-9">
                        <input type="text" name="plat_nomor" class="form-control" id="plat_nomor"
                            placeholder="Plat Nomor"
                            value="<?php echo set_value('plat_nomor', $result['plat_nomor']); ?>">
                        <?php echo form_error('plat_nomor'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kondisi kendaraan</label>
                    <div class="col-sm-9">
                        <select name="kondisi" id="kondisi" class="form-control">
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
                            placeholder="Keterangan"><?php echo set_value('keterangan', $result['keterangan']); ?></textarea>
                        <?php echo form_error('keterangan'); ?>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url('schedule/vehicle_list'); ?>" class="btn btn-default"> <i
                        class="fas fa-arrow-circle-left"></i>
                    Back</a>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->