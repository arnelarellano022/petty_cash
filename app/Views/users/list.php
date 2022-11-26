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
                    <a href="<?=  base_url('add_user');?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW USER</b></a>
                </div>
                <?php } ?>
            </div>

            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Username</th>
                        <th style="text-align: center">Roles</th>
                        <th style="text-align: center">First Name</th>
                        <th style="text-align: center">Last Name</th>
                        <th style="text-align: center">Created at</th>
                        <th style="text-align: center">Updated at</th>
                        <?php if($status_access == 1){ ?>
                        <th style="text-align: center">Status</th>
                        <?php } if($verify_account_access == 1){ ?>
                            <th style="text-align: center">Verify</th>
                        <?php } if($edit_access == 1 or $delete_access == 1){ ?>
                        <th style="text-align: center">Action</th>
                        <?php } ?>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                        <tr>
                            <td style="text-align: center"><?= $row->user_id;?></td>
                            <td style="text-align: center"><?= $row->username;?></td>
                            <td style="text-align: center"><?= $row->user_role;?></td>
                            <td style="text-align: center"><?= $row->firstname;?></td>
                            <td style="text-align: center"><?= $row->lastname?></td>
                            <td style="text-align: center"><?= $row->created_at;?></td>
                            <td style="text-align: center"><?= $row->updated_at;?></td>
                        <?php if($status_access == 1){ ?>
                            <td style="text-align: center">
                                    <input type='checkbox'
                                           class='tgl tgl-ios tgl_checkbox'
                                           data-id='<?= $row->user_id ?>'
                                           id='cb_<?= $row->user_id ?>'
                                            <?= ($row->status == 1)? "checked" : ""; ?>
                                    />
                                    <label class='tgl-btn' for='cb_<?= $row->user_id ?>'></label>
                            </td>

                            <?php } if($verify_account_access == 1){ ?>
                                <td style="text-align: center">
                                    <input type='checkbox'
                                           class='tgl tgl-ios tgl_checkbox_2'
                                           data-id='<?= $row->user_id ?>'
                                           id='cb2_<?= $row->user_id ?>'
                                        <?= ($row->is_verify == 1)? "checked" : ""; ?>
                                    />
                                    <label class='tgl-btn' for='cb2_<?= $row->user_id ?>'></label>
                                </td>

                        <?php } if($edit_access == 1 or $delete_access == 1){  ?>
                            <td style="text-align: center">
                        <?php if($edit_access == 1){ ?>
                                <a href="<?php echo base_url("edit_user/". $row->user_id); ?>" class="btn btn-warning btn-xs mr5">
                                    <i class="fas fa-edit"></i>
                                </a>
                        <?php } if($delete_access == 1){?>
                                <a href="<?php echo base_url("delete_user/". $row->user_id); ?>" class="btn btn-danger btn-xs mr5 "   data-confirm="Are you sure you want to delete this record?">
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


<script>
    function access_js() {

    $(document).on("change",".tgl_checkbox",function(){
        $.post('<?=base_url("/change_status")?>',
            {
                user_id : $(this).data('id'),
                status : $(this).is(':checked') == true ? 1:0
            },
            function(data){
                $.notify("Status Changed Successfully", "success");
            });
    });

    $(document).on("change",".tgl_checkbox_2",function(){
        $.post('<?=base_url("/change_verify_status")?>',
            {
                user_id     : $(this).data('id'),
                is_verify   : $(this).is(':checked') == true ? 1:0
            },
            function(data){
                $.notify("User has been verified", "success");
            });

    });

        $(document).on("click", ".sub_module_id", function(){
            alert(($("#sub_module_val").val()));
        });
    }
</script>