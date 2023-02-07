
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
                                <form action="<?= base_url('add_management_transaction');?>" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Reference Code</label>
                                                    <input class="form-control " type="text" name="reference_code" value="" required="" >
                                                </div>
                                            </div>
                                            <!-- Date -->
                                            <div class="form-group col-sm-12">
                                                <label>Transaction Date</label>
                                                <div class="input-group date" id="date" data-target-input="nearest">
                                                    <input type="text" name="date" id="date_val" class="form-control datetimepicker-input" data-target="#date" placeholder="Enter Transaction Date " data-toggle="datetimepicker"/>
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
                                                        <option value="Cash In">Cash In</option>
                                                        <option value="Cash Out">Cash Out</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input class="form-control " type="text" name="amount" value="" required="" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <input type="hidden" name="submit" value="submit"/>
                                        <button type="submit" class="btn btn-success float-right"><b>SUBMIT</b></button>
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
}
</script>