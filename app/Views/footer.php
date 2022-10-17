

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Columbia International Food Products, Inc. 2022<br>

            </p>

        <p class="pull-right">Powered by <a href="https://codeigniter.com//" rel="external">CodeIgniter</a></p>
    </div>
</footer>


<script src="<?=  base_url('assets/home/attendance/form/js/jquery.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/yii.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/yii.gridView.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/jquery.pjax.js');?>"></script>
<script src="<?=  base_url('assets/home/attendance/form/js/bootstrap.js');?>"></script>

<!-- Datatables -->
<script src="<?=  base_url('assets/home/datatables/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
<script src="<?=  base_url('assets/home/datatables/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>

<!--//Search-->
<script>

    init_DataTables();

    $('.dataTable').each ( function () { $(this).dataTable().fnDraw(); });

    /* DATA TABLES */

    function init_DataTables() {

        console.log('run_datatables');

        if( typeof ($.fn.DataTable) === 'undefined'){ return; }
        console.log('init_DataTables');

        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('checkbox input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();

    };


</script>

<script type="text/javascript">
    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });
</script>