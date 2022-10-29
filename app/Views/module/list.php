

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
                    <a href="<?= base_url('add_module'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW MODULE</b></a>
                </div>
            </div>

            <div class="card-body">
                <!--//Table open-->
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Module Name</th>
                        <th style="text-align: center">Fa Icon</th>
                        <th style="text-align: center">Sort Order</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                            <tr>
                                <td style="text-align: center"><?= $row->module_id;?></td>
                                <td style="text-align: center"><?= $row->module_name;?></td>
                                <td style="text-align: center"><?= $row->fa_icon;?></td>

                                <td style="text-align: center">
                                    <a href="<?php echo base_url("edit_module/". $row->module_id); ?>" class="btn btn-warning btn-xs mr5">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url("delete_module/". $row->module_id); ?>" class="btn btn-danger btn-xs mr5">
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




<script>
    $(function () {
        $("#datatable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
//            .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//        $('#example2').DataTable({
//            "paging": true,
//            "lengthChange": false,
//            "searching": false,
//            "ordering": true,
//            "info": true,
//            "autoWidth": false,
//            "responsive": true,
//        });
    });
</script>