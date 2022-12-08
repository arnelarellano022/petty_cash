
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?=  view('partial/message'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-plus mt-2"></i>
                        &nbsp; <b><?= $title ?></b> </h3>
                </div>
<!--                --><?php //if(){} ?>
                <div class="d-inline-block float-right">
                    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> <b>BACK</b></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- form start -->
                            <div class="box-body">
                                    <?= form_open_multipart('add_user') ?>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input onblur="check_username()" class="form-control " type="text" name="username" value="" required="" id="username">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" type="text" name="firstname" value="" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" name="lastname" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <input class="form-control" type="password" name="password" value="" required="" id="password">
                                                    <div class="input-group-text">
                                                        <span id="eye_close1" class="fas fa-eye-slash eye_close1" hidden></span>
                                                        <span id="eye_open1" class="fas fa-eye eye_open1" ></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <input onblur=" check_b4_submit()"  onclick=" cpw_length_check();" class="form-control" type="password" name="c_password" value="" required="" id="c_password">
                                                    <div class="input-group-text">
                                                        <span id="eye_close2" class="fas fa-eye-slash eye_close2" hidden></span>
                                                        <span id="eye_open2" class="fas fa-eye eye_open2" ></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label">Security Question</label>
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
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Answer</label>
                                                    <input class="form-control" type="text" name="sec_answer" value="" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label">Select User Role</label>
                                                        <select name="user_role" class="form-control" required>
                                                            <option value="" hidden>Select Role</option>
                                                            <?php foreach($user_role_list as $role_row): ?>
                                                                <option value="<?= $role_row->roles; ?>"><?= $role_row->roles; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="file">PICTURE</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="file" name="file">
                                                            <label class="custom-file-label" for="file">Select Picture</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <input type="hidden" name="submit" value="submit"/>
                                        <button onclick="return check_b4_submit();" type="submit" class="btn btn-success float-right"><b>SUBMIT</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </section>
</div>

<script>
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
function access_js() {

    $(document).on("click", ".eye_open1",function () {
        $("#password").attr("type","text");
        $("#eye_open1").attr("hidden", "hidden");
        $("#eye_close1").removeAttr("hidden", "hidden");
    });

    $(document).on("click", ".eye_close1", function(){
        $("#password").attr("type","password");
        $("#eye_open1").removeAttr("hidden", "hidden");
        $("#eye_close1").attr("hidden", "hidden");
    });

    $(document).on("click", ".eye_open2",function () {
        $("#c_password").attr("type","text");
        $("#eye_open2").attr("hidden", "hidden");
        $("#eye_close2").removeAttr("hidden", "hidden");
    });

    $(document).on("click", ".eye_close2", function(){
        $("#c_password").attr("type","password");
        $("#eye_open2").removeAttr("hidden", "hidden");
        $("#eye_close2").attr("hidden", "hidden");
    });

    $(function () {
        bsCustomFileInput.init();
    });
}
    
</script>