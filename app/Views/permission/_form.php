<?php if (!isset($_SESSION['user_role'])) {
    redirect('/index', 'refresh');
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Mk9DS0pLQi5rNiEqCBQzY0F8AHhnDDNEZngnG3MHdXFbOAsoAhoQdw==">
    <title>Permission Management</title>
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
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li class="active">Permission Management</li>
        </ul>
        <div class="attendance-index">

            <h1>Permission Management</h1>

            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>
            <br>

            <div style="text-align: left; margin-left: auto; margin-right: auto; margin-top: 0px; margin-bottom: 0px; width: 900px; background: #000;">

                <form id="w0" action="<?php echo base_url();?>insert_permission" method="post"   style="align: ">

                    <div class="col-sm-3">
                        <label class="control-label text-info" for="employee-department">User Role</label>
                        <select id="user_role" class="form-control" name="user_role"   >
                            <?php
                            if($fetch_roles){
                                foreach ($fetch_roles as $rs_role) {
                                    ?>
                                    <option value="<?php echo $rs_role->roles;?>"><?php echo "$rs_role->roles" ;?></option>
                                <?php }}?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label text-info" for="employee-department">Menu</label>
                        <select id="main_menu" class="form-control" name="main_menu"  >
                            <option selected hidden>Select Menu</option>

                            <?php
                            if($fetch_main){
                                foreach ($fetch_main as $rs_main) {
                                    ?>
                                    <option value="<?php echo $rs_main->id;?>"
                                    ><?php echo "$rs_main->title" ;?></option>

                                    <?php
                                }}   ?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label class="control-label text-info" for="employee-department">Sub Menu</label>
                        <select id="sub_menu" class="form-control" name="sub_menu"  >
                            <option selected hidden>Select Sub Menu</option>
                        </select>
                    </div>

                    <div style="margin-top: 4px" class = "pull-left">
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add Permission</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br> <br>
        <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" >
            <div id="w1" class="grid-view">
                <div </div>
            <br><br>
            <!--//Table open-->

            <table id="datatable"  class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th class="kv-align-center kv-align-middle">ID</th>
                    <th class="kv-align-center kv-align-middle">User Roles</th>
                    <th class="kv-align-center kv-align-middle">Menu</th>
                    <th class="kv-align-center kv-align-middle">Sub Menu</th>
                    <th class="kv-align-center kv-align-middle"></th>
                </tr>
                </thead>

                <tbody>
                <?php
                if($fetch_data){

                    foreach ($fetch_data as $rs) {
                        ?>
                        <tr>
                            <td class="kv-align-center kv-align-middle"><?php echo $rs->id;?></td>
                            <td class="kv-align-center kv-align-middle"><?php echo $rs->user_role;?></td>
                            <?php $this->load->model('Permission_Model');
                            $main = $this->Permission_Model->getMain_Name($rs->main_menu_id);
                            foreach ($main->result() as $main_rw){?>
                                <td class="kv-align-center kv-align-middle"><?php echo $main_rw->title;?></td><?php }
                            $sub= $this->Permission_Model->getSub_Name($rs->sub_menu_id);
                            foreach ($sub->result() as $sub_rw){?>
                                <td class="kv-align-center kv-align-middle"><?php echo $sub_rw->title;?></td><?php } ?>
                            <td class="kv-align-center kv-align-middle">

                                <a href="<?php echo base_url();?>delete_permission/<?php echo $rs->id;?>"
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
    var dataTable = $('table').dataTable();
    $("select#user_role").change( function () {
        var choosedFilter = $('#user_role').val();
        dataTable.fnFilter(choosedFilter,1,true,false);
    });

</script>
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
<script>
    $(document).ready(function(){
        $('#main_menu').change(function(){
            var sub_id = $('#main_menu').val();
            if(sub_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>permission/get_sub_category",
                    method:"POST",
                    data:{sub_id:sub_id},
                    success:function(data)
                    {
                        $('#sub_menu').html(data);
                    }
                });
            }
        });
    });
</script>

<SCRIPT language=JavaScript>
    function reload(form){
        var val=form.main_menu.options[form.main_menu.options.selectedIndex].value;
        self.location='_form.php?cat=' + val ;
    }
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
