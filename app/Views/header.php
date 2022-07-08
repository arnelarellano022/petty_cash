<nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('dashboard');?>">SCMC-CRM System</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul id="w1" class="navbar-nav navbar-right nav">

                <li class="active">
                    <a href="<?php echo base_url('dashboard');?>">Home</a>
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
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <?= $rs->title;?><b class="caret"></b>
                                </a>
                                <ul id="w2" class="dropdown-menu">
                                    <?php
                                    if($sub_menu){
                                        foreach ($sub_menu as $rs_sub) {
                                            if($rs_sub->main_menu_id==$rs->id && isset($arr_index_user_roles_sub_menu[$rs_sub->id]) && $arr_index_user_roles_sub_menu[$rs_sub->id]){
                                                ?>
                                                <li><a href="<?=  base_url($rs_sub->url_link);?>" tabindex="-1"><?= $rs_sub->title;?></a></li>
                                            <?php }}}?>
                                </ul>
                            </li>
                        <?php }}}?>

                <li>
                    <form action="<?=  base_url('logout');?>" method="post">
                        <input type="hidden" name="_csrf" value="R3NlR1lxdVIeCgcmGy4EHzRAJnR0NgQ4E0QBF2A9Qg0uBC0kESAnCw==">
                        <button type="submit" class="btn btn-link logout">Logout(<?= $_SESSION['username'];?>)</button>
                    </form>
                </li>


            </ul>
        </div>
    </div>
</nav>