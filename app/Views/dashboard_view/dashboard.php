<?php if (!isset($_SESSION['user_role'])) {
    redirect('index', 'refresh');
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="R3NlR1lxdVIeCgcmGy4EHzRAJnR0NgQ4E0QBF2A9Qg0uBC0kESAnCw==">
    <title>SCMC-CRM System</title>
    <link href="<?=  base_url('assets/dashboard/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?=  base_url('assets/dashboard/css/site.css');?>" rel="stylesheet">

</head>
<body>

<div class="wrap">

<?= view('header'); ?>


    <div class="container"></div>
    <div class="container">
        <div class="site-index">
            <div class="jumbotron">

                <h1>Welcome to <br>SCMC-Customer Relationship Management System</h1>

            </div>

            <div class="body-content">
            </div>
        </div>
    </div>
</div>
  <?=  view('footer'); ?>

    <script src="<?= base_url('assets/dashboard/js/jquery.js');?>"></script>
    <script src="<?= base_url('assets/dashboard/js/yii.js');?>"></script>
    <script src="<?= base_url('assets/dashboard/js/bootstrap.js');?>"></script>

</body>
</html>
