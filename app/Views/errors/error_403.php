<?php if (!isset($_SESSION['user_role'])) {
    redirect('index', 'refresh');
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Mk9DS0pLQi5rNiEqCBQzY0F8AHhnDDNEZngnG3MHdXFbOAsoAhoQdw==">
    <title>Error 403</title>
    <link href="<?=  base_url('assets/login/css/authchoice.css');?>" rel="stylesheet">
    <link href="<?=  base_url('assets/login/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?=  base_url('assets/login/css/site.css');?>" rel="stylesheet">

<body>

<div class="wrap">
    <?= view('header'); ?>
    <div class="container">
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li></ul>

        <div id="container">
            <h1>Forbidden(403)</h1>
            <p>You don't have permission to access this site.</p>
            <p>Please contact the administrator if you think this is a server error.</p>
        </div>

    </div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
</div>

<?= view('footer'); ?>

<script src="<?=  base_url('assets/home/attendance/form/js/jquery.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/yii.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/yii.gridView.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/jquery.pjax.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/bootstrap.js');?>"></script>
</body>
</html>

