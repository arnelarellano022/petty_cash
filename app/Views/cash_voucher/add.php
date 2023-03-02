
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?=  view('partial/message'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-plus mt-2"></i>
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
                                <form action="<?= base_url('add_cash_voucher');?>" method="post">
                                    <div class="box-body">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>Voucher No.</label>
                                                <input  id="voucher_no" type="text"  class="form-control" name="voucher_no" value="" required >
                                            </div>

                                            <div class="col-sm-3" >
                                                <div class="form-group">
                                                    <label class="control-label">Requester</label>
                                                    <select id="requester" class="form-control" name="requester" >
                                                        <?php if($fetch_requester){
                                                            foreach ($fetch_requester->result() as $row) {?>
                                                                <option value="" hidden>- Select Requester -</option>
                                                                <option value="<?php echo $row->requester_id;?>"><?php echo "$row->requester_name" ;?></option>
                                                            <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Date -->
                                            <div class="form-group col-sm-3">
                                                <label>Transaction Date</label>
                                                <div class="input-group date" id="date" data-target-input="nearest">
                                                    <input type="text" name="date" id="date_val" class="form-control datetimepicker-input" data-target="#date" placeholder="Input Date " data-toggle="datetimepicker"/>
                                                    <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                    <div class="input-group-text" onclick="$('#date_val').val('');" ><i class="fa fa-times"></i></div>
                                                </div>
                                            </div>
                                            <!--  Radio Button-->
                                            <div class="form-group col-sm-3" >
                                                <label>Status</label><br>
                                                <div style="text-align: center; border: 1px solid gainsboro ; height: 38px; ">
                                                    <div style="margin-top: 7px"  >
                                                        <div class="icheck-success d-inline" style="margin-right: 30px;">
                                                            <input type="radio" name="status"  id="radioSuccess1" value="Cleared">
                                                            <label for="radioSuccess1"> Cleared</label>
                                                        </div>
                                                        <div class="icheck-danger d-inline">
                                                            <input type="radio" name="status" checked id="radioSuccess2" value="Pending">
                                                            <label for="radioSuccess2"> Pending</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12" style="margin-top: 30px;">
                                            <input type="hidden" name="pass_data" >

                                            <div class="table-title">
                                                <div class=" row ">
                                                    <div class="col-sm-8"  ><h2><b>Item Details</b></h2></div>
                                                    <div class="col-sm-4 " >
                                                        <button type="button" class="btn btn-info add-new float-right " ><i class="fa fa-plus" ></i> Add New Row</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div >
                                                <table id="datatable" class="table table-bordered" style=" text-align: center" >
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align:center;  width: 75%;">Description</th>
                                                        <th style="text-align:center;  width: 15%;">Amount</th>
                                                        <th style="text-align:center;  width: 10%;"> </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="form_data" >
                                                    </tbody>

                                                            <tr id="totalAmt_Row" hidden>
                                                                <td></td>
                                                                <td><input class="form-control" type="text" id="total_amt" readonly="readonly" style="background-color: white"></td>
                                                            </tr>

                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-footer">
                                        <input type="hidden" name="submit" value="submit"/>
                                        <button type="submit" class="btn btn-success float-right submit"><b>SUBMIT</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </section>
</div>

<script>
    function access_js() {
//Date picker
        $('#date').datetimepicker({format: "YYYY-MM-DD"});

        $(document).ready(function(){

            $(".add-new").click(function(){
                var row_count = $('#datatable tbody tr').length ;
                if(row_count = 1){
                    $("#totalAmt_Row").prop("hidden", false);
                }

                var index = $("#datatable tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td style="text-align: center"><input type="text" class="form-control " name="description"   id="description" ></td>' +
                    '<td style="text-align: center"><input type="number" class="form-control amount_val" name="amount" id="amount_' + row_count +' "  ></td>' +
                    '<td style="text-align: center"> <a class="btn btn-danger delete"  data-toggle="tooltip"><i class="fas fa-trash"></i></a> </td>' +
                    '</tr>';

                $("#datatable").append(row);
                $("#datatable tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();

                //disable keys except backspace
                $('#type').keydown(function(e) {
                    if(e.keyCode !== 8) {
                        e.preventDefault();
                    }
                });
                $('#location').keydown(function(e) {
                    if(e.keyCode !== 8) {
                        e.preventDefault();
                    }
                });
            });

            $(document).on('click', '.delete', function () {
                var row_count = $('#datatable tbody tr').length ;
                if(row_count < 3){
                    $("#totalAmt_Row").prop("hidden", true);
                }
            });


            $("#datatable").on('input', '.amount_val', function () {
                amt_val();
            });

            function amt_val() {
                var calculated_total_sum = 0;
                $("#datatable .amount_val").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }
                });
                $("#total_amt").val(calculated_total_sum);
            }


            $(document).on("click", ".submit", function(){
                tableToJSON_Update($("#datatable"));
                console.log( $("[name=pass_data]").val());
            });

            // Delete row on delete button click
            $(document).on("click", ".delete", function(){

                $(this).parents("tr").remove();
                amt_val();
                //update pass datatable data
                tableToJSON_Update($("#datatable"));
            });


            function tableToJSON_Update(tblObj){
                var data = [];
                var $headers = $(tblObj).find("th");
                var $rows = $(tblObj).find('tbody tr').each(function(rowIndex)
                {
                    $cells = $(this).find('td input');
                    data[rowIndex] = {};
                    $cells.each(function(cellIndex) {
                        data[rowIndex][$($headers[cellIndex]).html()] = $(this).val() ;
                    });
                });

                var json_data = JSON.stringify(data);
                $("[name=pass_data]").val(json_data);
            }

        });
    }
</script>