<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My &mdash; Scheduler</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <?php if (isset($assets)) { ?>
        <?php if ($assets === 'select2') { ?>
            <!-- Select2 -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <?php } ?>
    <?php } ?>

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">

    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fullcalendar/main.css">

    <!-- Bootstrap Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>mylib/css/custom.css">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dist/img/favicon.png">
</head>

<?php if (loggedSession()) { ?>
    <?php if (!isMobileResolution() || !getUserAgent()) { ?>

        <body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed sidebar-collapse">
        <?php } else { ?>

            <body class="hold-transition layout-footer-fixed">
            <?php } ?>
            <!-- Site wrapper -->
            <div class="wrapper">
            <?php } else { ?>

                <body class="hold-transition login-page">
                <?php } ?>