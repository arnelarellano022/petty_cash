<?php if (!isset($_SESSION['user_role'])) {
    redirect('index', 'refresh');
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="RXozV2YzcGs1TH8jJAshIRcxRwAVVRYsLT5VPg4GGxIBPkIWIQAADg==">
    <title>Outlet Invoices View</title>
    <link href="<?php echo base_url();?>assets/home/attendance/view/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/attendance/view/css/site.css" rel="stylesheet"></head>
<body>

<div class="wrap">
    <?php $this->load->view('header'); ?>

    <div class="container">
        <?php if ($fetch_data){
        foreach ($fetch_data->result() as $rs) {?>
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>outlet_invoice_index">Outlet Invoices List</a></li>
            <li class="active"><?php echo $rs->doi_id;?></li>
        </ul>
        <div >

            <h1>Outlet Invoices View</h1><br>
            <p>
                <a class="btn btn-primary" href="<?php echo base_url();?>update_outlet_invoice/<?php echo $rs->doi_id ;?>">Update</a>
                <a class="btn btn-danger" href="<?php echo base_url();?>delete_outlet_invoice/<?php echo $rs->doi_id ;?>" data-confirm="Are you sure you want to delete this item?" data-method="post">Delete</a>
            </p>
            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>
            <table id="w0" class="table table-striped table-bordered detail-view">

                <tr>
                    <th style="width: 50%">Record Id</th>
                    <td><?php echo $rs->doi_id; ?></td>
                </tr>
                <tr>
                    <th style="width: 50%">Invoice No.</th>
                    <td><?php echo $rs->invoice_no; ?></td>
                </tr>
                <tr>
                    <th style="width: 50%">Invoice Date</th>
                    <td><?php echo $rs->invoice_date; ?></td>
                </tr>
                <tr>
                    <th style="width: 50%">Outlet Name</th>
                    <td><?php echo $this->Outlet_Invoice_Model->getOutletName($rs->outlet); ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th style="width: 50%">Gross Amount</th>-->
<!--                    <td>--><?php //echo $rs->gross_amount; ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th style="width: 50%">Discount Amount</th>-->
<!--                    <td>--><?php //echo $rs->discount_amount; ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th style="width: 50%">VAT Amount</th>-->
<!--                    <td>--><?php //echo $rs->vat_amount; ?><!--</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <th style="width: 50%">Other Discount Amount</th>-->
<!--                    <td>--><?php //echo $rs->other_discount_amount; ?><!--</td>-->
<!--                </tr>-->

                </table>

            <table   class="table table-striped table-bordered " STYLE="text-align: center; margin-top: 20px">
                <thead>
                <tr>
                    <th class="kv-align-center kv-align-middle" style="width: 20%; text-align: center" >SKU</th>
                    <th class="kv-align-center kv-align-middle" style="width: 60%; text-align: center" >Description</th>
                    <th class="kv-align-center kv-align-middle" style="width: 20%; text-align: center" >Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($fetch_data_item){

                    foreach ($fetch_data_item->result() as $row) {
                        ?>
                        <tr>
                            <td class="kv-align-center kv-align-middle"><?php echo $row->sku;?></td>
                            <td class="kv-align-center kv-align-middle"><?php echo $this->Outlet_Invoice_Model->get_inv_desc($row->sku) ;?></td>
                            <td class="kv-align-center kv-align-middle"><?php echo $row->quantity;?></td>
                        </tr>
                    <?php }}?>
                </tbody>
            </table>

                <?php }}?>
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url();?>assets/home/attendance/view/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/home/attendance/view/js/yii.js"></script>
<script src="<?php echo base_url(); ?>assets/home/attendance/view/js/bootstrap.js"></script>


<script type="text/javascript">$( document ).ready(function() {$("#notif_fade").fadeOut(5000);});</script>

</body>
</html>
