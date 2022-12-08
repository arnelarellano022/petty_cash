<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
    <?=  view('partial/message'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-list mt-2"></i>&nbsp;&nbsp;<b><?= $title ?></b></h3>
                </div>
                <?php if($add_access == 1){ ?>
                <div class="d-inline-block float-right">
                    <a href="<?=  base_url('add_requester');?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW REQUESTER</b></a>
                </div>
                <?php } ?>
            </div>

            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center">Requester ID</th>
                        <th style="text-align: center">Requester Name</th>
                        <th style="text-align: center">Requester Type</th>
                        <th style="text-align: center">Department</th>
                        <?php if($edit_access == 1 or $delete_access == 1){ ?>
                        <th style="text-align: center">Action</th>
                        <?php } ?>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                        <tr>
                            <td style="text-align: center"><?= $row->requester_id;?></td>
                            <td style="text-align: center"><?= $row->requester_name;?></td>
                            <td style="text-align: center"><?= $row->requester_type;?></td>
                            <td style="text-align: center"><?= $row->department;?></td>
                        <?php if($edit_access == 1 or $delete_access == 1){  ?>
                            <td style="text-align: center">
                        <?php if($edit_access == 1){ ?>
                                <a href="<?php echo base_url("edit_requester/". $row->requester_id); ?>" class="btn btn-warning btn-xs mr5">
                                    <i class="fas fa-edit"></i>
                                </a>
                        <?php } if($delete_access == 1){?>
                                <a href="<?php echo base_url("delete_requester/". $row->requester_id); ?>" class="btn btn-danger btn-xs mr5 "   data-confirm="Are you sure you want to delete this record?">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                        <?php } ?>
                            </td>
                        <?php } ?>
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

