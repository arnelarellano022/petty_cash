
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="QU91d19BNkMYNhcWHR5HDjJ8NkRyBkcpFXgRJ2YNARwoOD0UFxBkGg==">
    <title>Sign in</title>
    <link href="<?=  base_url('assets/login/css/authchoice.css');?>" rel="stylesheet">
    <link href="<?=  base_url('assets/login/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?=  base_url('assets/login/css/site.css');?>" rel="stylesheet">
</head>
<body>

<div class="wrap">
    <nav id="w1" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard">SCMC-CRM System</a></div>
            <div id="w1-collapse" class="collapse navbar-collapse">
                <ul id="w2" class="navbar-nav navbar-right nav">
                    <li class="active"><a href="<?php echo base_url(); ?>dashboard"">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard"">Home</a></li>
            <li class="active">Sign in</li>
        </ul>

        <div class="row">
            <div class="col-xs-12">
            </div>
        </div>
        <div id="notif_fade" class="col-md-12">
            <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
            <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
            <!--  --><?php //echo validation_errors('<div class="alert alert-danger">','</div>');?>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign in</h3>
                    </div>

                    <div class="panel-body">

                        <form action="<?= base_url('login/validate_login');?>" method="post" data-toggle="validator" id="frm_validation" enctype="multipart/form-data">
                            <input type="hidden" name="_csrf" value="QU91d19BNkMYNhcWHR5HDjJ8NkRyBkcpFXgRJ2YNARwoOD0UFxBkGg==">
                            <div class="form-group field-login-form-login required">
                                <label class="control-label" for="login-form-login">Login</label>
                                <input type="text" id="login-form-login" class="form-control" name="username" autofocus="autofocus" tabindex="1" required>

                                <div class="help-block"></div>
                            </div>
                            <div class="form-group field-login-form-password required">
                                <label class="control-label" for="login-form-password">Password</label>
                                <input type="password" id="login-form-password" class="form-control" name="password" tabindex="2" required>

                                <div class="help-block"></div>

                            </div>
                            <div class="form-group field-login-form-rememberme">

                                <input type="hidden" name="remember_me" value="0"><label><input type="checkbox"
                                                                                                id="login-form-rememberme"
                                                                                                name="remember_me"
                                                                                                value="1" tabindex="4">
                                    Remember me next time</label>

                                <div class="help-block"></div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block" tabindex="3">Sign in</button>
                        </form>

                    </div>
                </div>
                <div id="w0"><ul class="auth-clients"></ul></div>    </div>
        </div>
    </div>
</div>
<?= view('footer'); ?>

<script src="<?php echo base_url('assets/login/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/login/js/yii.js');?>"></script>
<script src="<?php echo base_url('assets/login/js/yii.activeForm.js');?>"></script>
<script src="<?php echo base_url('assets/login/js//authchoice.js');?>"></script>
<script src="<?php echo base_url('assets/login/js/bootstrap.js');?>"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });
</script>

<script type="text/javascript">jQuery(document).ready(function () {
        jQuery('#login-form').yiiActiveForm([{"id":"login-form-login","name":"login","container":".field-login-form-login",
            "input":"#login-form-login","enableAjaxValidation":true,"validateOnChange":false,"validateOnBlur":false},
            {"id":"login-form-password","name":"password","container":".field-login-form-password","input":"#login-form-password",
                "enableAjaxValidation":true,"validateOnChange":false,"validateOnBlur":false},
            {"id":"login-form-rememberme","name":"rememberMe","container":".field-login-form-rememberme","input":"#login-form-rememberme",
                "enableAjaxValidation":true,"validateOnChange":false,"validateOnBlur":false}], []);
        $('#w0').authchoice();
    });
</script>
</body>
</html>
