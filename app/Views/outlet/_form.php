<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="MEtQa1VQTzlpMjIKFw8.dEN4E1h4Fz5TZHw0O2wceGZZPBgIHQEdYA==">
    <title>DB Outlets </title>
    <link href="<?php echo base_url();?>assets/home/store/form/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/kv-grid.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/bootstrap-dialog.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/jquery.resizableColumns.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/kv-grid-action.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/site.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url();?>assets/home/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/datatables/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/datatables/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/datatables/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/datatables/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <style>.bootstrap-dialog .modal-header.bootstrap-dialog-draggable{cursor:move}</style>
    <script src="/ci2/assets/home/employee/form/js/dialog.js"></script>
    <script type="text/javascript">var krajeeDialog_6d7f2d25={"id":"w2"};
        var krajeeDialogDefaults_c5bc98ea={"alert":{"type":"type-info","title":"Information","buttonLabel":"<span class=\"glyphicon glyphicon-ok\"></span> Ok"},"confirm":{"type":"type-warning","title":"Confirmation","btnOKClass":"btn-warning","btnOKLabel":"<span class=\"glyphicon glyphicon-ok\"></span> Ok","btnCancelLabel":"<span class=\"glyphicon glyphicon-ban-circle\"></span> Cancel"},"prompt":{"draggable":false,"title":"Information","buttons":[{"label":"Cancel","icon":"glyphicon glyphicon-ban-circle"},{"label":"Ok","icon":"glyphicon glyphicon-ok","class":"btn-primary"}],"closable":false},"dialog":{"draggable":true,"title":"Information","buttons":[{"label":"Cancel","icon":"glyphicon glyphicon-ban-circle"},{"label":"Ok","icon":"glyphicon glyphicon-ok","class":"btn-primary"}]}};
        var krajeeDialog=new KrajeeDialog(true,krajeeDialog_6d7f2d25,krajeeDialogDefaults_c5bc98ea);</script></head>
<body>

<div class="wrap">
    <?php $this->load->view('header'); ?>

    <div class="container">
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li class="active">Outlet List</li>
        </ul>

        <div class="employee-index">

            <h1>Outlet List</h1>
            <div class="pull-right" style="margin-bottom: 5px">
                <a class="btn btn-success" href="<?php echo base_url();?>create_outlet"><b>Add Outlets</b></a>
            </div>

            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>
            <br><br>

            <div  data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
                <div id="w1-pjax" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">

                    <!--//Table open-->
                    <table id="datatable"  class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="kv-align-center kv-align-middle">#</th>
                            <th class="kv-align-center kv-align-middle">Outlet Code</th>
                            <th class="kv-align-center kv-align-middle">Outlet Type</th>
                            <th class="kv-align-center kv-align-middle">Distributor</th>
                            <th class="kv-align-center kv-align-middle">Account</th>
                            <th class="kv-align-center kv-align-middle">Outlet Name</th>

                            <th class="kv-align-center kv-align-middle"> </th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if($fetch_data2){
                            $row_count = $this->uri->segment(3)+0;
                            foreach ($fetch_data2 as $rs) {$row_count++;
                                ?>
                                <tr>
                                    <td class="kv-align-center kv-align-middle"><?php echo $row_count;?></td>
                                    <td class="kv-align-center kv-align-middle"><?php echo $rs->outlet_code;?></td>
                                    <td class="kv-align-center kv-align-middle"><?php $s_type = $rs->s_type; if($s_type == 1){echo "MVP";} else if($s_type == 2){echo "KSP";} else if($s_type == 3){echo "MVP-P";} else if($s_type == 4){echo "NON-MVP";}?></td>
                                    <td class="kv-align-center kv-align-middle"><?php echo $this->Outlet_Model->fetch_distributor_name($rs->distributor);?></td>
                                    <td class="kv-align-center kv-align-middle"><?php echo $rs->account;?></td>
                                    <td class="kv-align-center kv-align-middle"><?php echo $rs->outlet; ?></td>


                                    <th class="kv-align-center kv-align-middle">

<!--                                        <a href="--><?php //echo base_url(); ?><!--add_photo/--><?php //echo $rs->outlet_id; ?><!--"-->
<!--                                           title="Add Photo" data-pjax="0">-->
<!--                                            <span class="glyphicon glyphicon-picture"></span>-->
<!--                                        </a>-->

                                        <a href="<?php echo base_url(); ?>outlet_view/<?php echo $rs->outlet_id; ?>"
                                           title="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>

                                        <a href="<?php echo base_url(); ?>outlet_update/<?php echo $rs->outlet_id; ?>"
                                           title="Update" data-pjax="0">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>

                                        <a href="<?php echo base_url(); ?>delete_outlet/<?php echo $rs->outlet_id; ?>"
                                           title="Delete" data-pjax="false"
                                           data-confirm="Are you sure you want to delete this outlet and all of its photos?"
                                           data-pjax-container="w1-pjax">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </th>

                                </tr>
                            <?php }}?>
                        </tbody>

                    </table>
                    <!--//Table close-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url();?>assets/home/store/form/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/bootstrap-dialog.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/jquery.resizableColumns.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/yii.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/yii.gridView.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/kv-grid-action.js"></script>
<script src="<?php echo base_url();?>assets/home/store/form/js/jquery.pjax.js"></script>

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

</body>
</html>
