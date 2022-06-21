<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="UkpyUkhzTG8LMxAzCiw9IiF5MWFlND0FBn0WAnE/ezA7PToxACIeNg==">
    <title>Add Outlet Invoices</title>
    <link href="<?php echo base_url();?>assets/home/attendance/form/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/attendance/form/css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/dropdown_select/css/select2.min.css" rel="stylesheet">

</head>
<body>

<div class="wrap">

    <?php $this->load->view('header'); ?>

    <div class="container">

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>outlet_invoice_index"> Outlet Invoices List</a></li>
            <li class="active" >Add Outlet Invoices</li>
        </ul>

        <div class="row" style="margin-top: -20px">
            <h1 style="margin-left: 13px;">Add Outlet Invoices</h1><BR>
        </div>
        <br>

        <form id="w0" action="<?php echo base_url();?>insert_outlet_invoice" method="post">

            <div class="col-sm-4">
                <div class="form-group required">
                    <label class="control-label" >Invoice No.</label>
                    <input type="text" class="form-control" name="invoice_no" placeholder="Enter Invoice No."  required>
                </div>
            </div>

            <div class="col-sm-4">
                <label class="control-label">Invoice Date </label>
                <div class='input-group datepicker' id='date'>
                    <input id="date_val" name="invoice_date" type='text' class="form-control " placeholder="Select Date" value="" required/>
                    <span class="input-group-addon "><span  class="glyphicon glyphicon-calendar "></span></span>
                </div>
            </div>

            <div class="col-sm-4" >
                <div class="form-group">
                    <label class="control-label">Outlet Name</label>
                    <select  class="form-control outlet" name="outlet" id="outlet" required>
                        <?php if($fetch_outlet){
                            foreach ($fetch_outlet->result() as $row) {?>
                                <option value="" hidden>- Select Outlet -</option>
                                <option value="<?php echo $row->outlet_id;?>"><?php echo "$row->outlet" ;?></option>
                            <?php } } ?>
                    </select>

                    <div class="help-block"></div>
                </div>
            </div>

            <div class="col-sm-12" style="margin-bottom: 20px;" >
                <div class="form-group required" style="margin-left: 1px">
                    <label class="control-label" >Store Address</label>
                    <textarea  class="form-control" id="s_address" name="s_address" disabled style="background-color: white;"></textarea>
                </div>
            </div>
            <div  class="col-sm-12">
                <div class="panel panel-default">


                    <div class="panel-body">
                        <div  class="col-sm-12">
                            <div style="margin-left: 180px; " >
                                <div class="col-sm-6" >
                                    <div class="form-group" style="margin-top: 3px; ">
                                        <label class="control-label">SKU</label>
                                        <select  class="form-control " name="sku" id="sku" >
<!--                                            <option value="" hidden>- Select SKU -</option>-->
<!--                                            --><?php //if($fetch_sku){
//                                                foreach ($fetch_sku->result() as $row) {?>
<!--                                                    <option value="--><?php //echo $row->sku  . " - " .$row->description;?><!--">--><?php //echo $row->sku . " - " .$row->description ;?><!--</option>-->
<!--                                                --><?php //} } ?>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group required" style="margin-left: 5px; width: 120px;">
                                        <label class="control-label" > QUANTITY</label>
                                        <input type="text" id="quantity" class="form-control" name="quantity" placeholder="Enter Quantity"   onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                    </div>
                                </div>
                                <input type="hidden" id="doi_id" value="">

                                <div class="col-sm-2">
                                    <div class="form-group required" style="margin-left: 5px; margin-top: 6px;">
                                        <br style="line-height: 26px">
                                        <button type="button" id="add_data" class="btn btn-primary" style="width: 90px; margin-top: -2px; " ><b>ADD</b></button>
                                    </div>

                                </div>

                            </div>

                            <input type="hidden" name="pass_data">

                            <div class="col-sm-10 " style="margin-left: 8%">

                                <table id="data_table"  class="table table-striped table-bordered " STYLE="text-align: center; margin-top: 20px">
                                    <thead>
                                    <tr>
                                        <th class="kv-align-center kv-align-middle" style="width: 20%; text-align: center" >SKU</th>
                                        <th class="kv-align-center kv-align-middle" style="width: 55%; text-align: center" >DESCRIPTION</th>
                                        <th class="kv-align-center kv-align-middle" style="width: 18%; text-align: center" >QUANTITY</th>
                                        <th class="kv-align-center kv-align-middle" style="width: 7%; text-align: center"> </th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="pull-right"  >
                <button type="submit" class="btn btn-success"><b>Add Invoices</b></button>
            </div>
        </form>


    </div>
</div>

<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url();?>assets/datetimepicker/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/dropdown_select/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){

        function sku_list() {
            $.ajax({
                url:"<?php echo base_url();?>outlet_invoice/load_sku_list",
                dataType: "JSON",
                method:"POST",
                success:function(data)
                {
                    $("#sku").empty();
                    $('#sku').append('<option hidden value="- Select SKU -">- Select SKU -</option>');
                    for (var count = 0; count < data.length; count++) {
                        $("#sku").append($("<option></option>").val(data[count].sku + " - " + data[count].description).html(data[count].sku + " - " + data[count].description));
                    }
                }
            });
        }
        sku_list();

        $(document).on("change", ".outlet", function(){

            var outlet = $('#outlet :selected').text();

            if( outlet !== "- Select Outlet -"){
                $.ajax({
                    url: "<?php echo base_url();?>outlet_invoice/load_address",
                    method: "POST",
                    data: {outlet: outlet},
                    success: function (data) {
                        $('#s_address').val(data);
                    }
                });
            }

        });


        //set number for adding row
        $('#add_data').click(function(){

            var sku_Desc = $('#sku').val();
            const sku_split = sku_Desc.split(" - ");
            var sku = sku_split[0];
            var description = sku_split[1];

            var quantity = $('#quantity').val();
            var deleteed = '<i class="glyphicon glyphicon-trash" style="color: red;"></i>';

            if(quantity == 0){ //avoid accepting zero in quantity
                alert("Quantity cannot be Zero");
                $('#quantity').val('');
                return false;}

            //append inputs to table
            $('#data_table tbody:last-child').append(
                '<tr>'+
                '<td>'+sku+'</td>'+
                '<td>'+description+'</td>'+
                '<td>'+quantity+'</td>'+
                '<td>'+deleteed+'</td>'+
                '</tr>'
            );
            //clear input data

            sku_list();
            $('#quantity').val('');

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
                table.rows[i].cells[3].onclick = function()
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
        $('#sku').select2();
    });

</script>




<script type="text/javascript">$(function () {
    $('#date').datetimepicker({"format":"Y-MM-DD"});
    $('#date_val').datetimepicker({"format":"Y-MM-DD"});
});</script>

</body>
</html>

