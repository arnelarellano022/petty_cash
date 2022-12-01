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
                                <form action="<?= base_url("edit_sub_module/". $row->sub_module_id); ?>" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Sub Module Name</label>
                                                    <input class="form-control" type="text" name="sub_module_name" value="<?= $row->sub_module_name;?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input class="form-control" type="text" name="link" value="<?= $row->link;?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Operation</label>
                                                    <input class="form-control" type="text" name="operation" value="<?= $row->operation;?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sort Order</label>
                                                    <input class="form-control" type="number" name="sort_order" value="<?= $row->sort_order;?>" required="">
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

