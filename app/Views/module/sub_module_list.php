

<!-- Content Wrapper. Contains page content -->
<!--<div style="background-color: #F4F6F9; height: 10px "></div>-->
<div class="content-wrapper" >
    <?=  view('partial/message'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-list mt-2"></i>&nbsp;&nbsp;<b><?= $title ?></b></h3>
                </div>
                <div class="d-inline-block float-right">
                    <a href="<?= base_url('add_sub_module/'. $module_id); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW SUB MODULE</b></a>
                    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> <b>BACK</b></a>
                </div>
            </div>

            <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Sub Module Name</th>
                                <th style="text-align: center">Link</th>
                                <th style="text-align: center">Operation</th>
                                <th style="text-align: center">Action</th>

                            </tr>

                            </thead>
                            <tbody>
                            <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                                <tr>
                                    <td style="text-align: center"><?= $row->sub_module_id;?></td>
                                    <td style="text-align: center"><?= $row->sub_module_name;?></td>
                                    <td style="text-align: center"><?= $row->link;?></td>
                                    <td style="text-align: center"><?= $row->operation;?></td>

                                    <td style="text-align: center">
                                        <a href="<?php echo base_url("edit_sub_module/". $row->sub_module_id); ?>" class="btn btn-warning btn-xs mr5">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url("delete_sub_module/". $row->sub_module_id); ?>" class="btn btn-danger btn-xs mr5" data-confirm="Are you sure you want to delete this record?">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>

                                    </td>


                                </tr>
                            <?php }}?>

                            </tbody>
                        </table>
                <?= $current_uri; ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

