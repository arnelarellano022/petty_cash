


<!--NEW-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="<?php echo base_url('dashboard');?>" class="brand-link">

        <img src="<?=base_url('assets/adminLTE/dist/img/columbia.jpg')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-light">SCMC-MS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php

                $image_data = get_user_image($_SESSION['user_id']);
                //if no image
                if($image_data == null){
                    $image_data = "no_image.png";
                } ?>
                <img src="<?= base_url("uploads/".$image_data) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo base_url('dashboard');?>" class="d-block"><?= $_SESSION['firstname'] . " " . $_SESSION['lastname'];?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('dashboard');?>" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="./index2.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Dashboard v2</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a href="./index3.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Dashboard v3</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </li>

                <?php
                $menu = get_sidebar_menu(); //get all module list
                foreach ($menu as $nav):
                    $has_menu = check_module_permission($_SESSION['user_role'],$nav->module_id); // count module access if has menu
                    $sub_menu = get_sidebar_sub_menu($nav->module_id); //get all sub menu list
                    $has_submenu = check_sub_module_permission($_SESSION['user_role'],$nav->module_id); // count sub module access if has menu
                    ?>

                <?php if($has_menu): ?>
                <li class="nav-item">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa <?= $nav->fa_icon ?> "></i>
                            <p>
                                <?= $nav->module_name ?>
                                <?= ($has_submenu) ? '<i class="right fa fa-angle-left"></i>' : '' ?>
                            </p>
                        </a>
                        <!-- sub-menu -->
                            <?php foreach($sub_menu as $sub_nav):
                                $has_sub_menu_permission  = get_sub_module_permission($_SESSION['user_role'],$nav->module_id, $sub_nav->sub_module_id); // get sub module access if has menu
                                if($has_sub_menu_permission):?>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url(''.$sub_nav->link); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?= $sub_nav->sub_module_name ?></p>
                                            </a>
                                        </li>
                                    </ul>

                            <?php   endif; endforeach;  ?>
                        <!-- /sub-menu -->
                    </li>
                <?php endif; endforeach;  ?>

                <li class="nav-item">
                    <a href="<?=  base_url('logout');?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
