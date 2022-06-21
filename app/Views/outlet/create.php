<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');}       $role = $this->session->user_role; ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="UkpyUkhzTG8LMxAzCiw9IiF5MWFlND0FBn0WAnE/ezA7PToxACIeNg==">
    <title>Add Outlet</title>
    <link href="<?php echo base_url();?>assets/home/store/form/css/bootstrap.css" rel="stylesheet">
    <!--    <link href="--><?php //echo base_url();?><!--assets/home/store/form/css/kv-grid.css" rel="stylesheet">-->
    <!--    <link href="--><?php //echo base_url();?><!--assets/home/store/form/css/bootstrap-dialog.css" rel="stylesheet">-->
    <!--    <link href="--><?php //echo base_url();?><!--assets/home/store/form/css/jquery.resizableColumns.css" rel="stylesheet">-->
    <!--    <link href="--><?php //echo base_url();?><!--assets/home/store/form/css/kv-grid-action.css" rel="stylesheet">-->

    <!--    <link href="--><?php //echo base_url();?><!--assets/home/store/create/css/bootstrap.css" rel="stylesheet">-->
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/create/css/fileinput.css" rel="stylesheet">

</head>
<body>

<div class="wrap">

    <?php $this->load->view('header'); ?>

    <div class="container">

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>outlet_index"> Outlet List</a></li>
            <li class="active">Add Outlet</li>
        </ul>

        <div class="row" style="margin-top: -20px">
            <h1>Add Outlet</h1><BR>
        </div>

        <div class="panel panel-info row " >

            <ul class="nav nav-tabs">
                <li class="active"><a href="#store" class="glyphicon glyphicon-home"><b style="font-family: Arial; margin-left: 10px">Outlet</b></a></li>
                <li><a href="#best_photo" class="glyphicon glyphicon-picture "><b style="font-family: Arial; margin-left: 10px">Photos</b></a></li>
            </ul>

            <form class="form-horizontal" action="<?php echo base_url();?>insert_outlet_data" method="post" enctype="multipart/form-data" data-toggle="validator" >

                <div class="tab-content " style="margin-left: 5px; margin-right: 5px">

                    <div id="store" class="tab-pane fade in active ">
                        <div class="col-lg-12 ">

                            <fieldset>
                                <div class="row">
                                    <legend class = "text-info" STYLE="margin-left: 8px; margin-top: 5px;">OUTLET INFORMATION</legend>
                                </div>

                                <div id="hide_field" <?php if($role == "Supermarket"){ echo "hidden";}  ?>>
                                    <div class="col-sm-6">
                                        <div class="form-group required" >
                                            <label class="control-label" >Customer Type</label>
                                            <select name="cust_type" id="cust_type" class="form-control">
                                                <option hidden value="">Select Customer Type</option>
                                                <option value="1" <?php if($role === "Marketing"){ echo "selected";} else {echo "hidden";}?> >Distributor</option>
                                                <option value="2" <?php if($role === "Supermarket"){ echo "selected";} else {echo "hidden";}?>>Supermarket</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6" >
                                        <div class="form-group" style="margin-left: 1px">
                                            <label class="control-label">Distributor</label>
                                            <select  class="form-control" name="distributor">
                                                <?php if($fetch_distributor){
                                                    if($role === "Marketing"){
                                                    foreach ($fetch_distributor->result() as $row) {?>
                                                        <option value="" hidden>- Select Distributor -</option>
                                                        <option value="<?php echo $row->distributor_id;?>"><?php echo "$row->name" ;?></option>

                                                    <?php } }   else{ ?>
                                                        <option value="999999" >Supermarket</option>
                                                <?php } } ?>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required">
                                        <label class="control-label" >Outlet Code</label>
                                        <input type="text" class="form-control" name="outlet_code" placeholder="Enter Store Code" required >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Account</label>
                                        <input type="text" class="form-control" name="account" placeholder="Enter Account " required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Outlet</label>
                                        <input type="text" class="form-control" name="outlet" placeholder="Enter Outlet " required>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Outlet Type</label>
                                        <select name="s_type" id="s_type" class="form-control" required>
                                            <option hidden value="">Select Store Type</option>
                                            <option value="1">MVP</option>
                                            <option value="2">KSP</option>
                                            <option value="3">MVP-P</option>
                                            <option value="4">NON-MVP</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" >
                                    <div class="form-group required">
                                        <label class="control-label" >Store Address</label>
                                        <input type="text" class="form-control" name="s_address" placeholder="Enter Store Address" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >City / Municipality</label>
                                        <input type="text" class="form-control" name="city" placeholder="Enter City / Municipality " required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Province</label>
                                        <input type="text" class="form-control" name="province" placeholder="Enter Province" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" >
                                        <label class="control-label" >Discount</label>
                                        <input type="text" class="form-control" name="discount" placeholder="Enter Discount" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Discount Fee</label>
                                        <input type="text" class="form-control" name="dc_fee" placeholder="Enter Discount Fee" required>
                                    </div>
                                </div>


                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Region</label>
                                        <select name="region" id="region" class="form-control c_region" required>
                                            <option hidden value="">Select Region</option>
                                            <option value="1">Region 1</option>
                                            <option value="2">Region 2</option>
                                            <option value="3">Region 3</option>
                                            <option value="4">Region 4A</option>
                                            <option value="5">Region 5</option>
                                            <option value="6">Region 6</option>
                                            <option value="7">Region 7</option>
                                            <option value="8">Region 8</option>
                                            <option value="9">Region 9</option>
                                            <option value="10">Region 10</option>
                                            <option value="11">Region 11</option>
                                            <option value="12">Region 12</option>
                                            <option value="13">Region 13</option>
                                            <option value="14">NCR</option>
                                            <option value="15">CAR</option>
                                            <option value="16">BARMM</option>
                                            <option value="17">MIMAROPA</option>
                                            <option value="18">NIR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Island Group</label>
                                        <input type="text" class="form-control" id="island_grp" name="island_grp" placeholder=""  required readonly>
