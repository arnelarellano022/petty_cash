<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="ajB0eFNsRlFaYy4oIRogCQNnAigpLgQTWkMeFx8ZJQJcRE0gATY1FA==">
    <title>Add Photo</title>
    <link href="<?php echo base_url();?>assets/home/store/form/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/form/css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/store/create/css/fileinput.css" rel="stylesheet">
</head>

<body>

<div class="wrap">
    <?php $this->load->view('header'); ?>

    <?php foreach ($fetch_data as $row) {?>
    <div class="container">
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url();?>store_index">Store List</a></li>
            <li><a href="<?php echo base_url();?>store_view/<?php echo $row->outlet_id ?>"><?php echo $row->acct_name ?></a></li>
            <li class="active">Add Photo</li>
        </ul>
        <div id="notif_fade" class="col-md-12">
            <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
            <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
            <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
        </div>
        <div class="pull-right" style="margin-bottom: 10px">
<!--            <a class="btn btn-success" href="--><?php //echo base_url();?><!--store_update/--><?php //echo $row->outlet_id; ?><!--">Add Photo</a>-->
        </div>
        <div >
            <div class="employee-view">
                <div class ="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="panel panel-info row">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#photos" class="glyphicon glyphicon-picture "><b style="font-family: Arial; margin-left: 10px">Photos</b></a></li>
                                </ul>

                                <form class="form-horizontal" action="<?php echo base_url();?>insert_add_photo/<?php echo $row->acct_name;?>" method="post" enctype="multipart/form-data" data-toggle="validator" >

                                <div class="tab-content " style="margin-left: 5px; margin-right: 5px">

                                    <input type="hidden" value="<?php echo $row->acct_name;?>" name="$acct_name">

                                    <!--Tab Store Images-->
                                    <div id="photos" class="tab-pane fade in active ">

                                        <fieldset>
                                            <legend class = "text-info">Add Photos </legend>
                                            <div class=" col-sm-12">
                                                <div  class=" col-sm-4" >
                                                    <label class="control-label" >Date and Time Taken:</label>
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='text' class="form-control"  name="dtp_best"/>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class=" required">
                                                        <label class="control-label" >Taken By:</label>
                                                        <input type="text" class="form-control" name="taken_best" placeholder="Enter Taken By">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class=" required">
                                                        <label class="control-label" >Rating:</label>
                                                        <input type="text" class="form-control" name="rating_best" placeholder="Enter Rating">
                                                    </div>
                                                </div>


                                                <div class=" col-sm-12">
                                                    <label class="control-label" for="best-image1">Select Image</label>
                                                    <input type="file" id="best-image1" class="file-loading" name="best_photos[]" accept="image/*"   multiple="multiple"   >
                                                    <div class="help-block"></div>
                                                </div>

                                        </fieldset>

                                    </div>

                                    <div class="pull-right" style="margin-right: 30px; margin-bottom: 20px; margin-top: 20px">

                                        <button onclick="hitButton()" id="submit_but" type="submit" value="upload" class="btn btn-success">ADD PHOTOS</button>
                                    </div>
                                    </form>
                                </div>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url();?>assets/datetimepicker/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/home/store/create/js/popper.min"></script>
<script src="<?php echo base_url();?>assets/home/store/create/js/fileinput.js"></script>

<!--<script src="--><?php //echo base_url(); ?><!--assets/home/store/view/js/kv-widgets.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--assets/home/store/view/js/yii.js"></script>-->

<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();
            var y = $(event.relatedTarget).text();
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
</script>



<script type="text/javascript">
    var kvDatepicker_929f86bc = {"format":"yyyy-mm-dd"};
    var fileinput_occup_01 = {"allowedFileExtensions":["jpg","png"],"showUpload":false,"maxFileSize":100000,"language":"en","purifyHtml":true};
</script>

<script type="text/javascript">

    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({"format":"Y-MM-DD HH:mm:ss"});
    });
</script>

<script>
    function hitButton() {
        $('form').submit(function (e) {
            var $fileUpload = $("input[id='best-image1']");
            if (parseInt($fileUpload.get(0).files.length)>10){
                alert("You can only upload a maximum of 10 files");
                e.preventDefault();
            }
        });
    }
</script>

<script type="text/javascript">jQuery(document).ready(function ()
    {
        if (jQuery('#profile-image').data('fileinput')) { jQuery('#profile-image').fileinput('destroy'); }
        jQuery('#profile-image').fileinput(fileinput_occup_01);

        if (jQuery('#best-image1').data('fileinput')) { jQuery('#best-image1').fileinput('destroy'); }
        jQuery('#best-image1').fileinput(fileinput_occup_01);
    });

</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({"format":"Y-MM-DD HH:mm:ss"});
    });
</script>

</body>
</html>
