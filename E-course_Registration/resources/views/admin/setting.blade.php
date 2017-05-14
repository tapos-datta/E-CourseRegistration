<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/16/2016
 * Time: 4:46 PM
 */
$image_path= URL::to('images/default_image.png');
    $departmentCodeLists=session()->get('departmentCodeList');
    $courseLists=session()->get('courseLists');
    $curriculumYearList=session()->get('curriculumYearList');
    $checkStatus=0;
    $offeredList=Session::get('offeredExamList');

  if(session()->get('SetSettings')!=null){
       $checkStatus=session()->get('SetSettings');
  }
  else{
      $checkStatus=0;
  }
  $role=Session::get('role');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@if($role!='student')Settings @else Academics @endif</title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{URL::to('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!--Datatables -->
    <link href="{{URL::to('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{URL::to('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <style>
        #select{
            width:25%;
            height:35%;
            -webkit-border-radius:4px;
            -moz-border-radius:4px;
            border-radius:4px;

            display: inline-block;

            appearance:none;
            cursor:pointer;
        }
        #addButton {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
        table.jambo_table thead{
            background-color: #1b809e;
        }
        .textSize{
            font-size: 16px;

        }

        .deadline{
            color: orangered;
        }
        .edit{
            margin-left: 60%;
        }

    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">

                </div>

                <div class="clearfix"></div>


                <!-- /menu profile quick info -->


                <!-- sidebar menu -->
                @include('admin.sidebar')
            </div>
        </div>

        <!-- top navigation -->
       @include('admin.topNavigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">

                        @if($checkStatus!=0 && $checkStatus!=-1)
                            <h5> Successfully updated </h5>
                        @elseif($checkStatus==-1)
                            <h5> Not Successfully updated </h5>
                             <?php $checkStatus=0;?>
                        @endif
                        <h3>@if($role!='student')Settings @else Academics @endif</h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">

                                <div class="col-md-12 col-sm-12 col-xs-12">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="@if($checkStatus==0 || $checkStatus==1 || $checkStatus==2){{'active'}} <?php $checkStatus=0;?> @endif w3-custom-blue"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Curriculum</a>
                                            </li>
                                            @if($role=='head' || $role=='admin')
                                            <li role="presentation" class="@if($checkStatus==3){{'active'}}@endif w3-custom-blue"><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Offered Courses</a>
                                            </li>
                                            @endif
                                            @if($role=='admin')
                                            <li role="presentation" class="@if($checkStatus==5){{'active'}}@endif w3-custom-blue"><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Department</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content6" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Course</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==7){{'active'}}@endif w3-custom-blue"><a href="#tab_content7" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Batch Info</a>
                                            </li>
                                            @endif
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade  @if($checkStatus==0 || $checkStatus==1){{'active in'}}@endif" id="tab_content1" aria-labelledby="home-tab">

                                                <!-- start view syllabus -->
                                                <div class="x_title">
                                                    <h2>Lists of Curriculum <small></small></h2>
                                                    @if($role=='admin')
                                                    <div align="right">
                                                        <a href="{{route('add.new.curriculum')}}" id="addButton">+ New Curriculum </a>

                                                    </div>
                                                    @endif

                                                    <div class="clearfix"></div>
                                                </div>
                                                <table class="data table jambo_table table-striped no-margin">
                                                    <tbody>
                                                    @foreach($curriculumYearList as $curriculum)
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="{!! route('show.curriculum', array('year'=> $curriculum->SYLLABUS_YEAR)) !!}">Curriculum Year of {{$curriculum->SYLLABUS_YEAR}}</a></td>
                                                        <td></td>
                                                        @if($role!='student')
                                                        <td>
                                                            <ul class="edit">
                                                                <a href="{{route('edit.curriculum',array('year'=>$curriculum->SYLLABUS_YEAR))}}">
                                                                    <li class="fa fa-edit"></li>
                                                                </a>
                                                            </ul>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>

                                            <!-- end view sylabus -->

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==4){{'active in'}}@endif" id="tab_content4" aria-labelledby="profile-tab">
                                                <!-- add Offered Schedule -->

                                                <div class="row">

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h3>List Of Exam Period</h3>
                                                                <div align="right">

                                                                    <a href="{{route('create.new.schedule')}}" id="addButton">+ New Schedule </a>
                                                                </div>

                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="x_content">
                                                                <br />
                                                                <table class="data table jambo_table table-striped no-margin">
                                                                    <tbody>
                                                                    @foreach($offeredList as $offered)
                                                                        <tr>

                                                                            <td ><a class="textSize" href="{{route('exam.session_data',array('session_month'=>$offered->SESSION_MONTH,'year'=>$offered->EXAM_YEAR))}}">Exam Period ({{$offered->SESSION_MONTH}}) Of {{$offered->EXAM_YEAR}}</a></td>
                                                                            <td align="right">Deadline:<span class="deadline"> {{date('d-m-Y',strtotime($offered->DEAD_LINE))}}</span></td>
                                                                            {{--{!! Form::open(array('route'=>'delete.exam.schedule','method'=>'post', 'class' => 'form-horizontal')) !!}--}}
                                                                            {{--<input type="hidden" name="examYear" value="{{$offered->EXAM_YEAR}}">--}}
                                                                            {{--<input type="hidden" name="session_month" value="{{$offered->SESSION_MONTH}}">--}}
                                                                            {{--<input type="hidden" name="examId" value="{{$offered->EXAM_ID}}">--}}

                                                                            {{--<td align="right"><button disabled type="submit" class="btn btn-primary" id="deleteButton"  name="submit" --}}{{--onclick="return confirmChange();"--}}{{--> Deadline: {{$offered->DEAD_LINE}}</button></td>--}}
                                                                            {{--{!! Form::close()!!}--}}

                                                                            <td>
                                                                                <ul>
                                                                                    <a href="{{route('edit.exam.session_data',array('dept'=>$offered->DEPT_CODE,'session_month'=>$offered->SESSION_MONTH,'year'=>$offered->EXAM_YEAR))}}">
                                                                                        <li class="fa fa-edit"></li>
                                                                                    </a>
                                                                                </ul>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==5){{'active in'}}@endif" id="tab_content5" aria-labelledby="profile-tab">
                                               <!-- add department name -->



                                                <div class="row">

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                {{--<h3><a ">List Of Departments</a></h3>--}}

                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="x_content">
                                                                <br />
                                                                <table class="data table jambo_table table-striped no-margin">
                                                                    <tbody>

                                                                        <tr>

                                                                            <td align="center"><a href="{{route('show.departments')}}"><h3>View Department</h3></a></td>
                                                                        <tr>
                                                                            <td align="center"><a href="{{route('add.department')}}"><h3>Add Department</h3></a></td>
                                                                        </tr>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content6" aria-labelledby="profile-tab">
                                                <!-- add course to database-->
                                                <div class="row">

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                {{--<h3><a ">List Of Departments</a></h3>--}}

                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="x_content">
                                                                <br />
                                                                <table class="data table jambo_table table-striped no-margin">
                                                                    <tbody>

                                                                    <tr>

                                                                        <td align="center"><a href="{{route('show.courses')}}"><h3>View Courses</h3></a></td>
                                                                    <tr>
                                                                        <td align="center"><a href="{{route('add.course')}}"><h3>Add Course</h3></a></td>
                                                                    </tr>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of adding course !-->
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==7){{'active in'}}@endif " id="tab_content7" aria-labelledby="profile-tab">
                                                <!-- add batch info to database-->
                                                <div class="row">

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                {{--<h3><a ">List Of Departments</a></h3>--}}

                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="x_content">
                                                                <br />
                                                                <table class="data table jambo_table table-striped no-margin">
                                                                    <tbody>

                                                                    <tr>

                                                                        <td align="center"><a href="{{route('show.batches')}}"><h3>View Batch List</h3></a></td>
                                                                    <tr>
                                                                        <td align="center"><a href="{{route('add.batch')}}"><h3>Add New Batch</h3></a></td>
                                                                    </tr>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of adding course !-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to save changes you made to document before closing?</p>
                        <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                {{--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>--}}
            </div>
            {{--<div class="clearfix"></div>--}}
        </footer>
        <!-- /footer content -->
    </div>
</div>



<!-- jQuery -->
<script src="{{URL::to('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{URL::to('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::to('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{URL::to('vendors/nprogress/nprogress.js')}}"></script>
<!-- iCheck -->

<script src="{{URL::to('vendors/iCheck/icheck.min.js')}}"></script>
<!--Datatable --!>
<script src="{{URL::to('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{URL::to('vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>


<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>
<!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>



<!-- Datatables -->
<script>
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

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
    $(document).ready( function () {
        var deleteText = "<div id='myModal' class='modal fade'><div class='modal-dialog'> <div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> <h4 class='modal-title'>Confirmation</h4> </div> <div class='modal-body'> <p>Do you want to save changes you made to document before closing?</p> <p class='text-warning'><small>If you don't save, your changes will be lost.</small></p> </div> <div class='modal-footer'> <button type= 'button' class='btn btn-default' data-dismiss='modal'>Close</button> <button type='button' class='btn btn-primary'>Save changes</button> </div> </div> </div> </div>";
        var saveText = "<p>Do you want to save **?</p>";

        $("#deleteButton").click( function () {
            $("#modalHeader").html(deleteText);
            $("#modal").modal("show");
        });

        $("#saveButton").click( function () {
            $("#modalHeader").html(saveText);
            $("#modal").modal("show");
        });
    });

    function confirmChange() {

        var answer = confirm("Would you like to Remove ?");

        if (answer == true) {
            //do something
            return true;

        } else {
            //do something
            return false;
        }
    }



</script>
<!-- /Datatables -->
</body>
</html>





<?php
    session()->forget('SetSettings');
?>

