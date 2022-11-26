/**
 * JS CODE ENTER HERE
 */

$(document).ready(function(){


//   ------------ DATATABLE -------------
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
//   ------------ END DATATABLE -------------

//   ------------ MENU AS IS -------------
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
//   ------------ END MENU AS IS -------------


    //   ------------ MESSAGE NOTIF -------------

    $( document ).ready(function() {$("#notif_fade").fadeOut(12000);});

//   ------------ END MESSAGE NOTIF -------------




});