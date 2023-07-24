<!-- Modal Guide -->
<div class="modal fade" id="modalguide" tabindex="-1" role="dialog" aria-labelledby="datelabel">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center float-none">
                    <span>Panduan Pemesanan Kendaraan</span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="announcement">
                    <p style="font-weight: bold;">Kendaraan yang dapat dipesan :<br><small style="color:#FF0000;font-style: italic;font-weight: normal;">*warna merah : sedang tidak
                            bisa dipakai</small></p>
                    <p>
                    <ol>
                        <?php foreach ($list_vehicle as $vehicle_list) { ?>
                            <?php if ($vehicle_list['id_kendaraan'] != "all") { ?>
                                <?php if ($vehicle_list['kondisi'] == 'Tidak_Boleh_Dipakai') { ?>
                                    <li style="color: #FF0000">
                                        <?= $vehicle_list['deskripsi_kendaraan'] . "&nbsp;&nbsp;(" . $vehicle_list['plat_nomor'] . ") (" . $vehicle_list['kondisi'] . ")"; ?>
                                    </li>
                                <?php } else { ?>
                                    <li><?= $vehicle_list['deskripsi_kendaraan'] . "&nbsp;&nbsp;(" . $vehicle_list['plat_nomor'] . ")"; ?>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ol>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Guide End -->

<!-- Modal Add -->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center float-none">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" autocomplete="off" id="add_event">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mulai Pemakaian</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control float-right" name="mulai_pemakaian" id="mulai_pemakaian" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Selesai Pemakaian</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control float-right" name="selesai_pemakaian" id="selesai_pemakaian" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kendaraan</label>
                        <div class="col-sm-9">
                            <select name="id_kendaraan" class="form-control" required>
                                <?php foreach ($list_vehicle as $list_vehicle_detail) { ?>
                                    <?php if ($list_vehicle_detail['id_kendaraan'] != "all") { ?>
                                        <option value="<?php echo $list_vehicle_detail['id_kendaraan']; ?>">
                                            <?php echo $list_vehicle_detail['deskripsi_kendaraan'] . "  (" . $list_vehicle_detail['plat_nomor'] . ")"; ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Keperluan</label>
                        <div class="col-sm-9">
                            <textarea name="keperluan" class="form-control" rows="5" placeholder="Keperluan Penggunaaan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add End -->

<!-- Modal Detail -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center float-none">Detail Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form method="post" enctype="multipart/form-data" autocomplete="off" id="detail_event">
                        <input type="hidden" name="id_operational_vehicle_detail" id="id_operational_vehicle_detail">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mulai Pemakaian</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control float-right" name="mulai_pemakaian" id="mulai_pemakaian_detail" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Selesai Pemakaian</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control float-right" name="selesai_pemakaian" id="selesai_pemakaian_detail" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kendaraan</label>
                            <div class="col-sm-9">
                                <select name="id_kendaraan" id="id_kendaraan_detail" class="form-control" disabled>
                                    <?php foreach ($list_vehicle as $list_vehicle_detail) { ?>
                                        <?php if ($list_vehicle_detail['id_kendaraan'] != "all") { ?>
                                            <option value="<?php echo $list_vehicle_detail['id_kendaraan']; ?>">
                                                <?php echo $list_vehicle_detail['deskripsi_kendaraan'] . "  (" . $list_vehicle_detail['plat_nomor'] . ")"; ?>
                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keperluan</label>
                            <div class="col-sm-9">
                                <textarea name="keperluan" class="form-control" id="keperluan_detail" rows="5" placeholder="Keperluan Penggunaaan" disabled></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail End -->

<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center float-none">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form method="post" enctype="multipart/form-data" autocomplete="off" id="edit_event">
                        <input type="hidden" name="id_operational_vehicle_edit" id="id_operational_vehicle_edit">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mulai Pemakaian</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control float-right" name="mulai_pemakaian" id="mulai_pemakaian_edit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Selesai Pemakaian</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control float-right" name="selesai_pemakaian" id="selesai_pemakaian_edit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kendaraan</label>
                            <div class="col-sm-9">
                                <select name="id_kendaraan" id="id_kendaraan_edit" class="form-control">
                                    <?php foreach ($list_vehicle as $list_vehicle_detail) { ?>
                                        <?php if ($list_vehicle_detail['id_kendaraan'] != "all") { ?>
                                            <option value="<?php echo $list_vehicle_detail['id_kendaraan']; ?>">
                                                <?php echo $list_vehicle_detail['deskripsi_kendaraan'] . "  (" . $list_vehicle_detail['plat_nomor'] . ")"; ?>
                                            </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keperluan</label>
                            <div class="col-sm-9">
                                <input type="text" id="keperluan_edit" class="form-control" name="keperluan" placeholder="Keperluan Penggunaaan">
                            </div>
                        </div>
                        <!-- Tambahan status untuk cancel/delete -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="OK" selected> OK (Sesuai Jadwal) </option>
                                    <option value="CANCEL"> Cancel / Delete </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit End -->