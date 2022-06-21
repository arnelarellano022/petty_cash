<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');} $role = $this->session->user_role; ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="UkpyUkhzTG8LMxAzCiw9IiF5MWFlND0FBn0WAnE/ezA7PToxACIeNg==">
    <title>Update Outlet</title>
    <link href="<?php echo base_url();?>assets/home/store/form/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/create/css/fileinput.css" rel="stylesheet">

</head>
<body >

<div class="wrap">

    <?php $this->load->view('header'); ?>

    <?php foreach ($fetch_data as $row) {?>

    <div class="container">

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>outlet_index">Outlet List</a></li>
            <li class="active">Update Outlet</li>
        </ul>


        <div class="row" style="margin-top: -20px">
            <h1>Update Outlet</h1>
        </div>




        <div class="panel panel-info row " >

            <ul class="nav nav-tabs">
                <li class="active"><a href="#store" class="glyphicon glyphicon-home"><b style="font-family: Arial; margin-left: 10px">Outlet</b></a></li>
                <li><a href="#best_photo" class="glyphicon glyphicon-picture "><b style="font-family: Arial; margin-left: 10px">Photos</b></a></li>
            </ul>

            <form class="form-horizontal" action="<?php echo base_url();?>update_outlet_data/<?php echo $row->outlet_id;?>" method="post" enctype="multipart/form-data" data-toggle="validator" >

                <div class="tab-content " style="margin-left: 5px; margin-right: 5px">

                    <div id="store" class="tab-pane fade in active ">
                        <div class="col-lg-12 ">

                            <fieldset>
                                <div class="row">
                                    <legend class = "text-info" STYLE="margin-left: 8px; margin-top: 5px;">OUTLET INFORMATION</legend>
                                </div>
                                <input type="hidden" name="profpic_filename" value="<?php echo $row->profpic_filename;?>">

                                <div id="hide_field" <?php if($role == "Supermarket"){ echo "hidden";}  ?>>
                                    <div class="col-sm-6">
                                        <div class="form-group required" >
                                            <label class="control-label" >Customer Type</label>
                                            <select name="cust_type" id="cust_type" class="form-control"> <?php $cust_type = $row->cust_type;?>
                                                <option hidden value="">Select Customer Type</option>
                                                <option value="1" <?php if($cust_type == 1){echo "selected";} ?>>Distributor</option>
                                                <option value="2" <?php if($cust_type == 2){echo "selected";} ?>>Supermarket</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6" >
                                        <div class="form-group" style="margin-left: 1px">
                                            <label class="control-label">Distributor</label>
                                            <select  class="form-control" name="distributor" >
                                                <?php if($fetch_distributor){
                                                    foreach ($fetch_distributor->result() as $row_dist) {?>
                                                        <option value="" hidden>- Select Distributor -</option>
                                                        <option value="<?php echo $row_dist->distributor_id;?>"<?php if($row_dist->distributor_id == $row->distributor){ echo "selected";} ?>><?php echo "$row_dist->name" ;?></option>
                                                    <?php } } ?>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required">
                                        <label class="control-label" >Outlet Code</label>
                                        <input type="text" class="form-control" name="outlet_code" placeholder="Enter Store Code" value="<?php echo $row->outlet_code;?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Account</label>
                                        <input type="text" class="form-control" name="account" placeholder="Enter Account" value="<?php echo $row->account;?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Outlet</label>
                                        <input type="text" class="form-control" name="outlet" placeholder="Enter Outlet" value="<?php echo $row->outlet;?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" >
                                        <label class="control-label" >Outlet Type</label>
                                        <select name="s_type" id="s_type" class="form-control" required><?php $s_type = $row->s_type;?>
                                            <option hidden value="">Select Store Type</option>
                                            <option value="1" <?php if($s_type == 1){echo "selected";} ?>>MVP</option>
                                            <option value="2" <?php if($s_type == 2){echo "selected";} ?>>KSP</option>
                                            <option value="3" <?php if($s_type == 3){echo "selected";} ?>>MVP-P</option>
                                            <option value="4" <?php if($s_type == 4){echo "selected";} ?>>NON-MVP</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Store Address</label>
                                        <input type="text" class="form-control" name="s_address" placeholder="Enter Store Address" value="<?php echo $row->s_address;?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >City / Municipality</label>
                                        <input type="text" class="form-control" name="city" placeholder="Enter City / Municipality " value="<?php echo $row->city;?>"  required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Province</label>
                                        <input type="text" class="form-control" name="province" placeholder="Enter Province" value="<?php echo $row->province;?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" >
                                        <label class="control-label" >Discount</label>
                                        <input type="text" class="form-control" name="discount" placeholder="Enter Discount" value="<?php echo $row->discount;?>" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Discount Fee</label>
                                        <input type="text" class="form-control" name="dc_fee" placeholder="Enter Discount Fee" value="<?php echo $row->dc_fee;?>">
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Region</label>
                                        <select name="region" id="region" class="form-control c_region"> <?php $region = $row->region;?>
                                            <option hidden value="">Select Region</option>
                                            <option value="1" <?php if($region == 1){echo "selected";} ?>>Region 1</option>
                                            <option value="2" <?php if($region == 2){echo "selected";} ?>>Region 2</option>
                                            <option value="3" <?php if($region == 3){echo "selected";} ?>>Region 3</option>
                                            <option value="4" <?php if($region == 4){echo "selected";} ?>>Region 4A</option>
                                            <option value="5" <?php if($region == 5){echo "selected";} ?>>Region 5</option>
                                            <option value="6" <?php if($region == 6){echo "selected";} ?>>Region 6</option>
                                            <option value="7" <?php if($region == 7){echo "selected";} ?>>Region 7</option>
                                            <option value="8" <?php if($region == 8){echo "selected";} ?>>Region 8</option>
                                            <option value="9" <?php if($region == 9){echo "selected";} ?>>Region 9</option>
                                            <option value="10" <?php if($region == 10){echo "selected";} ?>>Region 10</option>
                                            <option value="11" <?php if($region == 11){echo "selected";} ?>>Region 11</option>
                                            <option value="12" <?php if($region == 12){echo "selected";} ?>>Region 12</option>
                                            <option value="13" <?php if($region == 13){echo "selected";} ?>>Region 13</option>
                                            <option value="14" <?php if($region == 14){echo "selected";} ?>>NCR</option>
                                            <option value="15" <?php if($region == 15){echo "selected";} ?>>CAR</option>
                                            <option value="16" <?php if($region == 16){echo "selected";} ?>>BARMM</option>
                                            <option value="17" <?php if($region == 17){echo "selected";} ?>>MIMAROPA Region</option>
                                            <option value="17" <?php if($region == 18){echo "selected";} ?>>NIR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Island Group</label>
                                        <input type="text" class="form-control" id="island_grp" name="island_grp" placeholder=""  required readonly value="<?php $island_grp = $row->island_grp; if($island_grp == 1){ echo "Luzon";} else if($island_grp == 2){ echo "Visayas";} else if($island_grp == 3){ echo "Mindanao";}?>">

                                    </div>
                                </div>


                                <div class="col-sm-3" >
                                    <div class="form-group required" >
                                        <label class="control-label" >Sampling Fee</label>
                                        <input type="text" class="form-control" name="samp_fee" placeholder="Enter Sampling Fee"  value="<?php echo $row->samp_fee;?>"  >
                                    </div>
                                </div>
                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Listing Fee</label>
                                        <input type="text" class="form-control" name="list_fee" placeholder="Enter Listing Fee"  value="<?php echo $row->list_fee;?>"  >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Terms of Payment</label>
                                        <input type="text" class="form-control" name="pay_terms" placeholder="Enter Terms of Payment" value="<?php echo $row->pay_terms;?>" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Collection Day</label>
                                        <select name="col_day" id="col_day" class="form-control"> <?php $col_day = $row->col_day;?>
                                            <option hidden value="">Select Day</option>
                                            <option value="1" <?php if($col_day == 1){echo "selected";} ?>>Monday</option>
                                            <option value="2" <?php if($col_day == 2){echo "selected";} ?>>Tuesday</option>
                                            <option value="3" <?php if($col_day == 3){echo "selected";} ?>>Wednesday</option>
                                            <option value="4" <?php if($col_day == 4){echo "selected";} ?>>Thursday</option>
                                            <option value="5" <?php if($col_day == 5){echo "selected";} ?>>Friday</option>
                                            <option value="6" <?php if($col_day == 6){echo "selected";} ?>>Saturday</option>
                                            <option value="7" <?php if($col_day == 7){echo "selected";} ?>>Sunday</option>
                                            <option value="7" <?php if($col_day == 8){echo "selected";} ?>>N/A</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" >
                                        <label class="control-label" >P.O. Account</label>
                                        <input type="text" class="form-control" name="po_acct" placeholder="Enter Classification" value="<?php echo $row->po_acct;?>">
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >No. of Check Out Counter</label>
                                        <input type="text" class="form-control" name="no_coc" placeholder="Enter No. of Check Out Counter"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $row->no_coc;?>"  >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Diser Status</label>
                                        <input type="text" class="form-control" name="d_status" placeholder="Enter Diser Status" value="<?php echo $row->d_status;?>"  >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Store Hours</label>
                                        <input type="text" class="form-control" name="s_hours" placeholder="Enter Store Hours" value="<?php echo $row->s_hours;?>"   >
                                    </div>
                                </div>



                                <div class="col-sm-3" >
                                    <div class="form-group required">
                                        <label class="control-label" >Store Manager</label>
                                        <input type="text" class="form-control" name="s_manager" placeholder="Enter Store Manager" value="<?php echo $row->s_manager;?>"   >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Store Supervisor</label>
                                        <input type="text" class="form-control" name="s_supervisor" placeholder="Enter Store Supervisor"  value="<?php echo $row->s_supervisor;?>"  >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Name of Purchaser</label>
                                        <input type="text" class="form-control" name="purch_name" placeholder="Enter Name of Purchaser" value="<?php echo $row->purch_name;?>"   >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Telephone No.</label>
                                        <input type="text" class="form-control" name="tel_no" placeholder="Enter Telephone No."  value="<?php echo $row->tel_no;?>"  >
                                    </div>
                                </div>


                            </fieldset>



                            </fieldset>


                            <br>
                            <fieldset>
                                <div class="row col">
                                    <legend class = "text-info">Upload Profile Photo </legend>
                                </div>
                                <div>
                                    <div>
                                        <label class="control-label" for="profile-image">Current Profile Photo</label><br>
                                        <ul class="list-inline" style="margin-left: 25px ; margin-top: 7px; display: inline-block">
                                            <li data-toggle="modal" data-target="#myModal">
                                                <?php if(!empty($row->profpic_filename)){ ?>
                                                    <img class="img-thumbnail" src="<?php echo $this->Outlet_Model->getProfilePic($row->profpic_filename) ;?>" style="width:320px;height:250px;">
                                                <?php } else { ?>
                                                    <img class="img-thumbnail" src="<?php echo $this->Outlet_Model->getNo_Image("Outlet_No_Image.jpg") ;?>" style="width:320px;height:250px;">
                                                <?php } ?>
                                            </li>
                                        </ul>

                                        <!--begin modal window-->
                                        <div class="modal fade" id="myModal" >
                                            <div class="modal-dialog" style="width:1020px; height:620px;">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <div class="pull-left">
                                                            <h3>Profile Photo</h3>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
                                                    </div>
                                                    <div class="modal-body" >

                                                        <!--begin carousel-->
                                                        <div id="myGallery" class="carousel slide" data-interval="false" style="width:1000px;height:700px;">

                                                            <div class="carousel-inner">
<!--                                                                <img src="--><?php //echo base_url() . "/uploads/outlet_profile_pic/" . $row->profpic_filename ;?><!--" style="width:1000px; height:700px;" >-->
                                                                <?php if(!empty($row->profpic_filename)){ ?>
                                                                    <img class="img-thumbnail" src="<?php echo $this->Outlet_Model->getProfilePic($row->profpic_filename) ;?>" style="width:1000px;height:700px;">
                                                                <?php } else { ?>
                                                                    <img class="img-thumbnail" src="<?php echo $this->Outlet_Model->getNo_Image("Outlet_No_Image.jpg") ;?>" style="width:1000px;height:700px;">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <!--end modal-body-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="pull-right">
                                                            <button class="btn btn-primary" type="button" data-dismiss="modal"><b>Close</b></button>
                                                        </div>
                                                        <!--end modal-footer-->
                                                    </div>
                                                    <!--end modal-content-->
                                                </div>
                                                <!--end modal-dialoge-->
                                            </div>
                                        </div>
                                        <!--end myModal-->
                                        <div class="col-sm-8 pull-right">
                                            <input type="file" id="profile-image" class="file-loading" name="prof_photo" accept="image/*" >
                                        </div>


                                        <div class="help-block"></div>
                                    </div>
                                </div>

                            </fieldset>
                            <br>
                            <fieldset id="w2">
                                <div class="row"><legend class = "text-info">CUSTOMER CARRIED SKU</legend></div>

                                <div style="margin-left: 250px;">

                                    <div class="col-sm-2" >
                                        <div class="form-group required">
                                            <label class="control-label" >Year</label>
                                            <input type="text" id="year" class="form-control" name="year" placeholder="Enter Year" maxlength="4"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group required" style="margin-left: 5px">
                                            <label class="control-label" > Confectionary</label>
                                            <input type="text" id="sku_confec" class="form-control" name="sku_confec" placeholder="Enter SKU"   onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                        </div>
                                    </div>

                                    <div class="col-sm-2" >
                                        <div class="form-group required"  style="margin-left: 5px">
                                            <label class="control-label" >Biscuit</label>
                                            <input type="text" id="sku_biscuit" class="form-control" name="sku_biscuit" placeholder="Enter SKU"   onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group required" style="margin-left: 5px">
                                            <label class="control-label" >Chocolate</label>
                                            <input type="text" id="sku_choco" class="form-control" name="sku_choco" placeholder="Enter SKU"   onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group required" style="margin-left: 5px; margin-top: 6px;">
                                            <br style="line-height: 26px">
                                            <button type="button" id="add_data" class="btn btn-primary" ><b>ADD</b></button>
                                        </div>

                                    </div>
                                </div>

                                <input type="hidden" name="pass_data" >
<!--                                <input type="hidden" name="pass_acct_name" value="--><?php //echo $row->acct_name;?><!--">-->
                                <input type="hidden" name="pass_created by" value="<?php echo $row->created_by;?>">
                                <input type="hidden" name="pass_created_at" value="<?php echo $row->created_at;?>">

                                <div class="col-sm-10 wrap" style="margin-left: 9%">

                                    <table id="data_table"  class="table table-striped table-bordered " STYLE="text-align: center;">
                                        <thead>
                                        <tr>
                                            <th class="kv-align-center kv-align-middle" style="width: 30%; text-align: center" >YEAR</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 30%; text-align: center" >CONFECTIONARY</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 30%; text-align: center" >BISCUIT</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 30%; text-align: center" >CHOCOLATE</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 5%; text-align: center"> </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($carried_sku as $row_c_sku) { ?>
                                            <tr>
                                                <td class="kv-align-center kv-align-middle"><?php echo $row_c_sku->year;?></td>
                                                <td class="kv-align-center kv-align-middle"><?php echo $row_c_sku->sku_confec;?></td>
                                                <td class="kv-align-center kv-align-middle"><?php echo $row_c_sku->sku_biscuit;?></td>
                                                <td class="kv-align-center kv-align-middle"><?php echo $row_c_sku->sku_choco;?></td>
                                                <td  class="kv-align-center kv-align-middle"><i onclick="myFunction()" style="color: red;" class="glyphicon glyphicon-trash"></i></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </fieldset>
                        </div>
                    </div>

                    <div id="best_photo" class="tab-pane fade">

                        <fieldset style="margin-top: 10px;">
                            <legend class = "text-info">UPLOAD BEST PHOTOS</legend>
                            <div class=" col-sm-12">
                                <div  class=" col-sm-3" >
                                    <label class="control-label" >Date Taken:</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control"  name="dtp_best"/>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>

                                <div class=" col-sm-9">
                                    <label class="control-label" for="best-image1"><b>Select Best Photos</b></label>
                                    <input type="file" id="best-image1" class="file-loading" name="best_photos[]" accept="image/*"   multiple="multiple"   >
                                    <div class="help-block"></div>
                                </div>
                        </fieldset>

                        <fieldset style="margin-top: 30px;">
                            <legend class = "text-info">UPLOAD LATEST PHOTOS </legend>
                            <div class=" col-sm-12">
                                <div  class=" col-sm-3" >
                                    <label class="control-label" >Date Taken:</label>
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control"  name="dtp_latest"/>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>

                                <div class=" col-sm-9">
                                    <label class="control-label" for="latest-image1"><b>Select Latest Photos</b></label>
                                    <input type="file" id="latest-image1" class="file-loading" name="latest_photos[]" accept="image/*"   multiple="multiple"   >
                                    <div class="help-block"></div>
                                </div>
                        </fieldset>

                    </div>







                </div>
        </div>
        <div class="pull-right" style="margin-right: 10px; margin-bottom: 10px">

            <button id="submit_but"  type="submit" value="upload" class="btn btn-success" onclick="OnLoad()">UPDATE STORE</button>
        </div>
        </form>
    </div>
</div>
</div>
<?php }?>

<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url();?>assets/datetimepicker/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/home/store/create/js/popper.min"></script>
<script src="<?php echo base_url();?>assets/home/store/create/js/fileinput.js"></script>

<script type="text/javascript">

    $(function(){

        $(document).on("change", ".c_region", function()
        {
            var region = $('#region').val();

            if(region == 1 || region == 2 || region == 3 || region == 4 || region == 5 || region == 14  || region == 15  || region == 17 ) {
                $('#island_grp').val('Luzon');
            }
            else if(region == 6 || region == 7 || region == 8 ){
                $('#island_grp').val('Visayas');
            }
            else if(region == 9 || region == 10 || region == 11 || region == 12 || region == 13 || region == 16 ){
                $('#island_grp').val('Mindanao');
            }
        });


        //set number for adding row
        $('#add_data').click(function(){

            var no = $('#no').val();
            var year = $('#year').val();
            var sku_confec = $('#sku_confec').val();
            var sku_biscuit = $('#sku_biscuit').val();
            var sku_choco = $('#sku_choco').val();
            var deleteed = '<i class="glyphicon glyphicon-trash" style="color: red;"></i>';

            //append inputs to table
            $('#data_table tbody:last-child').append(
                '<tr>'+
                '<td>'+year+'</td>'+
                '<td>'+sku_confec+'</td>'+
                '<td>'+sku_biscuit+'</td>'+
                '<td>'+sku_choco+'</td>'+
                '<td>'+deleteed+'</td>'+
                '</tr>'
            );
            //clear input data
            $('#year').val('');
            $('#sku_confec').val('');
            $('#sku_biscuit').val('');
            $('#sku_choco').val('');



            $(document).ready(function(){
                // Let's put this in the object like you want and convert to JSON (Note: jQuery will also do  this for you on the Ajax request)
                var fess_data = JSON.stringify(tableToJSON($("#data_table")));
                $("[name=pass_data]").val(fess_data);

            });

            function tableToJSON(tblObj){
                var data = [];
                var $headers = $(tblObj).find("th");
                var $rows = $(tblObj).find("tbody tr").each(function(index) {
                    $cells = $(this).find("td");
                    data[index] = {};
                    $cells.each(function(cellIndex) {
                        data[index][$($headers[cellIndex]).html()] = $(this).html();
                    });
                });
                return data;
            }

            var index, table = document.getElementById('data_table');

            for(var i = 0; i < table.rows.length; i++)
            {
                table.rows[i].cells[4].onclick = function()
                {
                    var c = confirm("Do you want to  delete this row?");
                    if(c === true)
                    {
                        index = this.parentElement.rowIndex;
                        table.deleteRow(index);
                        var fess_data2 = JSON.stringify(tableToJSON($("#data_table")));
                        $("[name=pass_data]").val(fess_data2);
                    }
                };
            }
        });
    });

</script>

<script>
    function OnLoad() {
        $('form').submit(function (e) {

            var $fileUpload = $("input[id='best-image1']");
            if (parseInt($fileUpload.get(0).files.length)>10){
                alert("You can only upload a maximum of 10 files");
                e.preventDefault();
            }

            var $fileUpload2 = $("input[id='latest-image1']");
            if (parseInt($fileUpload2.get(0).files.length)>10){
                alert("You can only upload a maximum of 10 files");
                e.preventDefault();
            }
        });

        $(document).ready(function(){
            // Let's put this in the object like you want and convert to JSON (Note: jQuery will also do  this for you on the Ajax request)
            var fess_data = JSON.stringify(tableToJSON($("#data_table")));
            $("[name=pass_data]").val(fess_data);
        });

        function tableToJSON(tblObj){
            var data = [];
            var $headers = $(tblObj).find("th");
            var $rows = $(tblObj).find("tbody tr").each(function(index) {
                $cells = $(this).find("td");
                data[index] = {};
                $cells.each(function(cellIndex) {
                    data[index][$($headers[cellIndex]).html()] = $(this).html();
                });
            });
            return data;
        }
    }
</script>


<script>
    function myFunction() {
        var index, table = document.getElementById('data_table');

        for(var i = 0; i < table.rows.length; i++)
        {
            table.rows[i].cells[2].onclick = function()
            {
                var c = confirm("Do you want to  delete this row?");
                if(c === true)
                {
                    index = this.parentElement.rowIndex;
                    table.deleteRow(index);
                    var fess_data2 = JSON.stringify(tableToJSON($("#data_table")));
                    $("[name=pass_data]").val(fess_data2);
                }
            };
        }
    }

</script>

<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();
            var y = $(event.relatedTarget).text();
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
</script>


<script type="text/javascript">
    var kvDatepicker_929f86bc = {"format":"yyyy-mm-dd"};
    var fileinput_occup_01 = {"allowedFileExtensions":["jpg","png"],"showUpload":false,"maxFileSize":100000,"language":"en","purifyHtml":true};
</script>


<script type="text/javascript">jQuery(document).ready(function ()
    {
        if (jQuery('#profile-image').data('fileinput')) { jQuery('#profile-image').fileinput('destroy'); }
        jQuery('#profile-image').fileinput(fileinput_occup_01);

        if (jQuery('#best-image1').data('fileinput')) { jQuery('#best-image1').fileinput('destroy'); }
        jQuery('#best-image1').fileinput(fileinput_occup_01);

        if (jQuery('#best-image2').data('fileinput')) { jQuery('#best-image2').fileinput('destroy'); }
        jQuery('#best-image2').fileinput(fileinput_occup_01);

        if (jQuery('#best-image3').data('fileinput')) { jQuery('#best-image3').fileinput('destroy'); }
        jQuery('#best-image3').fileinput(fileinput_occup_01);

        if (jQuery('#best-image4').data('fileinput')) { jQuery('#best-image4').fileinput('destroy'); }
        jQuery('#best-image4').fileinput(fileinput_occup_01);

        if (jQuery('#best-image5').data('fileinput')) { jQuery('#best-image5').fileinput('destroy'); }
        jQuery('#best-image5').fileinput(fileinput_occup_01);

        if (jQuery('#best-image6').data('fileinput')) { jQuery('#best-image6').fileinput('destroy'); }
        jQuery('#best-image6').fileinput(fileinput_occup_01);

        if (jQuery('#best-image7').data('fileinput')) { jQuery('#best-image7').fileinput('destroy'); }
        jQuery('#best-image7').fileinput(fileinput_occup_01);

        if (jQuery('#best-image8').data('fileinput')) { jQuery('#best-image8').fileinput('destroy'); }
        jQuery('#best-image8').fileinput(fileinput_occup_01);

        if (jQuery('#best-image9').data('fileinput')) { jQuery('#best-image9').fileinput('destroy'); }
        jQuery('#best-image9').fileinput(fileinput_occup_01);

        if (jQuery('#best-image10').data('fileinput')) { jQuery('#best-image10').fileinput('destroy'); }
        jQuery('#best-image10').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image1').data('fileinput')) { jQuery('#recent-image1').fileinput('destroy'); }
        jQuery('#recent-image1').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image2').data('fileinput')) { jQuery('#recent-image2').fileinput('destroy'); }
        jQuery('#recent-image2').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image3').data('fileinput')) { jQuery('#recent-image3').fileinput('destroy'); }
        jQuery('#recent-image3').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image4').data('fileinput')) { jQuery('#recent-image4').fileinput('destroy'); }
        jQuery('#recent-image4').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image5').data('fileinput')) { jQuery('#recent-image5').fileinput('destroy'); }
        jQuery('#recent-image5').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image6').data('fileinput')) { jQuery('#recent-image6').fileinput('destroy'); }
        jQuery('#recent-image6').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image7').data('fileinput')) { jQuery('#recent-image7').fileinput('destroy'); }
        jQuery('#recent-image7').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image8').data('fileinput')) { jQuery('#recent-image8').fileinput('destroy'); }
        jQuery('#recent-image8').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image9').data('fileinput')) { jQuery('#recent-image9').fileinput('destroy'); }
        jQuery('#recent-image9').fileinput(fileinput_occup_01);

        if (jQuery('#recent-image10').data('fileinput')) { jQuery('#recent-image10').fileinput('destroy'); }
        jQuery('#recent-image10').fileinput(fileinput_occup_01);

        if (jQuery('#latest-image1').data('fileinput')) { jQuery('#latest-image1').fileinput('destroy'); }
        jQuery('#latest-image1').fileinput(fileinput_occup_01);
    });

</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({"format":"Y-MM-DD"});
        $('#datetimepicker2').datetimepicker({"format":"Y-MM-DD"});

    });
</script>

</body>
</html>

