<div id="notif_fade" class="col-md-12">
    <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
    <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
    <!--                --><?php //echo validation_errors('<div class="alert alert-danger">','</div>');?>
</div>