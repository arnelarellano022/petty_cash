<?php if (!isset($_SESSION['user_role'])) {
    redirect('index', 'refresh');
} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Mk9DS0pLQi5rNiEqCBQzY0F8AHhnDDNEZngnG3MHdXFbOAsoAhoQdw==">
    <title>Error 403</title>
    <link href="<?php echo base_url();?>assets/home/attendance/form/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/home/attendance/form/css/site.css" rel="stylesheet"></head>
<link href="<?php echo base_url();?>assets/home/employee/form/css/kv-grid.css" rel="stylesheet">

<body>

<div class="wrap">
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>dashboard">SCMC HRIS v1.0</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">

                    <li class="active">
                        <a href="<?php echo base_url();?>dashboard">Home</a>
                    </li>
                    <?php
                    if($index_user_roles){
                        foreach ($index_user_roles as $rs) {
                            $arr_index_user_roles_main_menu[$rs->main_menu_id] = 1;
                            $arr_index_user_roles_sub_menu[$rs->sub_menu_id] = 1;
                        }
                    }
                    if($main_menu){
                        foreach ($main_menu as $rs) {
                            if(isset($arr_index_user_roles_main_menu[$rs->id]) && $arr_index_user_roles_main_menu[$rs->id]) {
                                ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <?php echo $rs->title;?><b class="caret"></b>
                                    </a>
                                    <ul id="w2" class="dropdown-menu">
                                        <?php
                                        if($sub_menu){
                                            foreach ($sub_menu as $rs_sub) {
                                                if($rs_sub->main_menu_id==$rs->id && isset($arr_index_user_roles_sub_menu[$rs_sub->id]) && $arr_index_user_roles_sub_menu[$rs_sub->id]){
                                                    ?>
                                                    <li><a href="<?php echo base_url().$rs_sub->url_link;?>" tabindex="-1"><?php echo $rs_sub->title;?></a></li>
                                                <?php }}}?>
                                    </ul>
                                </li>
                            <?php }}}?>
                    <li>
                        <form action="<?php echo base_url();?>logout" method="post">
                            <input type="hidden" name="_csrf" value="R3NlR1lxdVIeCgcmGy4EHzRAJnR0NgQ4E0QBF2A9Qg0uBC0kESAnCw==">
                            <button type="submit" class="btn btn-link logout">Logout(<?php echo $this->session->username;?>)</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <ul class="breadcrumb"><li><a href="<?php echo base_url();?>dashboard">Home</a></li></ul>

        <div id="container">
            <h1>Forbidden(403)</h1>
            <p>You don't have permission to access this site.</p>
            <p>Please contact the administrator if you think this is a server error.</p>
        </div>

    </div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Columbia International Food Products, Inc. 2019<br>

            Created By: IT Department</p>

        <p class="pull-right">Powered by <a href="https://codeigniter.com//" rel="external">CodeIgniter</a></p>
    </div>
</footer>
</body>
</html>
