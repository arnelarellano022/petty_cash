<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
    <?=  view('partial/message'); ?>

    <div class="modal modal-danger fade" id="modal-delete" data-backdrop="static">
        <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-book"></i> Delete Book Data </h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="hidden" id="delete-id" name="delete-id" />
                                    <input type="hidden" id="delete-title" name="delete-title" />
                                    <p>Are you sure to delete this data ?</p>
                                    <div class="callout callout-danger">
                                        <p>Title: <span class="delete-title"> </span></p>
                                        <p>Author: <span class="delete-author"> </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button id="btn-delete" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
                </div>
            </div>
        </div>
    </div>

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
                                <a href="<?php echo base_url("delete_user/". $row->user_id); ?>" class="btn btn-danger btn-xs mr5 " id="btn-delete-trig">
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

        $('#btn-delete-trig').on("click",function(){
        $('#modal-delete').modal('show');
    });
    }

</script>