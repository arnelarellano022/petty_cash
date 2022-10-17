<?php if (!isset($_SESSION['user_role'])) {return redirect()->to('/index');} ?>


<head>

    <link href="<?= base_url('assets/home/attendance/form/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/attendance/form/css/site.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/employee/form/css/kv-grid.css');?>" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?= base_url('assets/home/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/datatables/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/datatables/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/datatables/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/home/datatables/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');?>" rel="stylesheet">
</head>


