<?php if (!isset($_SESSION['user_role'])) {redirect('index', 'refresh');} ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Mk9DS0pLQi5rNiEqCBQzY0F8AHhnDDNEZngnG3MHdXFbOAsoAhoQdw==">
    <title>Error 404</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLTE/dist/css/adminlte.min.css')?>">

<body>

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: 150px">

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="<?php echo base_url('dashboard');?>">return to dashboard</a> or try using the search form.
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->

<!-- /.content-wrapper -->

</body>
</html>
