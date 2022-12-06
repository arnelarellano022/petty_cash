
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
<!--                                <form action="--><?//= base_url('add_employee');?><!--" method="post">-->

                                    <?= form_open_multipart('add_employee') ?>
                                    <div class="box-body">
                                        <div class="col-sm-12">
                                          <legend class = "text-info" style="border-bottom: 1px solid gainsboro; margin-bottom: 15px;">EMPLOYEE INFORMATION</legend>
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label>ID NUMBER</label>
                                                    <input onblur="check_id_no()" class="form-control " type="text" name="id_no" value=""  id="id_no" placeholder="Enter ID Number">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>LAST NAME</label>
                                                    <input class="form-control " type="text" name="last_name" value=""  id="last_name" placeholder="Enter Last Name">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>FIRST NAME</label>
                                                    <input class="form-control " type="text" name="first_name" value=""  id="first_name" placeholder="Enter First Name">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>MIDDLE NAME</label>
                                                    <input class="form-control " type="text" name="middle_name" value=""  id="middle_name" placeholder="Enter Middle Name">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>PRESENT ADDRESS</label>
                                                    <textarea class="form-control" type="text" name="present_address" placeholder="Enter Current Address"  id="present_address"></textarea>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>PERMANENT ADDRESS</label>
                                                    <textarea class="form-control" type="text" name="permanent_address" placeholder="Enter Permanent Address"  id="permanent_address"></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Date -->
                                                <div class="form-group col-sm-3">
                                                    <label>DATE</label>
                                                    <div class="input-group date" id="birthdate" data-target-input="nearest">
                                                        <input type="text" name="birthday" id="birthdate_val" class="form-control datetimepicker-input" data-target="#birthdate" placeholder="Enter Date of Birth" />
                                                        <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                        <div class="input-group-text" onclick="$('#birthdate_val').val('');" ><i class="fa fa-times" ></i></div>
                                                    </div>
                                                </div>
                                                <!--  Radio Button-->
                                                <div class="form-group col-sm-3" >
                                                    <label>GENDER</label><br>
                                                    <div style="text-align: center; border: 1px solid gainsboro ; height: 38px; ">
                                                        <div style="margin-top: 7px"  >
                                                            <div class="icheck-success d-inline" style="margin-right: 30px;">
                                                                <input type="radio" name="gender" checked id="radioSuccess1" value="Male">
                                                                <label for="radioSuccess1"> MALE</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" name="gender" id="radioSuccess2" value="Female">
                                                                <label for="radioSuccess2"> FEMALE</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">

                                                    <label class=" control-label">CIVIL STATUS</label>
                                                    <select name="civil_status" class="form-control" required >
                                                        <option hidden>Select Status</option>
                                                        <option value="1">Single</option>
                                                        <option value="2">Single w/ Children</option>
                                                        <option value="3">Married</option>
                                                        <option value="4">Married w/ Children</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>CONTACT NUMBER</label>
                                                    <input class="form-control " type="text" name="contact_number" value=""  id="middle_name" placeholder="Enter Contact Number">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label>SSS NUMBER</label>
                                                    <input class="form-control " type="text" name="sss" value=""  id="sss" placeholder="Enter SSS Number">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>PHILHEALTH NUMBER</label>
                                                    <input class="form-control " type="text" name="phic" value=""  id="phic" placeholder="Enter Philhealth Number">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>PAG-IBIG NUMBER</label>
                                                    <input class="form-control " type="text" name="hdmf" value=""  id="hdmf" placeholder="Enter Pag-ibig Number">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>TIN NUMBER</label>
                                                    <input class="form-control " type="text" name="tin" value=""  id="tin" placeholder="Enter TIN Number">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label>EDUCATIONAL ATTAINMENT</label>
                                                    <input class="form-control " type="text" name="educational_attainment" value=""  id="educational_attainment" placeholder="Enter Educational Attainment">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>EMERGENCY CONTACT PERSON</label>
                                                    <input class="form-control " type="text" name="e_contact_person" value=""  id="e_contact_person" placeholder="Enter Emergency Contact Person">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>ADDRESS OF EMERGENCY CONTACT</label>
                                                    <input class="form-control " type="text" name="e_address" value=""  id="e_address" placeholder="Enter Address of Emergency Contact">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>CONTACT NUMBER OF EMERGENCY CONTACT</label>
                                                    <input class="form-control " type="text" name="e_contact_no" value=""  id="e_contact_no" placeholder="Enter Contact Number of Emergency Contact">
                                                </div>
                                            </div>

                                          <legend class = "text-info" style="border-bottom: 1px solid gainsboro; margin-bottom: 15px;">EMPLOYMENT DETAILS</legend>

                                            <div class="row">

                                                <div class="form-group col-sm-3">

                                                    <label class=" control-label">COMPANY</label>
                                                    <select name="company" class="form-control" required >
                                                        <option hidden>Select Company</option>
                                                        <?php foreach($company_list as $row): ?>
                                                            <option value="<?= $row->company_id; ?>"><?= $row->company_name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-3">
                                                    <label>POSITION</label>
                                                    <input class="form-control " type="text" name="position" value=""  id="position" placeholder="Enter Position">
                                                </div>

                                                <div class="form-group col-sm-3">

                                                    <label class=" control-label">DEPARTMENT</label>
                                                    <select name="department" class="form-control" required >
                                                        <option hidden>Select Departmant</option>
                                                        <?php foreach($department_list as $row): ?>
                                                            <option value="<?= $row->dept_id; ?>"><?= $row->dept_name; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <!-- Date -->
                                                <div class="form-group col-sm-3">
                                                    <label>DATE HIRED</label>
                                                    <div class="input-group date" id="date_hired" data-target-input="nearest">
                                                        <input type="text" name="date_hired" id="date_hired_val" class="form-control datetimepicker-input" data-target="#date_hired" placeholder="Enter Date Hired" />
                                                        <div class="input-group-append" data-target="#date_hired" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                        <div class="input-group-text" onclick="$('#date_hired_val').val('');" ><i class="fa fa-times"></i></div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="form-group col-sm-4">

                                                    <label class=" control-label">EMPLOYEE STATUS</label>
                                                    <select name="employment_status" class="form-control" required >
                                                        <option hidden>Select Status</option>
                                                        <option value="1">Regular</option>
                                                        <option value="2">Probationary</option>
                                                        <option value="3">Resigned</option>
                                                        <option value="4">AWOL</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-4">

                                                    <label class=" control-label">EMPLOYEE RANK</label>
                                                    <select name="employee_rank" class="form-control" required >
                                                        <option hidden>Select Employee Rank</option>
                                                        <option value="1">S1</option>
                                                        <option value="2">S2</option>
                                                        <option value="3">S3</option>
                                                        <option value="4">S4</option>
                                                        <option value="5">S5</option>
                                                    </select>
                                                </div>

                                                <!-- Date -->
                                                <div class="form-group col-sm-4">
                                                    <label>DATE OF SEPARATION</label>
                                                    <div class="input-group date" id="date_of_separation" data-target-input="nearest">
                                                        <input type="text" name="date_of_separation" id="date_of_separation_val" class="form-control datetimepicker-input" data-target="#date_of_separation" placeholder="Enter Date of Birth" />
                                                        <div class="input-group-append" data-target="#date_of_separation" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                        <div class="input-group-text" onclick="$('#date_of_separation_val').val('');" ><i class="fa fa-times"></i></div>
                                                    </div>
                                                </div>

                                            </div>


                                            <legend class = "text-info" style="border-bottom: 1px solid gainsboro; margin-bottom: 15px;">UPLOAD EMPLOYEE PICTURE</legend>

                                            <div class="form-group">
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
                                        <button type="submit" class="btn btn-success float-right"><b>SUBMIT</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </section>
</div>

<script>

    //Check Username Exist
    function check_id_no()
    {
        var username = $("#username").val();

        $.ajax({
            url: "<?= base_url("Users/check_id_no_exist");?>",
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

    //Date picker
    $('#birthdate').datetimepicker({
        format: "YYYY-MM-DD"
    });
    $('#date_hired').datetimepicker({
        format: "YYYY-MM-DD"
    });
    $('#date_of_separation').datetimepicker({
        format: "YYYY-MM-DD"
    });

    $(function () {
        bsCustomFileInput.init();
    });


}

</script>