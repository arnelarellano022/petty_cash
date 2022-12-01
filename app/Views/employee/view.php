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



