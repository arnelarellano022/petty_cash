<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-edit mt-2"></i>
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
                                <form action="<?= base_url("edit_roles/". $row->id); ?>" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Roles</label>
                                                    <input class="form-control" type="text" name="roles" value="<?= $row->roles;?>" required="">
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

