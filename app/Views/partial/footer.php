<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Powered by</b> <a href="https://codeigniter.com//" rel="external"><B>CodeIgniter</B></a>
    </div>
    <strong>Copyright © 2022 <a href="https://www.columbiafood.com.ph/">COLUMBIA INTERNATIONAL FOOD PRODUCTS, INC.</a></strong> All rights reserved.


</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?=base_url('assets/adminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/jquery-ui/jquery-ui.min.js')?><!--"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!--<script>-->
<!--    $.widget.bridge('uibutton', $.ui.button)-->
<!--</script>-->
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/chart.js/Chart.min.js')?><!--"></script>-->
<!-- Sparkline -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/sparklines/sparkline.js')?><!--"></script>-->
<!-- JQVMap -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/jqvmap/jquery.vmap.min.js')?><!--"></script>-->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')?><!--"></script>-->
<!-- jQuery Knob Chart -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/jquery-knob/jquery.knob.min.js')?><!--"></script>-->
<!-- daterangepicker -->
<script src="<?=base_url('assets/adminLTE/plugins/moment/moment.min.js')?>"></script>
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/daterangepicker/daterangepicker.js')?><!--"></script>-->
<!-- Tempusdominus Bootstrap 4 -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?><!--"></script>-->
<!-- Summernote -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/summernote/summernote-bs4.min.js')?><!--"></script>-->
<!-- overlayScrollbars -->
<!--<script src="--><?//=base_url('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?><!--"></script>-->

<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=base_url('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>

<!-- AdminLTE App -->
<!--<script src="--><?//=base_url('assets/adminLTE/dist/js/adminlte.js')?><!--"></script>-->
<script src="<?=base_url('assets/adminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/adminLTE/dist/js/demo3.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?//=base_url('assets/adminLTE/dist/js/pages/dashboard.js')?><!--"></script>-->

<script>
    $(function () {
        $("#example").DataTable({});

        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    });
</script>

<script>
    $(function () {
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    });
</script>

<!--message js-->
<script type="text/javascript">$( document ).ready(function() {$("#notif_fade").fadeOut(5000);});</script>

</body>
</html>