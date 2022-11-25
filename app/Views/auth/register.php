
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/ionicons/css/ionicons.min.css')?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/adminlte.min.css')?>">
</head>
<body class="hold-transition register-page" style="background: url('<?= base_url("assets/adminLTE/dist/img/bg_pics.jpg");?>') bottom;">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h3">SCMC Inventory System</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>
            <?=  view('partial/message'); ?>
            <form action="<?= base_url('add_register');?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required id="username" onblur="check_username()" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-circle"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-circle"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input onblur=" check_b4_submit()"  onclick=" cpw_length_check();" class="form-control" type="password" name="c_password" value="" required="" id="c_password" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select name="sec_question" class="form-control" required >
                        <option value="" hidden>Select Security Question</option>
                        <option value="1">What is your favorite food?</option>
                        <option value="2">In what city were you born?</option>
                        <option value="3">What was your childhood nickname?</option>
                        <option value="4">What is your mother's maiden name?</option>
                        <option value="5">What is the name of your favorite pet?</option>
                        <option value="6">Where did you meet your spouse/partner?</option>
                        <option value="7">What year was your father (or mother) born?</option>
                        <option value="8">In what city or town was your first job?</option>
                        <option value="9">What was the name of your elementary school?</option>
                        <option value="10">What is the name of your favorite childhood friend?</option>

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
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <input type="hidden" name="submit" value="submit"/>
                        <button onclick="return check_b4_submit();" type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div style="margin-top: 10px; margin-bottom: 5px">
                <a href="<?= base_url('index') ?>" class="btn btn-block btn-success">
                    I already have an account
                </a>

            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

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
    var password = $("#password").val();
    var c_password = $("#c_password").val();
    var pswlen = password.length;

    function check_b4_submit() {
        var password = $("#password").val();
        var c_password = $("#c_password").val();
        var pswlen = password.length;
        if (password != '' && c_password != '' && password != c_password) {
            alert('Password and Confirm Password must be the same');
            return false;
        }
        return true;
    }

    function cpw_length_check() {
        var password = $("#password").val();
        var c_password = $("#c_password").val();
        var pswlen = password.length;
        if(password != ''){
            if (pswlen < 8 && password != '' ) {
                alert('Password must be at least 8 characters');
                $("#password").focus();
            }
            if ( c_password != '' && pswlen < 8 ) {
                alert('Confirm Password must be at least 8 characters');
                $("#c_password").focus();
            }
        }else{
            alert("You must input the Password first");
            $("#password").focus();
        }
    }

    //Check Username Exist
    function check_username()
    {
        var username = $("#username").val();
        if(username != '') {
            $.ajax({
                url: "<?= base_url("Users/check_username_exist");?>",
                method: "POST",
                data: {username: username},
                success: function (data) {
                    if (data == 1) {
                        alert("Username already exist!");
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
