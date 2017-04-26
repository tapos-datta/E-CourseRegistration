/**
 * Created by Tapos on 2/21/2017.
 */

$(document).ready(function() {
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
    var $datatable1 =$('#datatable-checkbox1') ;
    var $datatable2 =$('#datatable-checkbox2') ;
    var $datatable3 =$('#datatable-checkbox3') ;
    var $datatable4 =$('#datatable-checkbox4') ;
    var $datatable5 =$('#datatable-checkbox5') ;
    var $datatable6 =$('#datatable-checkbox6') ;
    var $datatable7 =$('#datatable-checkbox7') ;
    var $datatable11 =$('#datatable-checkbox11') ;
    var $datatable12 =$('#datatable-checkbox12') ;
    var $datatable13 =$('#datatable-checkbox13') ;
    var $datatable14 =$('#datatable-checkbox14') ;
    var $datatable15 =$('#datatable-checkbox15') ;
    var $datatable16 =$('#datatable-checkbox16') ;
    var $datatable17 =$('#datatable-checkbox17') ;



    $datatable.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable1.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable1.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable2.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable3.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable3.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable3.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable4.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable4.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable5.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable5.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable6.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable6.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable7.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable7.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable11.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable11.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable12.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable12.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable13.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable13.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable14.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable14.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable15.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable15.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable16.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable16.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    $datatable17.dataTable({
        'order': [[ 1, 'asc' ]],
        'columnDefs': [
            { orderable: false, targets: [0,2,3,4,5] }
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false
    });
    $datatable17.on('draw.dt', function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    TableManageButtons.init();
});

function confirmChange() {

    var answer = confirm("Would you like to Remove ?");

    if (answer == true) {
        //do something
        return false;

    } else {
        //do something
        return false;
    }
}



