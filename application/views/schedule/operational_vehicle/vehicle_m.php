<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="float-left"><a href="<?php echo base_url('schedule/operational_vehicle'); ?>"><i
                            class="fas fa-arrow-circle-left"></i></a></h4>
                <h4 class="m-0 mb-2 text-center"><?php echo $title; ?></h4>
                <select class="custom-select text-center text-bold" id="select-vehicle">
                    <?php foreach ($list_vehicle as $list_v) { ?>
                    <option value="<?php echo $list_v['id_kendaraan']; ?>"
                        <?php if ($list_v['id_kendaraan'] == $vehicle_id) echo " selected"; ?>>
                        <?php if ($list_v['id_kendaraan'] != 'all') { ?>
                        <?php echo $list_v['deskripsi_kendaraan'] . "&nbsp;&nbsp;(" . $list_v['plat_nomor'] . ")"; ?>
                        <?php } else { ?>
                        <?php echo $list_v['deskripsi_kendaraan']; ?>
                        <?php } ?>
                    </option>
                    <?php } ?>
                </select>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="btn-group d-flex justify-content-center" role="group"
                            aria-label="Button group with nested dropdown">
                            <button class="btn btn-primary btn-add-event" id="button-add"><i
                                    class="fas fa-plus-circle"></i>
                                Add</button>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-file-excel"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id') . '&period=prev_month'); ?>">Bulan
                                        lalu</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id') . '&period=curr_month'); ?>">Bulan
                                        Ini</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id') . '&period=next_month'); ?>">Bulan
                                        depan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id') . '&period=prev_year'); ?>">Tahun
                                        lalu</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id') . '&period=curr_year'); ?>">Tahun
                                        Ini</a>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id') . '&period=next_year'); ?>">Tahun
                                        depan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        href="<?php echo base_url('schedule/operational_vehicle/export?id=' . $this->input->get('id')); ?>">Semua</a>
                                </div>
                            </div>
                            <button class="btn btn-primary" id="button-guide"><i class="fas fa-info-circle"></i>
                                Info</button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <h4 class="mb-2 text-center"><?php echo date('F Y') ?></h4>
                        <nav aria-label="Page navigation example" class="table-responsive">
                            <ul class="pagination my-calendar mb-3">
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /.card -->
                <!-- </div> -->
                <div class="card card-widget card-event-parent">
                    <div class="card-header">
                        <h5 class="mb-0 text-center selectedTitle">Jadwal <?php echo date('d F Y'); ?></h5>
                    </div>
                    <?php if ($today_event1['result']) { ?>
                    <?php $today_event1_count = count($today_event1['result']);
                        $te_count = 0; ?>
                    <?php foreach ($today_event1['result'] as $today_event1) { ?>
                    <div class="card-footer card-comments card-today p-2">
                        <input type="hidden" class="id_event"
                            value="<?php echo $today_event1['id_operational_vehicle']; ?>">
                        <div class="card-comment event-content">
                            <img class="img-circle img-sm"
                                src="<?php echo urlJimushoMinori(); ?>jimusho/hrd/data_entry/karyawan/foto/<?php echo $today_event1['foto']; ?>"
                                alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $today_event1['nama_karyawan']; ?>
                                    <br>
                                    <?php echo $today_event1['deskripsi_kendaraan'] . " (" . $today_event1['plat_nomor'] . ")"; ?>
                                </span>
                                <?php echo date('d-M-Y H:i', strtotime($today_event1['start_event'])) . " s/d <br>" . date('d-M-Y H:i', strtotime($today_event1['end_event'])); ?>
                                <br>
                                <?php echo $today_event1['keterangan']; ?>
                            </div>
                        </div>
                        <?php if (++$te_count === $today_event1_count) { ?>
                        <button type="button" class="btn btn-block btn-secondary mt-2 btn-add-event">Tambah
                            Jadwal</button>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } else { ?>
                    <div class="card-footer card-comments card-today p-2">
                        <div class="card-comment text-center">
                            <span class="h6 text-secondary"><em>- No Events -</em></span>
                        </div>
                        <button type="button" class="btn btn-block btn-secondary mt-2 btn-add-event">Tambah
                            Jadwal</button>
                    </div>
                    <?php } ?>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">Jadwal Aktif Bulan Ini</h5>
                    </div>
                    <div class="card-footer card-comments p-2">
                        <?php if ($this_month_event) { ?>
                        <?php foreach ($this_month_event as $this_month) { ?>
                        <input type="hidden" class="id_event"
                            value="<?php echo $this_month['id_operational_vehicle']; ?>">
                        <div class="card-comment event-content">
                            <img class="img-circle img-sm"
                                src="<?php echo urlJimushoMinori(); ?>jimusho/hrd/data_entry/karyawan/foto/<?php echo $this_month['foto']; ?>"
                                alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    <?php echo $this_month['nama_karyawan']; ?>
                                    <br>
                                    <?php echo $this_month['deskripsi_kendaraan'] . " (" . $this_month['plat_nomor'] . ")"; ?>
                                </span>

                                <?php echo date('d-M-Y H:i', strtotime($this_month['start_event'])) . " s/d <br>" . date('d-M-Y H:i', strtotime($this_month['end_event'])); ?>
                                <br>
                                <?php echo $this_month['keterangan']; ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } else { ?>
                        <div class="card-comment text-center">
                            <span class="h6 text-secondary"><em>- No Events -</em></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
    <!-- </div> -->
    <?php $this->load->view('schedule/operational_vehicle/modal'); ?>
</section>
<!-- /.content -->

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>mylib/js/myfunction.js"></script>

<script>
$(document).ready(function() {
    var getDaysOfMonth = function(year, month) {
        var monthDate = moment(year + '-' + month, 'YYYY-MM');
        var daysInMonth = monthDate.daysInMonth();
        var arrDays = [];
        while (daysInMonth) {
            var current = moment().date(daysInMonth);
            arrDays.push(current.format('D'));
            daysInMonth--;
        }
        return arrDays;
    };
    var dateList = getDaysOfMonth(moment().year(), moment().month() + 1);
    var list = "";
    var dateId = 1;

    dateList.reverse().forEach(function(date) {
        if (moment().format('D') == date) {
            list += "<li class='page-item'><span class='page-link todayDate' id='date" + dateId +
                "'>" +
                date +
                "</span></li>";
        } else {
            list += "<li class='page-item'><span class='page-link' id='date" + dateId + "'>" +
                date +
                "</span></li>";
        }
        dateId++;
    });

    $('.my-calendar').append(list);

    function myScroller(myDate) {
        var $scroller = $('.table-responsive');
        var scrollTo = $('#date' + myDate).parent().position().left - 17;
        $scroller
            .animate({
                'scrollLeft': scrollTo
            }, 500);
    }
    var myDate = moment().format('D');
    myScroller(myDate);

    $('#button-guide').click(function() {
        $('#modalguide').modal('toggle');
    });

    $(document).on('click', '.page-item', function() {
        var selectedDate = $(this).children().text();
        var selectedTitle = "<?php echo date('F Y'); ?>";
        var row = "";

        $.ajax({
            url: "<?php echo base_url() . "schedule/operational_vehicle/selectedDate?id=" . $this->input->get('id'); ?>",
            type: "POST",
            dataType: 'json',
            data: {
                selectedDate: selectedDate
            },
            success: function(data) {
                $('.card-today').remove();
                if (data.length > 0) {
                    for (i = 0; i < data.length; i++) {
                        row += "<div class='card-footer card-comments card-today p-2'>";
                        row += "<input type='hidden' class='id_event' value='" +
                            data[i][
                                'id_operational_vehicle'
                            ] + "'>";
                        row += "<div class='card-comment event-content'>";
                        row +=
                            "<img class='img-circle img-sm' src='<?php echo urlJimushoMinori(); ?>jimusho/hrd/data_entry/karyawan/foto/" +
                            data[i]['foto'] + "'alt='User Image'>";
                        row += "<div class='comment-text'>";
                        row += "<span class='username'> " + data[i]['nama_karyawan'] +
                            "</span>";
                        row += data[i]['start_event'] + " s/d <br>" + data[i]['end_event'] +
                            "<br>";
                        row += data[i]['keterangan'];
                        row += "</div>";
                        row += "</div>";
                        if (i + 1 === data.length) {
                            row +=
                                "<button type='button' class='btn btn-block btn-secondary mt-2 btn-add-event'>Tambah Jadwal</button>";
                        }
                        row += "</div>";
                    }
                } else {
                    row += "<div class='card-footer card-comments card-today p-2'>";
                    row += "<div class='card-comment text-center'>";
                    row += "<span class='h6 text-secondary'><em>- No Events -</em></span>";
                    row += "</div>";
                    row +=
                        "<button type='button' class='btn btn-block btn-secondary mt-2 btn-add-event'>Tambah Jadwal</button>";
                    row += "</div>";
                }
                $('.card-event-parent').append(row);
                $('.selectedTitle').text("Jadwal " + selectedDate + " " + selectedTitle);
            }
        });
    })

    $('#select-vehicle').change(function() {
        window.location.href = "<?php echo base_url('schedule/operational_vehicle/vehicle?id='); ?>" +
            this.value;
    });


    $(document).on('click', 'body .event-content', function() {
        $('#detail_event .modal-footer').remove();
        // var id_event = $('.id_event').val();
        var id_event = $(this).prev('.id_event').val();

        $.ajax({
            url: "<?php echo base_url() . "schedule/operational_vehicle/detail" ?>",
            type: "POST",
            dataType: 'json',
            data: {
                id_event: id_event
            },
            success: function(data) {
                $('#id_operational_vehicle_detail').val(data
                    .id_operational_vehicle);
                $('#id_kendaraan_detail').val(data.id_kendaraan);
                $('#mulai_pemakaian_detail').val(data.mulai_pemakaian);
                $('#selesai_pemakaian_detail').val(data.selesai_pemakaian);
                $('#keperluan_detail').val(data.keperluan);

                if (data.id_operational_vehicle != 0) {
                    $('#detail_event .modal-footer').remove();
                    $('#detail_event').append(
                        '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><a class="btn btn-primary getEdit"><i class="fa fa-edit"></i> Edit</a></div>'
                    );
                }

                $('#modaldetail').modal('toggle');
            }
        });
    });

    $(document).on('click', '.btn-add-event', function() {
        $('#modaladd .modal-body .divadd').remove();
        $('#modaladd').modal('toggle');
    });

    $(document).on('click', '.getEdit', function() {
        $('#modaldetail').modal('hide');
        $('#modaledit').modal('toggle');
        var id_operational_vehicle_detail = $('#id_operational_vehicle_detail').val();

        $.ajax({
            url: "<?php echo base_url() . "schedule/operational_vehicle/detail" ?>",
            type: "POST",
            dataType: 'json',
            data: {
                id_operational_vehicle_detail: id_operational_vehicle_detail
            },
            success: function(data) {
                $('#id_operational_vehicle_edit').val(data.id_operational_vehicle);
                $('#id_kendaraan_edit').val(data.id_kendaraan);

                $('#mulai_pemakaian_edit').val(data.mulai_pemakaian);
                $('#selesai_pemakaian_edit').val(data.selesai_pemakaian);
                $('#keperluan_edit').val(data.keperluan);
            }
        });
    })

    $('#add_event').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "schedule/operational_vehicle/add" ?>',
            data: $(this).serialize(),
            dataType: 'json',
            encode: true,
        }).done(function(data) {
            if (data.success) {
                $('#add_event').trigger("reset");
                $('#modaladd').modal('hide');
                $('#modaladd .modal-body .divadd').remove();
                window.location.reload();
            } else if (data.failed) {
                $('#modaladd .modal-body .divadd').remove();
                $('#modaladd .modal-body').prepend('<div class="divadd"></div>');

                obj = data.event;
                eventLength = obj.length;
                for (i = 0; i < eventLength; i++) {
                    var table = $(
                        '<div class="alert alert-danger" role="alert"><table></table></div>'
                    );
                    table.append($('<tr>').html(
                        '<td>Kendaraan</td><td>&nbsp:&nbsp</td><td><p>' +
                        obj[i].deskripsi_kendaraan + '</p></td>'));
                    table.append($('<tr>').html(
                        '<td>Waktu</td><td>&nbsp:&nbsp</td><td><p>' +
                        obj[i].start_event + '-' +
                        obj[i].end_event +
                        '</p></td>'));
                    table.append($('<tr>').html(
                        '<td>Digunakan Oleh</td><td>&nbsp:&nbsp</td><td><p>' +
                        obj[i].divisi + '</p></td>'));
                    table.append($('<tr>').html(
                        '<td>Keperluan</td><td>&nbsp:&nbsp</td><td><p>' +
                        obj[i].keperluan + '</p></td>'));
                    $('.divadd').append(table);
                    var judul = $(
                        '<h5>Kendaraan Tidak Bisa Digunakan !</h5>');
                    $('.divadd').prepend(judul);
                }
            }
        });
    });

    $('#edit_event').submit(function(event) {
        event.preventDefault();
        if ($('#mulai_pemakaian_edit').val() != '' && $('#selesai_pemakaian_edit').val() != '') {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() . "schedule/operational_vehicle/edit" ?>',
                data: $(this).serialize(),
                dataType: 'json',
                encode: true,
            }).done(function(data) {
                if (data.success) {
                    $('#edit_event').trigger("reset");
                    $('#modaledit').modal('hide');
                    $('#modaledit .modal-body .divedit').remove();
                    window.location.reload();
                } else if (data.failed) {
                    console.table(data);
                    $('#modaledit .modal-body .divedit').remove();
                    $('#modaledit .modal-body').prepend('<div class="divedit"></div>');

                    obj = data.event;
                    eventLength = obj.length;
                    for (i = 0; i < eventLength; i++) {
                        var table = $(
                            '<div class="alert alert-danger" role="alert"><table></table></div>'
                        );
                        table.append($('<tr>').html(
                            '<td>Kendaraan</td><td>&nbsp:&nbsp</td><td><p>' +
                            obj[i].deskripsi_kendaraan + '</p></td>'));
                        table.append($('<tr>').html(
                            '<td>Waktu</td><td>&nbsp:&nbsp</td><td><p>' + obj[i]
                            .start_event + '-' + obj[i].end_event + '</p></td>'));
                        table.append($('<tr>').html(
                            '<td>Digunakan Oleh</td><td>&nbsp:&nbsp</td><td><p>' +
                            obj[i].divisi + '</p></td>'));
                        table.append($('<tr>').html(
                            '<td>Keperluan</td><td>&nbsp:&nbsp</td><td><p>' +
                            obj[i].keperluan + '</p></td>'));
                        $('.divedit').append(table);
                        var judul = $(
                            '<h5>Kendaraan Tidak Bisa Digunakan !</h5>');
                        $('.divedit').prepend(judul);
                    }
                }
            });
        } else {
            $('#modaledit .modal-body .divedit').remove();
            $('#modaledit .modal-body').prepend('<div class="divedit"></div>');
            if ($('#mulai_pemakaian_edit').val() !== '') {
                $('.divedit').prepend(
                    '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Mulai Pemakaian Belum Diisi !</div>'
                );
            } else if ($('#selesai_pemakaian_edit').val() !== '') {
                $('.divedit').prepend(
                    '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Selesai Pemakaian Belum Diisi !</div>'
                );
            }
        }
    });
});
</script>