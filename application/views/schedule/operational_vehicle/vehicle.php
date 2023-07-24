<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="float-left title mr-3"><a href="<?php echo base_url('schedule/operational_vehicle'); ?>"><i
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
        <!-- <div class="row"> -->
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex">
                    <div class="mr-auto">
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
                    </div>
                    <div class="btn-group page-top-button" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-primary btn-add-event" id="button-add"><i class="fas fa-plus-circle"></i>
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
                        <button type="button" class="btn btn-primary btn-maximize" data-card-widget="maximize"><i
                                class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div id='meeting_calendar'></div>
                </div>
            </div>
            <!-- /.card -->
            <!-- </div> -->
        </div>
    </div>
    <?php $this->load->view('schedule/operational_vehicle/modal'); ?>
</section>
<!-- /.content -->

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>mylib/js/myfunction.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('meeting_calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',
            right: 'prev,next today'
        },
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        selectable: true,
        events: '<?php echo base_url() . "schedule/operational_vehicle/vehicle_event/vehicle?id=" . $this->input->get('id'); ?>',
        eventOrder: "id_kendaraan, hour",
        eventDidMount: function(eventObj) {
            $(eventObj.el).popover({
                title: eventObj.event.extendedProps.pop_up_title,
                content: eventObj.event.extendedProps.pop_up_content,
                trigger: 'hover',
                html: true,
                sanitize: false,
                placement: 'top',
                container: 'body'
            });
        },
        eventClick: function(eventObj) {
            $('#detail_event .modal-footer').remove();
            var id_event = eventObj.event.id;

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
        },
        select: function(start) {
            $('#modaladd .modal-body .divadd').remove();
            $('#modaladd').modal('toggle');
        },
    });
    calendar.render();

    $(".fc-toolbar-chunk:not(:first) .btn-group").append(
        '<div class="input-group datediv ml-2"><div class="input-group"><div class="input-group-prepend calendarIcon"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="text" class="form-control float-right" id="tb_date"></div></div>'
    );

    $("#button-add").click(function() {
        $('#modaladd .modal-body .divadd').remove();
        $('#modaladd').modal('toggle');
    });

    $("#button-guide").click(function() {
        $('#modalguide').modal('toggle');
    });

    $("#tb_date").datepicker({
        format: 'yyyy-M',
        startView: "months",
        minViewMode: "months",
        autoclose: true,
        clearBtn: true
    });

    $('#tb_date').change(function() {
        var getdate = $('#tb_date').val();
        console.log(moment(getdate).format("yyyy-MM-DD"));
        calendar.gotoDate(moment(getdate).format("yyyy-MM-DD"));
    });

    $('.calendarIcon').click(function() {
        $(this).next('input').focus();
    });

    $('#select-vehicle').change(function() {
        window.location.href = "<?php echo base_url('schedule/operational_vehicle/vehicle?id='); ?>" +
            this.value;
    });

    $('.btn-maximize').on('maximized.lte.cardwidget', function() {
        calendar.refetchEvents();
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
                alert("Data Berhasil Disimpan !")
                $('#modaladd .modal-body .divadd').remove();
                calendar.refetchEvents();
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
                    alert("Data Berhasil Disimpan !")
                    $('#modaledit .modal-body .divedit').remove();
                    calendar.refetchEvents();
                } else if (data.failed) {
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