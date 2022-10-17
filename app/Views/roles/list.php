<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
    <?=  view('partial/message'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-list mt-2"></i>&nbsp;&nbsp;<b><?= $title ?></b></h3>
                </div>
                <div class="d-inline-block float-right">
                    <a href="<?= base_url('add_roles'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW ROLE</b></a>
                </div>
            </div>

            <div class="card-body">
                <!--//Table open-->

                <table id="example"  class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="kv-align-center kv-align-middle">ID</th>
                        <th class="kv-align-center kv-align-middle">Roles</th>
                        <th class="kv-align-center kv-align-middle"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if($fetch_data){foreach ($fetch_data as $rs) {?>
                            <tr>
                                <td class="kv-align-center kv-align-middle"><?= $rs->admin_role_id;?></td>
                                <td class="kv-align-center kv-align-middle"><?= $rs->admin_role_title;?></td>

                                <td>
                                    <a href="<?php echo base_url("update_roles"); ?>" class="btn btn-warning btn-xs mr5">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url("delete_roles"); ?>" class="btn btn-danger btn-xs mr5">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>

                                </td>


                            </tr>
                        <?php }}?>
                    </tbody>
                </table>

                <!--//Table close-->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<!--    <div class="container">-->
<!--        <ul class="breadcrumb">-->
<!--            <li>-->
<!--                <a href="--><?php //echo base_url();?><!--dashboard">Home</a>-->
<!--            </li>>-->
<!--            <li class="active">Roles Management</li>-->
<!--        </ul>-->
<!--        <div>-->
<!--            <div class="pull-right">-->
<!--                <p>-->
<!--                    <a class="btn btn-success" href="--><?php //echo base_url();?><!--create_roles">Create Roles</a>-->
<!--                </p>-->
<!--            </div>-->
<!--            <h1>Roles Management</h1>-->
<!---->
<!--            <div id="notif_fade" class="col-md-12">-->
<!--                --><?php //if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
<!--                --><?php //if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
<!--                <!--  --><?php ////echo validation_errors('<div class="alert alert-danger">','</div>');?>
<!--            </div>-->
<!---->
<!--            <div>-->
<!---->
<!---->
<!--                <!--//Table open-->
<!---->
<!--                <table id="datatable"  class="table table-striped table-bordered table-hover">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th class="kv-align-center kv-align-middle">ID</th>-->
<!--                        <th class="kv-align-center kv-align-middle">Roles</th>-->
<!--                        <th class="kv-align-center kv-align-middle"></th>-->
<!---->
<!--                    </tr>-->
<!--                    </thead>-->
<!---->
<!--                    <tbody>-->
<!--                    --><?php
//                    if($fetch_data){
//
//                        foreach ($fetch_data->result() as $rs) {
//                            ?>
<!--                            <tr>-->
<!--                                <td class="kv-align-center kv-align-middle">--><?php //echo $rs->id;?><!--</td>-->
<!--                                <td class="kv-align-center kv-align-middle">--><?php //echo $rs->roles;?><!--</td>-->
<!---->
<!--                                <td class="kv-align-center kv-align-middle">-->
<!--                                    <a href="--><?php //echo base_url();?><!--update_roles/--><?php //echo $rs->id ;?><!--" title="Update" aria-label="Update" data-pjax="0">-->
<!--                                        <span class="glyphicon glyphicon-pencil"></span>-->
<!--                                    </a>-->
<!--                                    <a href="--><?php //echo base_url();?><!--delete_roles/--><?php //echo $rs->id;?><!--"-->
<!--                                       title="Delete" data-pjax="false" data-confirm="Are you sure you want to delete this item?"  data-pjax-container="w1-pjax" >-->
<!--                                        <span class="glyphicon glyphicon-trash"></span>-->
<!--                                    </a >-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                        --><?php //}}?>
<!--                    </tbody>-->
<!--                </table>-->
<!---->
<!--                <!--//Table close-->
<!---->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->