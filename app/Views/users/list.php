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
                    <a href="<?=  base_url('add_user');?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW USER</b></a>
                </div>
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
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center"></th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                        <tr>
                            <td style="text-align: center"><?= $row->user_id;?></td>
                            <td style="text-align: center"><?= $row->username;?></td>
                            <td style="text-align: center"><?= $row->roles;?></td>
                            <td style="text-align: center"><?= $row->firstname;?></td>
                            <td style="text-align: center"><?= $row->lastname?></td>
                            <td style="text-align: center"><?= $row->created_at;?></td>
                            <td style="text-align: center"><?= $row->updated_at;?></td>
                            <td style="text-align: center">
                                    <input type='checkbox'
                                           class='tgl tgl-ios tgl_checkbox'
                                           data-id='<?= $row->user_id ?>'
                                           id='cb_<?= $row->user_id ?>'
                                            <?= ($row->status == 1)? "checked" : ""; ?>
                                    />
                                    <label class='tgl-btn' for='cb_<?= $row->user_id ?>'></label>
                            </td>

                            <td style="text-align: center">
                                <a href="<?php echo base_url("edit_user/". $row->user_id); ?>" class="btn btn-warning btn-xs mr5">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url("delete_user/". $row->user_id); ?>" class="btn btn-danger btn-xs mr5 "   data-confirm="Are you sure you want to delete this record?">
                                    <i class="fas fa-trash-alt"></i>
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


<script>
    function access_js() {
    $("body").on("change",".tgl_checkbox",function(){
        $.post('<?=base_url("/change_status")?>',
            {
                user_id : $(this).data('id'),
                status : $(this).is(':checked') == true ? 1:0
            },
            function(data){
                $.notify("Status Changed Successfully", "success");
            });

    });

    }

</script>