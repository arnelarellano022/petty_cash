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
                    <a href="<?=  base_url('add_employee');?>" class="btn btn-success"><i class="fa fa-plus"></i> <b>ADD NEW EMPLOYEE</b></a>
                </div>
                <?php } ?>
            </div>

            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">ID Number</th>
                        <th style="text-align: center">Last Name</th>
                        <th style="text-align: center">First Name</th>
                        <th style="text-align: center">Company</th>
                        <th style="text-align: center">Employment Status</th>
                        <?php  if($edit_access == 1 or $delete_access == 1 or $view_access == 1){ ?>
                        <th style="text-align: center">Action</th>
                        <?php } ?>
                    </tr>

                    </thead>
                    
                    <tbody>

                    <?php
                    if($fetch_data){
                        $row_count = 0;

                   foreach ($fetch_data as $row) { $row_count++;?>
                        <tr>
                            <td style="text-align: center ;padding: 40px 0;"><?=  $row_count;?></td>
                            <td style="text-align: center"><?php
                                $image_data = $row->image_src_filename;
                                //if no image
                                if($image_data == null){
                                    $image_data = "no_image.png";
                                }
                                $dirname =  "uploads/";
                                //                                                ?>
                                <img src="<?= base_url("uploads/".$image_data) ?>" alt="Emp Image" width=80, height=80 /><br></td>
                            <td style="text-align: center ;padding: 40px 0;"><?= $row->id_no;?></td>
                            <td style="text-align: center ;padding: 40px 0;"><?= $row->last_name;?></td>
                            <td style="text-align: center ;padding: 40px 0;"><?= $row->first_name;?></td>
                            <td style="text-align: center ;padding: 40px 0;"><?= $row->company_name; ?></td>
                            <td style="text-align: center ;padding: 40px 0;"><?php
                               if($row->employment_status == 1){echo "Regular";}
                               if($row->employment_status == 2){echo "Probationary";}
                               if($row->employment_status == 3){echo "Resigned";}
                               if($row->employment_status == 4){echo "AWOL";} ?>
                            </td>

                        <?php  if($edit_access == 1 or $delete_access == 1 or $view_access == 1) {  ?>
                            <td style="text-align: center ;padding: 40px 0;">
                        <?php if($view_access == 1){ ?>
                               <a href="<?php echo base_url("view_employee/". $row->employee_id); ?>" class="btn btn-info btn-xs mr5">
                                   <i class="fas fa-eye"></i>
                               </a>
                        <?php } if($edit_access == 1){ ?>
                                <a href="<?php echo base_url("edit_employee/". $row->employee_id); ?>" class="btn btn-warning btn-xs mr5">
                                    <i class="fas fa-edit"></i>
                                </a>
                        <?php } if($delete_access == 1){?>
                                <a href="<?php echo base_url("delete_employee/". $row->employee_id); ?>" class="btn btn-danger btn-xs mr5 "   data-confirm="Are you sure you want to delete this record?">
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
