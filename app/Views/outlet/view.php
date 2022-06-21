<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');} $role = $this->session->user_role; ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="ajB0eFNsRlFaYy4oIRogCQNnAigpLgQTWkMeFx8ZJQJcRE0gATY1FA==">
    <title>Outlet Information</title>
    <link href="<?php echo base_url();?>assets/home/store/view/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/view/css/kv-detail-view.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/view/css/bootstrap-dialog.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/view/css/kv-widgets.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/view/css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/tabpage/css/tabpage.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/home/store/view/js/dialog.js"></script>
    <!--Datatables-->
    <link href="<?php echo base_url(); ?>assets/home/newdatatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/newdatatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--DateRangePicker-->
    <link href="<?php echo base_url(); ?>assets/home/payroll/css/daterangepicker.css" rel="stylesheet">
    <style>.centeralign {  text-align: center;  }</style>
</head>

<body>

<div class="wrap">
    <?php $this->load->view('header'); ?>

    <?php foreach ($fetch_data as $row) {?>

    <div class="container">
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>outlet_index">Outlet List</a></li>
            <li class="active"><?php echo $row->account; ?></li>
        </ul>
        <div id="notif_fade" class="col-md-12">
            <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
            <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
            <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
        </div>
        <div class="pull-right" style="margin-bottom: 10px">
            <!--            <a class="btn btn-primary" href="--><?php //echo base_url();?><!--add_photo/--><?php //echo $row->outlet_id; ?><!--">Add Photos</a>-->
            <a class="btn btn-success"  href="<?php echo base_url();?>outlet_update/<?php echo $row->outlet_id; ?>">Update Outlet</a>

        </div>
        <div >
            <div class="employee-view">
                <div class ="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="panel panel-info row">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#outlet" class="glyphicon glyphicon-home"><b style="font-family: Arial; margin-left: 10px">Outlet</b></a></li>
                                    <li><a href="#photos" class="glyphicon glyphicon-picture "><b style="font-family: Arial; margin-left: 10px">Photos</b></a></li>

                                </ul>


                                <div class="tab-content " style="margin-left: 5px; margin-right: 5px">

                                    <div id="outlet" class="tab-pane fade in active ">
                                        <div class="col-lg-12 ">
                                            <br>
                                            <table id="w0" class="table table-bordered table-condensed table-striped detail-view" data-krajee-kvDetailView="kvDetailView_938deba0">


                                                <div style="width:100%; height:650px;">


                                                    <?php if(!empty($row->profpic_filename)){ ?>
                                                        <img src="<?php echo $this->Outlet_Model->getProfilePic($row->profpic_filename) ;?>" style="width:100%; height:100%; margin-bottom: 10px ; float: left;  "  alt="Profile Picture">
                                                    <?php } else { ?>
                                                            <img src="<?php echo $this->Outlet_Model->getNo_Image("Outlet_No_Image.jpg") ;?>" style="width:100%; height:100%; margin-bottom: 10px ; float: left;  "  alt="Profile Picture">
                                                    <?php } ?>
                                                </div>

                                                <input type="hidden" id="outlet_id" value="<?php echo $row->outlet_id; ?>">
                                                <table id="w0" class="table table-bordered table-condensed table-striped detail-view" style="width: 100%; margin-top:  -310px  ">

                                                    <tr  <?php if($role === "Supermarket"){ echo "hidden";} ?>>
                                                        <th  style="width: 18%; text-align: center; vertical-align: middle; ">DISTRIBUTOR</th>
                                                        <td align="center" style="font-size:18px; width: 80%" colspan="3">
                                                            <div class="kv-attribute">
                                                                <?php echo $distributor; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 18%; text-align: center; vertical-align: middle; ">STORE CODE</th>
                                                        <td align="center" style="font-size:18px; width: 80%" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->outlet_code; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 18%; text-align: center; vertical-align: middle; ">ACCOUNT</th>
                                                        <td align="center" style="font-size:18px; width: 80%" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->account; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 18%; text-align: center; vertical-align: middle; ">OUTLET NAME</th>
                                                        <td align="center" style="font-size:18px; width: 80%" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->outlet; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">OUTLET TYPE</th>
                                                        <td align="center" style="font-size:18px; width: 21%">
                                                            <div class="kv-attribute"><?php $s_type = $row->s_type;
                                                                if($s_type == 1){ echo "MVP";}
                                                                else if($s_type == 2){ echo "KSP";}
                                                                else if($s_type == 3){ echo "MVP-P";}
                                                                else if($s_type == 4){ echo "NON-MVP";}
                                                                ?></div>
                                                        </td>
                                                        <th style="width: 18%; text-align: center; vertical-align: middle; " >ADDRESS</th>
                                                        <td align="center" style="font-size:18px; width: 80%" >
                                                            <div class="kv-attribute"><?php echo $row->s_address; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 18%; text-align: center; vertical-align: middle;" >CITY/ MUNICIPALITY</th>
                                                        <td align="center" style="font-size:18px; width: 30%; text-align: center; vertical-align: middle;" >
                                                            <div class="kv-attribute"><?php echo $row->city; ?></div>
                                                        </td>

                                                        <th style="width: 18%; text-align: center; vertical-align: middle; " >PROVINCE</th>
                                                        <td align="center" style="font-size:18px; width: 30%; text-align: center; vertical-align: middle;" >
                                                            <div class="kv-attribute"><?php echo $row->province; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 18%; text-align: center; vertical-align: middle;" >REGION</th>
                                                        <td align="center" style="font-size:18px; width: 30%" >
                                                            <div class="kv-attribute"><?php $region = $row->region;
                                                                if($region == 1){ echo "Region 1";}
                                                                else if($region == 2){ echo "Region 2";}
                                                                else if($region == 3){ echo "Region 3";}
                                                                else if($region == 4){ echo "Region 4A";}
                                                                else if($region == 5){ echo "Region 5";}
                                                                else if($region == 6){ echo "Region 6";}
                                                                else if($region == 7){ echo "Region 7";}
                                                                else if($region == 8){ echo "Region 8";}
                                                                else if($region == 9){ echo "Region 9";}
                                                                else if($region == 10){ echo "Region 10";}
                                                                else if($region == 11){ echo "Region 11";}
                                                                else if($region == 12){ echo "Region 12";}
                                                                else if($region == 13){ echo "Region 13";}
                                                                else if($region == 14){ echo "NCR";}
                                                                else if($region == 15){ echo "CAR";}
                                                                else if($region == 16){ echo "BARMM";}
                                                                else if($region == 17){ echo "MIMAROPA Region";}
                                                                else if($region == 18){ echo "NIR";}
                                                                ?></div>
                                                        </td>

                                                        <th style="width: 18%; text-align: center; vertical-align: middle; " >ISLAND GROUP</th>
                                                        <td align="center" style="font-size:18px; width: 30%" >
                                                            <div class="kv-attribute"><?php $island_grp = $row->island_grp;
                                                                if($island_grp == 1){ echo "Luzon";}
                                                                else if($island_grp == 2){ echo "Visayas";}
                                                                else if($island_grp == 3){ echo "Mindanao";}
                                                                ?></div>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table id="w0" class="table table-bordered table-condensed table-striped detail-view"  >

                                                    <tr>
                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">SAMPLING FEE</th>
                                                        <td align="center" style="font-size:18px; width: 21%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->samp_fee; ?></div>
                                                        </td>

                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">DISCOUNT</th>
                                                        <td align="center" style="font-size:18px; width: 22%" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->discount; ?></div>
                                                        </td>

                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">DISCOUNT FEE</th>
                                                        <td align="center" style="font-size:18px; width: 21%" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->dc_fee; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">LISTING FEE</th>
                                                        <td align="center" style="font-size:18px; width: 21%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->list_fee; ?></div>
                                                        </td>

                                                        <th style="font-size: 12px;width: 12%; text-align: center; vertical-align: middle; ">TERMS OF PAYMENT</th>
                                                        <td align="center" style="font-size:18px; width: 22%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->pay_terms; ?></div>
                                                        </td>

                                                        <th style=" width: 12%; text-align: center; vertical-align: middle;">COLLECTION DAY</th>
                                                        <td align="center" style="font-size:18px; width: 21%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php $col_day = $row->col_day;
                                                                if($col_day == 1){ echo "Monday";}
                                                                else if($col_day == 2){ echo "Tuesday";}
                                                                else if($col_day == 3){ echo "Wednesday";}
                                                                else if($col_day == 4){ echo "Thursday";}
                                                                else if($col_day == 5){ echo "Friday";}
                                                                else if($col_day == 6){ echo "Saturday";}
                                                                else if($col_day == 7){ echo "Sunday";}
                                                                else if($col_day == 8){ echo "N/A";}
                                                                ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">P.O. ACCOUNT</th>
                                                        <td align="center" style="font-size:18px; width: 21%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->po_acct; ?></div>
                                                        </td>

                                                        <th style="font-size: 12px;width: 12%; text-align: center; vertical-align: middle; ">NO. OF CHECK OUT COUNTER</th>
                                                        <td align="center" style="font-size:18px; width: 22%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->no_coc; ?></div>
                                                        </td>

                                                        <th style=" width: 12%; text-align: center; vertical-align: middle;">DISER STATUS</th>
                                                        <td align="center" style="font-size:18px; width: 21%; text-align: center; vertical-align: middle;" colspan="3">
                                                            <div class="kv-attribute"><?php echo $row->d_status; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">STORE MANAGER</th>
                                                        <td align="center" style="font-size:18px; width: 38%; text-align: center; vertical-align: middle;" colspan="4">
                                                            <div class="kv-attribute"><?php echo $row->s_manager; ?></div>
                                                        </td>

                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">STORE SUPERVISOR</th>
                                                        <td align="center" style="font-size:18px; width: 38%; vertical-align: middle; " colspan="4" >
                                                            <div class="kv-attribute"><?php echo $row->s_supervisor; ?></div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">NAME OF PURCHASER</th>
                                                        <td align="center" style="font-size:18px; width: 38%; text-align: center; vertical-align: middle;" colspan="4">
                                                            <div class="kv-attribute"><?php echo $row->purch_name; ?></div>
                                                        </td>

                                                        <th style="width: 12%; text-align: center; vertical-align: middle; ">TELEPHONE NUMBER</th>
                                                        <td align="center" style="font-size:18px; width: 38%; vertical-align: middle;" colspan="4">
                                                            <div class="kv-attribute"><?php echo $row->tel_no; ?></div>
                                                        </td>
                                                    </tr>

                                                </table>


                                                <div class="panel panel-info row">

                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#invoice" class="glyphicon glyphicon-picture "><b style="font-family: Arial; margin-left: 10px">Sales</b></a></li>
                                                        <li><a href="#cust_sku" class="glyphicon glyphicon-list"><b style="font-family: Arial; margin-left: 10px">Outlet Carried SKU</b></a></li>
                                                        <li><a href="#cust_ave" class="glyphicon glyphicon-list "><b style="font-family: Arial; margin-left: 10px">Outlet Average</b></a></li>

                                                    </ul>


                                                    <div class="tab-content " style="margin-left: 5px; margin-right: 5px">

                                                        <!--Tab INVOICES-->
                                                        <div id="invoice" class="tab-pane fade fade in active">
                                                            <div class="col-lg-12 ">

                                                                <div class="col-lg-12 " style="margin-top: 30px;">
                                                                    <table  id="dt_invoice" class="display nowrap table-bordered " style="width: 100%;">
                                                                        <thead></thead>
                                                                        <tbody></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div id="cust_sku" class="tab-pane ">
                                                            <div class="col-lg-12 ">
                                                                <br>
                                                                <table id="datatable"  class="table table-striped table-bordered table-hover" style="width: 50%; margin-left: auto; margin-right: auto">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="text-align: center">YEAR</th>
                                                                        <th style="text-align: center">CONFECTIONARY</th>
                                                                        <th style="text-align: center">BISCUIT</th>
                                                                        <th style="text-align: center">CHOCOLATE</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    if($fetch_data_sku){
                                                                        foreach ($fetch_data_sku as $rs) {?>
                                                                            <tr>
                                                                                <td style="text-align: center"><?php echo $rs->year;?></td>
                                                                                <td style="text-align: center"><?php echo $rs->sku_confec;?></td>
                                                                                <td style="text-align: center"><?php echo $rs->sku_biscuit;?></td>
                                                                                <td style="text-align: center"><?php echo $rs->sku_choco;?></td>
                                                                            </tr>
                                                                        <?php }}?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div id="cust_ave" class="tab-pane ">
                                                            <div class="col-lg-12 ">
                                                                <br>
                                                                <table id="datatable"  class="table table-striped table-bordered table-hover" style="width: 50%; margin-left: auto; margin-right: auto">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="text-align: center">Year2</th>
                                                                        <th style="text-align: center">CONFECTIONARY2</th>
                                                                        <th style="text-align: center">BISCUIT2</th>
                                                                        <th style="text-align: center">CHOCOLATE2</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    if($fetch_data_sku){
                                                                        foreach ($fetch_data_sku as $rs) {?>
                                                                            <tr>
                                                                                <td style="text-align: center"><?php echo $rs->year;?></td>
                                                                                <td style="text-align: center"><?php echo $rs->sku_confec;?></td>
                                                                                <td style="text-align: center"><?php echo $rs->sku_biscuit;?></td>
                                                                                <td style="text-align: center"><?php echo $rs->sku_choco;?></td>
                                                                            </tr>
                                                                        <?php }}?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                        </div>
                                    </div>

                                    <!--Tab Outlet Images-->
                                    <div id="photos" class="tab-pane fade">

                                        <tr class="kv-child-table-row">
                                            <td class="kv-child-table-cell" colspan=2>
                                                <table class="kv-child-table"><br>
                                                    <tr>
                                                        <th style="width: 100%; text-align: center; vertical-align: middle; background-color: #d8e5f2 "><h4><b>BEST PHOTOS</b></h4></th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <?php if($get_best_photos){
                                            $row_count = 1; foreach ($get_best_photos as $key => $row_best_photo) :?>

                                                <ul class="list-inline" style="margin-left: 7px ; margin-top: 7px; display: inline-block" >
                                                    <li data-toggle="modal" data-target="#myModal-<?php echo $row_count;?>"
                                                    <a href="#myGallery" data-slide-to="<?php echo $row_count;?>" >
                                                        <img class="img-thumbnail" src="<?php echo $this->Outlet_Model->getBestPic($row_best_photo->photo_filename);?>" style="width:210px; height:200px; ">
                                                        <p style="text-align: center;"><b style="color: #1c94c4">Date Taken :</b> <b style="color: black;">  <?php echo $row_best_photo->date_taken;?></b></p>
                                                    </a>
                                                    </li>
                                                </ul>

                                                <!--begin modal window-->
                                                <div class="modal fade" id="myModal-<?php echo $row_count;?>" data-backdrop="static" data-keyboard="false"  >
                                                    <div class="modal-dialog" style="width:1300px; height:520px;">

                                                        <div class="modal-content">

                                                            <div class="modal-header" style="margin-bottom: -25px ">
                                                                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>

                                                            </div>
                                                            <div class="modal-body" >
                                                                <div class="modal fade" id="myModall-<?php echo $row_count;?>" role="dialog" >
                                                                    <div class="modal-dialog" style="width:100%; height:100%;">


                                                                    </div>
                                                                </div>
                                                                <div style="width:100%; height:100%;">
                                                                    <div class="carousel-inner">
                                                                        <img src="<?php echo $this->Outlet_Model->getBestPic($row_best_photo->photo_filename);?>" style="width: 100%; height:100%" >
                                                                    </div>
                                                                </div>
                                                                <!--end modal-body-->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="pull-left">
                                                                    <div>
                                                                        <h4> <b style="text-align: center; color: #1c94c4; margin-left: 250px;">Date Taken:</b><b style="color: black ;text-align: center"> <?php echo $row_best_photo->date_taken; echo str_repeat("&nbsp;", 5)?></b><b style="color: #1c94c4">Uploaded By:</b>  <b style="color: black;"> <?php echo $created;echo str_repeat("&nbsp;", 5); ?> </b> <b style="color: #1c94c4">Date Uploaded :</b> <b style="color: black;"><?php echo $row_best_photo->created_at; echo str_repeat("&nbsp;", 8); ?></h4>
                                                                    </div>
                                                                </div>
                                                                <div class="pull-right">

                                                                    <button id="modal_button" class="btn btn-primary" type="button" data-dismiss="modal" onclick='hideAllModal()'><b>Close</b></button>
                                                                </div>
                                                                <!--end modal-footer-->
                                                            </div>
                                                            <!--end modal-content-->

                                                        </div>
                                                        <!--end modal-dialoge-->

                                                    </div>
                                                    <!--end myModal-->
                                                </div>
                                                <input type="hidden" value="<?php echo count($get_best_photos);?>" name="image_count" id="image_count_id">
                                                <?php $row_count++; endforeach;
                                        }
                                        else{?>
                                            <br><br><br>
                                            <p style="text-align: center;"><b>No Photos Available</b></p>

                                        <?php }?>

                                        <BR>
                                        <tr class="kv-child-table-row">
                                            <td class="kv-child-table-cell" colspan=2>
                                                <table class="kv-child-table">
                                                    <br><br>
                                                    <tr>
                                                        <th style="width: 100%; text-align: center; vertical-align: middle; background-color: #d8e5f2 "><h4><b>LATEST PHOTOS</b></h4></th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <?php  if($get_recent_photos){
                                            $row_count_recent = 1; foreach ($get_recent_photos as $key => $row_recent_photo) :?>
                                                <ul class="list-inline" style="margin-left: 7px ; margin-top: 7px; display: inline-block;">

                                                    <li data-toggle="modal" data-target="#myModal2-<?php echo $row_count_recent;?>">
                                                        <a href="#myGallery2" data-slide-to="<?php echo $row_count_recent; ?>">
                                                            <img class="img-thumbnail" src="<?php echo $this->Outlet_Model->getLatestPic($row_recent_photo->photo_filename);?>" style="width:210px; height:200px;"></a>
                                                        <p style="text-align: center;"><b style="color: #1c94c4">Date Taken :</b> <b style="color: black;">  <?php echo $row_recent_photo->date_taken;?></b></p>
                                                    </li>
                                                    <!--end of thumbnailsw-->
                                                </ul>
                                                <!--begin modal window-->
                                                <div class="modal fade" id="myModal2-<?php echo $row_count_recent;?>" data-backdrop="static" data-keyboard="false">
                                                    <div class="modal-dialog" style="width:1300px; height:520px;">

                                                        <div class="modal-content" >
                                                            <div class="modal-header" style="margin-bottom: -25px ">
                                                                <button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="modal fade" id="myModal3-<?php echo $row_count_recent;?>" role="dialog" >
                                                                    <div class="modal-dialog" style="width:100%; height:100%;"></div>
                                                                </div>

                                                                <!--begin carousel-->
                                                                <div id="myGallery2" class="carousel slide" data-interval="false" style="width:100%; height:100%;">
                                                                    <div class="carousel-inner">
                                                                        <img src="<?php echo $this->Outlet_Model->getLatestPic($row_recent_photo->photo_filename);?>" style="width: 100%; height:100%" >
                                                                    </div>
                                                                    <!--end carousel-->
                                                                </div>
                                                                <!--end modal-body-->
                                                            </div>


                                                            <div class="modal-footer">
                                                                <div class="pull-left">
                                                                    <div >
                                                                        <h4> <b style="text-align: center; color: #1c94c4; margin-left: 250px;">Date Taken:</b><b style="color: black ;text-align: center"> <?php echo $row_recent_photo->date_taken; echo str_repeat("&nbsp;", 5)?></b><b style="color: #1c94c4">Uploaded By:</b>  <b style="color: black;"> <?php echo $created;echo str_repeat("&nbsp;", 5); ?> </b> <b style="color: #1c94c4">Date Uploaded :</b> <b style="color: black;"><?php echo $row_recent_photo->created_at; echo str_repeat("&nbsp;", 8); ?></h4>
                                                                    </div>
                                                                </div>
                                                                <div class="pull-right">
                                                                    <button id="modal_button" class="btn btn-primary" type="button" data-dismiss="modal" onclick='hideAllModal()'><b>Close</b></button>
                                                                </div>
                                                                <!--end modal-footer-->
                                                            </div>
                                                            <!--end modal-content-->
                                                        </div>
                                                        <!--end modal-dialoge-->
                                                    </div>
                                                    <!--end myModal-->
                                                </div>
                                                <input type="hidden" value="<?php echo count($get_recent_photos);?>" name="image_count2" id="image_count_id2">
                                                <?php $row_count_recent++; endforeach;
                                        }
                                        else { ?>

                                            <br><br><br>
                                            <p style="text-align: center;"><b>No Photos Available</b></p>
                                            <br><br><br>
                                        <?php } ?>
                                    </div>



                                </div>
                                <?php } ?>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url(); ?>assets/home/attendance/form/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/home/attendance/form/js/bootstrap.js"></script>
