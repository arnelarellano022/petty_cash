
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/google-font/google-font.css')?>">

    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/fontawesome-free/css/googlefont.css')?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/ionicons/css/ionicons.min.css')?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/adminlte.min.css')?>">

    <!-- toogle-switch -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/toogle-switch/toogle-switch.css')?>">

</head>

<body class="hold-transition sidebar-mini layout-fixed"   style="
        background: url('<?= base_url("assets/adminLTE/dist/img/bg_pics.jpg");?>') bottom;
        background-size: 103%;
        margin-left: 40%;
        margin-right: 40%;
        margin-top: 10%;
        ">
<!-- Site wrapper -->
<div class="wrapper" >


<div  >


    <div class="login-box" >
        <div class="login-logo">
            <h1 style="color: red">CodeIgniter 4 Project</h1>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?=  view('partial/message'); ?>

                <?php echo form_open(base_url('auth/validate_login'), 'class="login-form" '); ?>
                <div class="form-group has-feedback">
                    <input type="text" name="username" id="name" class="form-control" placeholder="Username" >
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
                    </div>
                    <!-- /.col -->
                </div>
                <?php echo form_close(); ?>

                <p class="mb-1">
                    <a href="<?= base_url('admin/auth/forgot_password'); ?>">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('admin/auth/register'); ?>" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>
