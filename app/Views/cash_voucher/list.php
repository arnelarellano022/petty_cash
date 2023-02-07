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
                    <a href="<?=  base_url('add_cash_voucher');?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW TRANSACTION</b></a>
                </div>
                <?php } ?>
            </div>

            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Voucher No.</th>
                        <th style="text-align: center">Requester</th>
                        <th style="text-align: center">Date</th>
                        <th style="text-align: center">Status</th>
                        <?php if($edit_access == 1 or $delete_access == 1 or $view_access == 1){ ?>
                        <th style="text-align: center">Action</th>
                        <?php } ?>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                        <tr>
                            <td style="text-align: center"><?= $row->cv_id;?></td>
                            <td style="text-align: center"><?= $row->voucher_no;?></td>
                            <td style="text-align: center"><?= $row->requester;?></td>
                            <td style="text-align: center"><?= $row->date;?></td>
                            <td style="text-align: center"><?= $row->status;?></td>
                        <?php if($edit_access == 1 or $delete_access == 1 or $view_access == 1){  ?>
                            <td style="text-align: center">
                        <?php if($view_access == 1){ ?>
                                <a href="<?php echo base_url("view_cash_voucher/". $row->cv_id); ?>" class="btn btn-info btn-xs mr5">
                                    <i class="fas fa-eye"></i>
                                </a>
                        <?php } if($edit_access == 1){ ?>
                                <a href="<?php echo base_url("edit_cash_voucher/". $row->cv_id); ?>" class="btn btn-warning btn-xs mr5">
                                    <i class="fas fa-edit"></i>
                                </a>
                        <?php } if($delete_access == 1){?>
                                <a href="<?php echo base_url("delete_cash_voucher/". $row->cv_id); ?>" class="btn btn-danger btn-xs mr5 "   data-confirm="Are you sure you want to delete this record?">
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

