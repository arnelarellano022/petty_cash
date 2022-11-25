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
                                                        <input class="form-control" type="text" name="password" value="" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input class="form-control" type="text" name="c_password" value="" >
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
                                                        <input class="form-control" type="text" name="sec_answer" value="<?= $row->sec_answer;?>" required="">
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
                                            <button type="submit" class="btn btn-success float-right"><b>SUBMIT</b></button>
                                        </div>
                                    </form>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
    </section>
</div>






