<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-address-card mt-2"></i>
                        &nbsp; <b><?= $title ?></b> </h3>
                </div>
                <div class="d-inline-block float-right">
                    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> <b>BACK</b></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- form start -->
                            <div class="box-body">
                                <?php if($fetch_data){foreach ($fetch_data as $row) {?>


                                <div class ="row">
                                    <h1><?php echo $Full_Name ?></h1>
                                    <div class="col-sm-2">
                                        <?PHP $image_data = $row->image_src_filename;
                                        //if no image
                                        if($image_data == null){
                                            $image_data = "no_image.png";
                                        }
                                        ?>
                                        <p><img class="img-thumbnail" src="<?php echo base_url('uploads/' . $image_data)?>" style="width:auto; height:auto; border-width:3px"></p>
                                        <div class = "text-center">
                                            <a class="btn btn-primary col-sm-5"
                                               href="<?php echo base_url("edit_employee/". $row->employee_id); ?>"><b>Update</b></a>
                                            <a class="btn btn-danger col-sm-5"
                                               href="<?php echo base_url("delete_employee/". $row->employee_id); ?>"
                                               data-confirm="Are you sure you want to delete this item?" data-method="post"><b>Delete</b></a>
                                        </div>
                                    </div>

                                    <div class=" col-sm-10" >
                                        <table class="table table-bordered" style="text-align: center; font-size: large" >
                                            <tr>
                                                <th style="background-color: #D9EDF7; text-align: left" colspan="6" ><h5><b><i class="fa fa-info-circle mt-2"></i> EMPLOYEE INFORMATION</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >ID NUMBER</th><th colspan="5"><?= $row->id_no ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">LAST NAME</th><th><?= $row->last_name ?></th> <th style="width: 15%;background-color: #F4FAFD">FIRST NAME</th><th><?= $row->first_name ?></th> <th style="width: 15%;background-color: #F4FAFD">MIDDLE NAME</th><th><?= $row->middle_name ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >EDUCATIONAL</th><th colspan="5"><?= $row->educational_attainment ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >PRESENT ADDRESS</th><th colspan="5"><?= $row->present_address ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >PROVINCIAL ADDRESS</th><th colspan="5"><?= $row->permanent_address ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">BIRTHDAY</th><th colspan="2"><?= $row->birthday ?></th> <th style="width: 15%;background-color: #F4FAFD">CONTACT NUMBER</th><th colspan="2"><?= $row->contact_number ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">GENDER</th><th colspan="2"><?= $row->gender ?></th> <th style="width: 15%;background-color: #F4FAFD">CIVIL STATUS</th><th colspan="2"><?php
                                                    if($row->civil_status == 1){echo "Single";}
                                                    if($row->civil_status == 2){echo "Single w/ Children";}
                                                    if($row->civil_status == 3){echo "Married";}
                                                    if($row->civil_status == 4){echo "Married w/ Children";} ?> </th>
                                            </tr>

                                            <tr>
                                                <th style="background-color: #D9EDF7;text-align: left" colspan="6" ><h5><b><i class="fa fa-info-circle mt-2"></i> GOVERNMENT ID</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">SSS NUMBER</th><th colspan="2"><?= $row->sss ?></th> <th style="width: 15%;background-color: #F4FAFD">PHILHEALTH NUMBER</th><th colspan="2"><?= $row->phic ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">PAG-IBIG NUMBER</th><th colspan="2"><?= $row->hdmf ?></th> <th style="width: 15%;background-color: #F4FAFD">TIN NUMBER</th><th colspan="2"><?= $row->tin ?></th>
                                            </tr>

                                            <tr>
                                                <th style="background-color: #D9EDF7;text-align: left" colspan="6" ><h5><b> <i class="fa fa-info-circle mt-2"></i> CONTACT INFO</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >CONTACT PERSON</th><th colspan="5"><?= $row->e_contact_person ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >ADDRESS</th><th colspan="5"><?= $row->e_address ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%; background-color: #F4FAFD" colspan="1" >CONTACT NUMBER </th><th colspan="5"><?= $row->e_contact_no ?></th>
                                            </tr>

                                            <tr>
                                                <th style="background-color: #D9EDF7;text-align: left" colspan="6" ><h5><b><i class="fa fa-info-circle mt-2"></i> EMPLOYMENT INFORMATION</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">COMPANY</th><th colspan="2"><?= $row->company_name ?></th> <th style="width: 15%;background-color: #F4FAFD">DATE HIRED</th><th colspan="2"><?= $row->date_hired ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">POSITION</th><th colspan="2"><?= $row->position ?></th> <th style="width: 15%;background-color: #F4FAFD">DEPARTMENT</th><th colspan="2"><?= $row->dept_name ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">EMPLOYMENT STATUS</th><th><?php
                                                    if($row->employment_status == 1){echo "Regular";}
                                                    if($row->employment_status == 2){echo "Probationary";}
                                                    if($row->employment_status == 3){echo "Resigned";}
                                                    if($row->employment_status == 4){echo "AWOL";} ?> </th>
                                                <th style="width: 15%;background-color: #F4FAFD">EMPLOYEE RANK</th><th><?php
                                                    if($row->employment_status == 1){echo "S1";}
                                                    if($row->employment_status == 2){echo "S2";}
                                                    if($row->employment_status == 3){echo "S3";}
                                                    if($row->employment_status == 4){echo "S4";}
                                                    if($row->employment_status == 5){echo "S5";}?></th> <th style="width: 15%;background-color: #F4FAFD">DATE OF SEPARATION</th><th><?= $row->date_of_separation ?></th>
                                            </tr>

                                            <tr>
                                                <th style="background-color: #D9EDF7;text-align: left" colspan="6" ><h5><b><i class="fa fa-info-circle mt-2"></i> RECORD INFO</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">CREATED BY</th><th colspan="2"><?= get_user_role($row->created_by)  ?></th> <th style="width: 15%;background-color: #F4FAFD">CREATED AT</th><th colspan="2"><?= $row->created_at ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 15%;background-color: #F4FAFD">UPDATED BY</th><th colspan="2"><?= get_user_role($row->updated_by) ?></th> <th style="width: 15%;background-color: #F4FAFD">UPDATED AT</th><th colspan="2"><?= $row->updated_at ?></th>
                                            </tr>
                                        </table>



                                    </div>



                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
</div>



