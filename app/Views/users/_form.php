<!DOCTYPE html>
<html lang="en-US">
<title>Users Management</title>
<?= view('header'); ?>
<body>
<div class="wrap">
    <?= view('nav'); ?>

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

<!--additional js code here-->

</body>
</html>