<!--                                        <select name="island_grp" id="island_grp" class="form-control" required >-->
<!--                                            <option hidden value="">Select Island Group</option>-->
<!--                                            <option value="1">Luzon</option>-->
<!--                                            <option value="2">Visayas</option>-->
<!--                                            <option value="3">Mindanao</option>-->
<!--                                        </select>-->
                                    </div>
                                </div>


                                <div class="col-sm-3" >
                                    <div class="form-group required" >
                                        <label class="control-label" >Sampling Fee</label>
                                        <input type="text" class="form-control" name="samp_fee" placeholder="Enter Sampling Fee"  value="0.00" required>
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Listing Fee</label>
                                        <input type="text" class="form-control" name="list_fee" placeholder="Enter Listing Fee"  value="0.00" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Terms of Payment</label>
                                        <input type="text" class="form-control" name="pay_terms" placeholder="Enter Terms of Payment"  required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Collection Day</label>
                                        <select name="col_day" id="col_day" class="form-control" required>
                                            <option hidden value="">Select Day</option>
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                            <option value="6">Saturday</option>
                                            <option value="7">Sunday</option>
                                            <option value="8">N/A</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group required" >
                                        <label class="control-label" >P.O. Account</label>
                                        <input type="text" class="form-control" name="po_acct" placeholder="Enter Classification" required>
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >No. of Check Out Counter</label>
                                        <input type="text" class="form-control" name="no_coc" placeholder="Enter No. of Check Out Counter"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'   >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Diser Status</label>
                                        <input type="text" class="form-control" name="d_status" placeholder="Enter Diser Status"  required >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Store Hours</label>
                                        <input type="text" class="form-control" name="s_hours" placeholder="Enter Store Hours"  required >
                                    </div>
                                </div>



                                <div class="col-sm-3" >
                                    <div class="form-group required">
                                        <label class="control-label" >Store Manager</label>
                                        <input type="text" class="form-control" name="s_manager" placeholder="Enter Store Manager" required  >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Store Supervisor</label>
                                        <input type="text" class="form-control" name="s_supervisor" placeholder="Enter Store Supervisor" required  >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Name of Purchaser</label>
                                        <input type="text" class="form-control" name="purch_name" placeholder="Enter Name of Purchaser"  required >
                                    </div>
                                </div>

                                <div class="col-sm-3" >
                                    <div class="form-group required" style="margin-left: 1px">
                                        <label class="control-label" >Telephone No.</label>
                                        <input type="text" class="form-control" name="tel_no" placeholder="Enter Telephone No."  required >
                                    </div>
                                </div>


                            </fieldset>
                            <br>
                            <fieldset>
                                <div class="row col">
                                    <legend class = "text-info">Upload Profile Photo </legend>
                                </div>
                                <div>
                                    <div>
                                        <label class="control-label" for="profile-image">Outlet Photo</label>
                                        <input type="file" id="profile-image" class="file-loading" name="prof_photo" accept="image/*" >
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

                                <input type="hidden" name="pass_data">

                                <div class="col-sm-10 wrap" style="margin-left: 8%">

                                    <table id="data_table"  class="table table-striped table-bordered " STYLE="text-align: center; margin-top: 20px">
                                        <thead>
                                        <tr>
                                            <th class="kv-align-center kv-align-middle" style="width: 22%; text-align: center" >YEAR</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 22%; text-align: center" >CONFECTIONARY</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 22%; text-align: center" >BISCUIT</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 22%; text-align: center" >CHOCOLATE</th>
                                            <th class="kv-align-center kv-align-middle" style="width: 5%; text-align: center"> </th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
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

                <div class="pull-right" style="margin-right: 10px; margin-bottom: 10px">

                    <button style="margin-right: 24px; margin-top: 10px" onclick="hitButton()" id="submit_but" type="submit" value="upload" class="btn btn-success"><b>ADD STORE</b></button>
                </div>
            </form>
        </div>
    </div>
</div>



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
    function hitButton() {
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