<!--DATATABLES-->
<!--<script type="text/javascript" src="--><?php //echo base_url(); ?><!--assets/home/newdatatables/js/jquery-3.3.1.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/newdatatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/newdatatables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/newdatatables/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/newdatatables/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/payroll/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/payroll/js/daterangepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/home/attendance/view/js/yii.js"></script>



<!--<script src="--><?php //echo base_url();?><!--assets/datetimepicker/js/jquery.min.js"></script>-->
<!--<script src="--><?php //echo base_url();?><!--assets/datetimepicker/js/moment.min.js"></script>-->
<!--<script src="--><?php //echo base_url();?><!--assets/datetimepicker/js/bootstrap.min.js"></script>-->
<!--<script src="--><?php //echo base_url();?><!--assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>-->
<!--<script src="--><?php //echo base_url();?><!--assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>-->

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


        var outlet_id = $('#outlet_id').val();

        $.ajax({
            url: "<?php echo base_url(); ?>outlet/get_invoice",
            dataType: "JSON",
            method: "POST",
            data: {outlet_id: outlet_id},
            success: function (data) {

                $('#dt_invoice').DataTable({
                    data: data,
                    columns: [
                        { title: "SKU", className: "centeralign" },
                        { title: "Description", className: "centeralign" },
                        { title: 'January', className: "centeralign" },
                        { title: 'February', className: "centeralign" },
                        { title: 'March', className: "centeralign" },
                        { title: 'April', className: "centeralign" },
                        { title: 'May', className: "centeralign" },
                        { title: 'June', className: "centeralign" },
                        { title: 'July', className: "centeralign" },
                        { title: 'August', className: "centeralign" },
                        { title: 'September', className: "centeralign" },
                        { title: 'October', className: "centeralign" },
                        { title: 'November', className: "centeralign" },
                        { title: 'December', className: "centeralign" },
                        { title: "Total", className: "centeralign" }],
                    "scrollX": true,
                    select: true,
                    dom: 'Blfrtip',
                    lengthMenu: [[10, 25, 50, -1], ['10 Rows', '25 Rows', '50 Rows', 'Show All Rows']],
                    dom: 'Bfrtip',
                    buttons: [{extend: 'excel', text: ' Export to EXCEL',  exportOptions: {columns: ''}, title: 'Purchase Order Monthly Report - '}, 'pageLength' ]
                });
            }
        });
    });
</script>

<script>
    function hideAllModal() {
        $('.modal').modal('hide');
    }
</script>


<script type="text/javascript">
    var kvDatepicker_929f86bc = {"format":"yyyy-mm-dd"};
    var fileinput_occup_01 = {"allowedFileExtensions":["jpg","png"],"showUpload":false,"maxFileSize":100000,"language":"en","purifyHtml":true};
</script>

<script type="text/javascript">

    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });
</script>

<script type="text/javascript">

    var add_date_picker = document.getElementsByName('date_taken');
    $(add_date_picker ).datetimepicker({"format":"Y-MM-DD HH:mm:ss"});

    var add_date_picker2 = document.getElementsByClassName('input-group date');
    $(add_date_picker2 ).datetimepicker({"format":"Y-MM-DD HH:mm:ss"});

</script>

</body>
</html>
