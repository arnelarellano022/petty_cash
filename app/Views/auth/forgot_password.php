
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGN IN</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/ionicons/css/ionicons.min.css')?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/adminlte.min.css')?>">
</head>

<body class="hold-transition login-page" style="background: url('<?= base_url("assets/adminLTE/dist/img/bg_pics.jpg");?>') bottom;" >

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center" style="margin-top: 10px; margin-bottom: 5px">
            <a href="#" class="h3">SCMC Inventory System</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <?=  view('partial/message'); ?>

            <?php echo form_open(base_url('auth/validate_account_security'), 'class="login-form" '); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" onblur="check_username()">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
            <div class="input-group mb-3">
                <select name="sec_question" class="form-control" required >
                    <option value="" hidden>Select your security question</option>
                    <option value="1">In what city you were born?</option>
                    <option value="2">What is the name of your favorite pet?</option>
                    <option value="3">What is your mother's maiden name?</option>
                    <option value="4">What high school did you attend?</option>
                    <option value="5">What was the name of your elementary school?</option>
                    <option value="6">What was the make of your first car?</option>
                    <option value="7">What was your favorite food as a child?</option>
                    <option value="8">Where did you meet your spouse/partner?</option>
                    <option value="9">What year was your father (or mother) born?</option>

                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-question"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Answer" name="sec_answer">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-list-alt"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                    <!-- /.col -->
                    <div class="col-12" style="margin-bottom: 12px">
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?php echo form_close(); ?>

            <p class="mb-0">
                <a href="<?= base_url('index') ?>" class="text-center">Login</a>
            </p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('assets/adminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<!--<script src="--><?//=base_url('assets/adminLTE/dist/js/adminlte.js')?><!--"></script>-->
<script src="<?=base_url('assets/adminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- MY JS CODES HERE -->
<script src="<?=base_url('assets/adminLTE/dist/js/my-js-code.js')?>"></script>

<script>
    $('#username').focus();

    //Check Username Exist
    function check_username()
    {
        var username = $("#username").val();

        if(username != ''){
            $.ajax({
                url: "<?= base_url("Auth/check_username_exist");?>",
                method: "POST",
                data: {username: username},
                success: function (data) {

                    if (data == 1) {
                        alert("Username does not exist!");
                        $("#username").val('');
                        $("#username").focus();
                    }
                }
            });
        }
    }
</script>
</body>
</html>
