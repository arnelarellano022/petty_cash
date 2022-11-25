
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open(base_url('auth/validate_account_security'), 'class="login-form" '); ?>
                    <div class="modal-header">
                        <h4 class="modal-title">Enter your new password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

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



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="submit" value="submit"/>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center" style="margin-top: 10px; margin-bottom: 5px">
            <a href="#" class="h3">SCMC Inventory System</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
            <?=  view('partial/message'); ?>


                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" onblur="check_username()">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="Security Question" name="sec_question" readonly style="background-color: white" id="sec_question" onclick="$('#sec_answer').focus();">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-question"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Answer" name="sec_answer" readonly style="background-color: white" id="sec_answer">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-list-alt"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                    <!-- /.col -->
                    <div class="col-12" style="margin-bottom: 12px">
                        <button type="submit" class="btn btn-primary btn-block " onclick="check_account_sec();" >Change Password</button>
                    </div>
                    <!-- /.col -->
                </div>


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
    var username = $("#username").val();
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
                        $("#sec_question").val('');
                        $("#sec_answer").val('');
                        $("#username").focus();
                        $("#sec_answer").attr('readonly','readonly');
                    }else{
                        $("#sec_answer").removeAttr('readonly');

                        $.ajax({
                            url: "<?= base_url("Auth/get_sec_question");?>",
                            method: "POST",
                            data: {username: username},
                            success: function (data) {
                               var sec_question = data;
                               if(sec_question == 1){
                                   $("#sec_question").val('What is your favorite food?');
                               }
                               else if(sec_question == 2){
                                   $("#sec_question").val('In what city were you born?');
                               }
                               else if(sec_question == 3){
                                   $("#sec_question").val('What was your childhood nickname?');
                               }
                               else if(sec_question == 4){
                                   $("#sec_question").val("What is your mother's maiden name?");
                               }
                               else if(sec_question == 5){
                                   $("#sec_question").val('What is the name of your favorite pet?');
                               }
                               else if(sec_question == 6){
                                   $("#sec_question").val('Where did you meet your spouse/partner?');
                               }
                               else if(sec_question == 7){
                                   $("#sec_question").val('What year was your father (or mother) born?');
                               }
                               else if(sec_question == 8){
                                   $("#sec_question").val('In what city or town was your first job?');
                               }
                               else if(sec_question == 9){
                                   $("#sec_question").val('What was the name of your elementary school?');
                               }
                               else if(sec_question == 10){
                                   $("#sec_question").val('What is the name of your favorite childhood friend?');
                               }
                            }
                            });
                    }
                }
            });
        }
    }

  function check_account_sec() {
      var username = $("#username").val();
      var sec_answer = $("#sec_answer").val();
      if(username != '' && sec_answer != '' ){
          $.ajax({
              url: "<?= base_url("Auth/check_account_sec");?>",
              method: "POST",
              data: {username: username, sec_answer : sec_answer},
              success: function (data) {

                  if (data == 1) {
                      $('#modal-default').modal('show');

                  }else{ alert('Incorrect Security Answer'); }
              }
          });
      }
  }



</script>
</body>
</html>
