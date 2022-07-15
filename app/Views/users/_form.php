<?php if (!isset($_SESSION['user_role'])) {
    return redirect()->to('/index');
} ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Mk9DS0pLQi5rNiEqCBQzY0F8AHhnDDNEZngnG3MHdXFbOAsoAhoQdw==">
    <title>Users Management</title>
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


<body>

<div class="wrap">

    <?= view('header'); ?>

    <div class="container">
        <ul class="breadcrumb"><li><a href="<?=  base_url('dashboard');?>">Home</a></li>
            <li class="active">Users Management</li>
        </ul>
        <div class="attendance-index">

            <div class="pull-right">
                <p>
                    <a class="btn btn-success" href="<?=  base_url('create_user');?>">Create User</a>
                </p>
            </div>
            <h1>Users Management</h1>

            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
<!--                --><?php //echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>

            <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" >
                <div id="w1" class="grid-view">
                   </div>

                <!--//Table open-->
                <table id="datatable"  class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="kv-align-center kv-align-middle">ID</th>
                        <th class="kv-align-center kv-align-middle">Username</th>
                        <th class="kv-align-center kv-align-middle">Roles</th>
                        <th class="kv-align-center kv-align-middle">Created at</th>
                        <th class="kv-align-center kv-align-middle">Updated at</th>
                        <th class="kv-align-center kv-align-middle"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if($fetch_data){

                        foreach ($fetch_data as $rs) {
                            ?>
                            <tr>
                                <td class="kv-align-center kv-align-middle"><?=  $rs->user_id;?></td>
                                <td class="kv-align-center kv-align-middle"><?=  $rs->user_name;?></td>
                                <td class="kv-align-center kv-align-middle"><?=  $rs->user_roles?></td>
                                <td class="kv-align-center kv-align-middle"><?=  $rs->created_at;?></td>
                                <td class="kv-align-center kv-align-middle"><?=  $rs->updated_at;?></td>
                                <td class="kv-align-center kv-align-middle">
                                    <a href="<?php echo base_url();?>update_user/<?php echo $rs->user_id;?>" title="Update" aria-label="Update" data-pjax="0">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="<?php echo base_url();?>remove_user/<?php echo $rs->user_id;?>"
                                       title="Delete" data-pjax="false" data-confirm="Are you sure you want to delete this item?"  data-pjax-container="w1-pjax" >
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a >
                                </td>
                            </tr>
                        <?php }}?>
                    </tbody>
                </table>
                <!--//Table close-->
            </div>
        </div>
    </div>
</div>


<?= view('footer'); ?>

<script src="<?=  base_url('assets/home/attendance/form/js/jquery.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/yii.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/yii.gridView.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/jquery.pjax.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/bootstrap.js');?>"></script>

<!-- Datatables -->
<script src="<?=  base_url('assets/home/datatables/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>

<!--//Search-->
<script>

    init_DataTables();

    $('.dataTable').each ( function () { $(this).dataTable().fnDraw(); });

    /* DATA TABLES */

    function init_DataTables() {

        console.log('run_datatables');

        if( typeof ($.fn.DataTable) === 'undefined'){ return; }
        console.log('init_DataTables');

        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('checkbox input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();

    };


</script>

<script type="text/javascript">

    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });
</script>

<script type="text/javascript">jQuery(document).ready(function () {
        jQuery('#w1').yiiGridView({"filterUrl":"\/hris\/web\/index.php?r=attendance%2Findex","filterSelector":"#w1-filters input, #w1-filters select"});
        jQuery(document).pjax("#w0 a", {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#w0"});
        jQuery(document).on("submit", "#w0 form[data-pjax]", function (event) {jQuery.pjax.submit(event, {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#w0"});});
    });</script></body>
</html>
