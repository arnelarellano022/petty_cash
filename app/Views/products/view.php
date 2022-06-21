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
    <title>Products View</title>
    <link href="<?php echo base_url();?>assets/home/attendance/view/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/attendance/view/css/site.css" rel="stylesheet"></head>
<body>

<div class="wrap">
    <?php $this->load->view('header'); ?>

    <div class="container">
        <?php if ($fetch_data){
        foreach ($fetch_data->result() as $rs) {?>
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>products_index">Products List</a></li>
            <li class="active"><?php echo $rs->sku;?></li>
        </ul>
        <div >

            <h1>Products View</h1><br>
            <p>
                <a class="btn btn-primary" href="<?php echo base_url();?>update_products/<?php echo $rs->sku ;?>">Update</a>
                <a class="btn btn-danger" href="<?php echo base_url();?>delete_products/<?php echo $rs->sku ;?>" data-confirm="Are you sure you want to delete this item?" data-method="post">Delete</a>
            </p>
            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>
            <table id="w0" class="table table-striped table-bordered detail-view">

                <tr>
                    <th style="width: 50%">SKU</th>
                    <td><?php echo $rs->sku; ?></td>
                </tr>
                <tr>
                    <th style="width: 50%">Category</th>
                    <td><?php echo $rs->category; ?></td>
                </tr>
                <tr>
                    <th style="width: 50%">Sub-Category</th>
                    <td><?php echo $rs->sub_category; ?></td>
                </tr>
                <tr>
                    <th style="width: 50%">Description</th>
                    <td><?php echo $rs->description; ?></td>
                </tr>

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
