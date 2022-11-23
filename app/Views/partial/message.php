<div id="notif_fade" class="col-md-12">

    <?php if(isset($_SESSION["error"])){echo '
    <div class="alert alert-danger alert-dismissable"> 
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    '.$_SESSION["error"].'</div>';}?>

    <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    '.$_SESSION["success"].'</div>';}?>

</div>