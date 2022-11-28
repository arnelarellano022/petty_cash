<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-plus mt-2"></i>
                        &nbsp; <b><?= $title ?></b> </h3>
                </div>
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
                                <?php if($fetch_data){foreach ($fetch_data as $row) {?>
                                    <form action="<?= base_url("edit_user/". $row->user_id); ?>" method="post">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>User Name</label>
                                                        <input class="form-control" type="text" name="module_name" value="<?= $row->username;?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input class="form-control" type="text" name="firstname" value="<?= $row->firstname;?>" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input class="form-control" type="text" name="lastname" value="<?= $row->lastname;?>" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <div class="input-group-append">
                                                            <input class="form-control" type="password" name="password" value="" required="" id="password">
                                                            <div class="input-group-text">
                                                                <span id="eye_close1" class="fas fa-eye-slash eye_close1" hidden></span>
                                                                <span id="eye_open1" class="fas fa-eye eye_open1" ></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <div class="input-group-append">
                                                            <input onblur=" check_b4_submit()"  onclick=" cpw_length_check();" class="form-control" type="password" name="c_password" value="" required="" id="c_password">
                                                            <div class="input-group-text">
                                                                <span id="eye_close2" class="fas fa-eye-slash eye_close2" hidden></span>
                                                                <span id="eye_open2" class="fas fa-eye eye_open2" ></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="col-md-12 control-label">Security Question</label>
                                                        <select name="sec_question" class="form-control" required >
                                                            <option value="" hidden>Select Security Question</option>
                                                            <option value="1" <?php if($row->sec_question == 1){ echo "selected";} ?>>What is your favorite food?</option>
                                                            <option value="2" <?php if($row->sec_question == 2){ echo "selected";} ?>>In what city were you born?</option>
                                                            <option value="3" <?php if($row->sec_question == 3){ echo "selected";} ?>>What was your childhood nickname?</option>
                                                            <option value="4" <?php if($row->sec_question == 4){ echo "selected";} ?>>What is your mother's maiden name?</option>
                                                            <option value="5" <?php if($row->sec_question == 5){ echo "selected";} ?>>What is the name of your favorite pet?</option>
                                                            <option value="6" <?php if($row->sec_question == 6){ echo "selected";} ?>>Where did you meet your spouse/partner?</option>
                                                            <option value="7" <?php if($row->sec_question == 7){ echo "selected";} ?>>What year was your father (or mother) born?</option>
                                                            <option value="8" <?php if($row->sec_question == 8){ echo "selected";} ?>>In what city or town was your first job?</option>
                                                            <option value="9" <?php if($row->sec_question == 9){ echo "selected";} ?>>What was the name of your elementary school?</option>
                                                            <option value="10" <?php if($row->sec_question == 10){ echo "selected";} ?>>What is the name of your favorite childhood friend?</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Answer</label>
                                                        <div class="input-group-append">
                                                            <input class="form-control" type="password" name="sec_answer" value="<?= $row->sec_answer;?>" required="" id="sec_answer">
                                                            <div class="input-group-text">
                                                                <span id="eye_close3" class="fas fa-eye-slash eye_close3" hidden></span>
                                                                <span id="eye_open3" class="fas fa-eye eye_open3" ></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="role" class="col-md-12 control-label">Select User Role</label>
                                                        <select name="user_role" class="form-control" required>
                                                            <option value="" hidden>Select Role</option>
                                                            <?php foreach($user_role_list as $role_row): ?>
                                                                <option value="<?= $role_row->roles; ?>" <?php if($row->user_role == $role_row->roles){ echo "selected";} ?> ><?= $role_row->roles; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <input type="hidden" name="submit" value="submit"  />
                                            <button onclick="return check_b4_submit();" type="submit" class="btn btn-success float-right"><b>SUBMIT</b></button>
                                        </div>
                                    </form>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
    </section>
</div>

<script>
    function check_b4_submit() {
        var password = $("#password").val();
        var c_password = $("#c_password").val();

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
        $(document).on("click", ".eye_open3",function () {
            $("#sec_answer").attr("type","text");
            $("#eye_open3").attr("hidden", "hidden");
            $("#eye_close3").removeAttr("hidden", "hidden");
        });

        $(document).on("click", ".eye_close3", function(){
            $("#sec_answer").attr("type","password");
            $("#eye_open3").removeAttr("hidden", "hidden");
            $("#eye_close3").attr("hidden", "hidden");
        });

    }

</script>



