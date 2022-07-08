<?php if (!isset($_SESSION['user_role'])) {
    redirect('index', 'refresh');
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Mk9DS0pLQi5rNiEqCBQzY0F8AHhnDDNEZngnG3MHdXFbOAsoAhoQdw==">
    <title>Create Products</title>
    <link href="<?php echo base_url();?>assets/home/attendance/form/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/attendance/form/css/site.css" rel="stylesheet"></head>
<link href="<?php echo base_url();?>assets/home/employee/form/css/kv-grid.css" rel="stylesheet">

<!-- Datatables -->
<link href="<?php echo base_url();?>assets/home/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/home/datatables/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/home/datatables/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/home/datatables/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<body>

<div class="wrap">
    <?php $this->load->view('header'); ?>
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>products_index">Products List</a></li>
            <li class="active">Create Products</li>
        </ul>

        <div class="attendance-index">

            <h1>Create Products</h1>

            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>
            <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" >
                <div id="w1" class="grid-view"></div>

                <form id="w0" action="<?php echo base_url();?>insert_products" method="post">

                    <input type="hidden" >
                    <br>
                    <div >
                        <label class="control-label" >SKU</label>
                        <input type="text"  class="form-control" name="sku">
                        <div class="help-block"></div>
                    </div>
                    <div >
                        <label class="control-label" >Category</label>
                        <input type="text"  class="form-control" name="category">
                        <div class="help-block"></div>
                    </div>
                    <div >
                        <label class="control-label" >Sub-Category</label>
                        <input type="text"  class="form-control" name="sub_category">
                        <div class="help-block"></div>
                    </div>
                    <div >
                        <label class="control-label" >Description</label>
                        <input type="text"  class="form-control" name="description">
                        <div class="help-block"></div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Products</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url();?>assets/home/attendance/form/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/home/attendance/form/js/yii.js"></script>
<script src="<?php echo base_url();?>assets/home/attendance/form/js/yii.gridView.js"></script>
<script src="<?php echo base_url();?>assets/home/attendance/form/js/jquery.pjax.js"></script>
<script src="<?php echo base_url();?>assets/home/attendance/form/js/bootstrap.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/home/datatables/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


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