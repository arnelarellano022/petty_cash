<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo" >
            <div class="card-header" >
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
                        <div class="box" >
                            <!-- form start -->
                            <div class="box-body">
                                <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                                <div class ="row">
                                    <div class=" col-sm-8" style="margin-left: auto; margin-right: auto" >
                                        <table class="table table-bordered" style="text-align: center; font-size: large" >
                                            <tr>
                                                <th style="background-color: #D9EDF7;text-align: left" colspan="6" ><h5><b> <i class="fa fa-info-circle mt-2"></i> TRANSACTION INFO</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%; background-color: #F4FAFD" colspan="1" >Reference Code </th><th colspan="5"><?= $row->reference_code ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%; background-color: #F4FAFD" colspan="1" >Transaction Date</th><th colspan="5"><?= $row->date ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%; background-color: #F4FAFD" colspan="1" >Transaction Type</th><th colspan="5"><?= $row->transaction_type ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%; background-color: #F4FAFD" colspan="1" >Amount</th><th colspan="5"><?= $row->amount ?></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%; background-color: #F4FAFD" colspan="1" >Record Type</th><th colspan="5"><?= $row->record_type ?></th>
                                            </tr>
                                        </table>

                                        <table class="table table-bordered" style="text-align: center; font-size: large; " >

                                            <tr>
                                                <th style="background-color: #D9EDF7;text-align: left;" colspan="6" ><h5><b><i class="fa fa-info-circle mt-2"></i> RECORD INFO</b></h5></th>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle; width: 25%;background-color: #F4FAFD; ">Created By </th><th style="vertical-align: middle; width: 25%" colspan="2"><?= get_user_role($row->created_by)  ?></th> <th style="vertical-align: middle; width: 25%;background-color: #F4FAFD">Created At </th><th style="width: 25%" colspan="2"><?= $row->created_at ?></th>
                                            </tr>
                                            <tr>
                                                <th style="vertical-align: middle ;width: 25%;background-color: #F4FAFD">Updated By </th><th style="vertical-align: middle; width: 25%" colspan="2"><?= get_user_role($row->updated_by) ?></th> <th style="vertical-align: middle; width: 25%;background-color: #F4FAFD">Updated AT</th><th style="width: 25%" colspan="2"><?= $row->updated_at ?></th>
                                            </tr>
                                        </table>

                                    </div>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



