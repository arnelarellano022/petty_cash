<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-edit mt-2"></i>
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
                                    <form action="<?= base_url("edit_management_transaction/". $row->transaction_id); ?>" method="post">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Reference Code</label>
                                                        <input class="form-control " type="text" name="reference_code" value="<?= $row->reference_code ?>" required="" >
                                                    </div>
                                                </div>
                                                <!-- Date -->
                                                <div class="form-group col-sm-12">
                                                    <label>Transaction Date</label>
                                                    <div class="input-group date" id="date" data-target-input="nearest">
                                                        <input type="text" name="date" id="date_val" class="form-control datetimepicker-input" data-target="#date" placeholder="Enter Transaction Date " data-toggle="datetimepicker" value="<?= $row->date ?>"/>
                                                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                        <div class="input-group-text" onclick="$('#date_val').val('');" ><i class="fa fa-times"></i></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class=" control-label">Transaction Type</label>
                                                        <select name="transaction_type" class="form-control" required >
                                                            <option hidden>Select Type</option>
                                                            <option value="Cash In" <?php if($row->transaction_type == "Cash In"){echo "selected";}?>>Cash In</option>
                                                            <option value="Cash Out"<?php if($row->transaction_type == "Cash Out"){echo "selected";}?>>Cash Out</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input class="form-control " type="text" name="amount" value="<?= $row->amount ?>" required="" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class=" control-label">Record Type</label>
                                                        <select name="record_type" class="form-control" required >
                                                            <option hidden>Select Type</option>
                                                            <option value="Buendia" <?php if($row->record_type == "Buendia"){echo "selected";}?>>Buendia</option>
                                                            <option value="Planta"<?php if($row->record_type == "Planta"){echo "selected";}?>>Planta</option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <input type="hidden" name="submit" value="submit"  />
                                            <button type="submit" class="btn btn-success float-right"><b>SUBMIT</b></button>
                                        </div>
                                    </form>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
    </section>
</div>

<script>
function access_js() {
//Date picker
    $('#date').datetimepicker({format: "YYYY-MM-DD"});
}
</script
>


