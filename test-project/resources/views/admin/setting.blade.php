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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Settings</title>

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

    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">

                </div>

                <div class="clearfix"></div>


                <!-- /menu profile quick info -->

                <br />

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
                        <h3>Settings</h3>
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
                                            <li role="presentation" class="@if($checkStatus==0 || $checkStatus==1){{'active'}} <?php $checkStatus=0;?> @endif w3-light-green"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Curriculum</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==2){{'active'}}@endif  w3-light-green"><a href="#tab_content2" role="tab" id="profile-tab"  data-toggle="tab" aria-expanded="false">Add syllabus</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==3){{'active'}}@endif w3-light-green"><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Offered Courses</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==5){{'active'}}@endif w3-light-green"><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Department</a>
                                            </li>

                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-light-green"><a href="#tab_content6" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Course</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade  @if($checkStatus==0 || $checkStatus==1){{'active in'}}@endif" id="tab_content1" aria-labelledby="home-tab">

                                                <!-- start view syllabus -->
                                                <div class="x_title">
                                                    <h2>Lists of Curriculum <small></small></h2>

                                                    <div class="clearfix"></div>
                                                </div>
                                                <table class="data table jambo_table table-striped no-margin">
                                                    <tbody>
                                                    @foreach($curriculumYearList as $curriculum)
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="{!! route('show.curriculum', array('year'=> $curriculum->SYLLABUS_YEAR )) !!}">Curriculum Year of {{$curriculum->SYLLABUS_YEAR}}</a></td>
                                                    </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>

                                            <!-- end view sylabus -->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==2){{'active in'}}@endif" id="tab_content2" aria-labelledby="profile-tab">

                                                <!--Add syllabus-->
                                                <div class="row">
                                                    {!!  Form::open(array('url'=>'/add_curriculum','method'=>'post', 'class' => 'form-horizontal ')) !!}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>New Curriculum<small>Add to Database</small></h2>


                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <br />


                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Curriculum Year <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select name="curriculumYear" class="form-control col-md-7 col-xs-12">
                                                                            @for($k=2012;$k<=2099;$k++)
                                                                            <option value="{{$k}}">{{$k}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Maximum credit limit on registration <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select name="maxCredit" class="form-control col-md-7 col-xs-12">
                                                                            @for($k=10;$k<=50;$k++)
                                                                                <option value="{{$k}}">{{$k}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Minimum credit limit on registration  <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select name="minCredit" class="form-control col-md-7 col-xs-12">
                                                                            @for($k=10;$k<=50;$k++)
                                                                                <option value="{{$k}}">{{$k}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br >
  {{--                                                              <div class="form-group">
                                                                    <label style="text-align: left" class="control-label col-md-12 col-sm-12 col-xs-12">Select Courses To Add New Curriculum :
                                                                    </label>
                                                                    <div class="clearfix"></div>
                                                                    <div class="x_content">

                                                                            <table  id='datatable-checkbox' class="table table-striped jambo_table table-bordered">
                                                                                <thead>
                                                                                <tr class="headings">
                                                                                    <th class="column-title"># Select</th>
                                                                                    <th class="column-title">Course Code</th>
                                                                                    <th class="column-title">Course Name</th>
                                                                                    <th class="column-title">Course Credit</th>
                                                                                    <th class="column-title">Course Level</th>
                                                                                    <th class="column-title">Semester Name</th>
                                                                                    <th class="column-title">Department Name </th>

                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                @foreach($courseLists as $courses)
                                                                                <tr class="odd pointer">
                                                                                    <td class="a-center">
                                                                                        <input type="checkbox" checked class="flat" name="check_list[]" value="{{$courses->COURSE_ID}}">
                                                                                    </td>
                                                                                    <td class=" ">{{$courses->COURSE_CODE}}</td>
                                                                                    <td class=" ">{{$courses->COURSE_NAME}}</td>
                                                                                    <td class=" ">{{$courses->COURSE_CREDIT}}</td>
                                                                                    <td class=" ">{{$courses->COURSE_LEVEL}}</td>
                                                                                    <td class=" ">{{$courses->SEMESTER_NAME}}</td>
                                                                                    <td class="a-right a-right ">{{$courses->DEPT_CODE}}</td>
                                                                                </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>

                                                                    </div>

                                                                </div>--}}
                                                                <div class="ln_solid"></div>
                                                                <div class="form-group">
                                                                    <div align="right" class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10 col-sm-offset-10">

                                                                        {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                                                        {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                                                    </div>
                                                                </div>

                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- End Add syllabus -->


                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==4){{'active in'}}@endif" id="tab_content4" aria-labelledby="profile-tab">
                                                <!-- add department name -->



                                                <div class="row">

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h3>List Of Exam Session</h3>
                                                                <div align="right">
                                                                    <a href="{{route('add.offered_course')}}" id="addButton">+ New List </a>
                                                                </div>

                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="x_content">
                                                                <br />
                                                                <table class="data table jambo_table table-striped no-margin">
                                                                    <tbody>
                                                                    @foreach($offeredList as $offered)
                                                                    <tr>

                                                                        <td ><a class="textSize" href="{{route('exam.session_data',array('session_month'=>$offered->SESSION_MONTH,'year'=>$offered->EXAM_YEAR))}}">Exam Session ({{$offered->SESSION_MONTH}}) Of {{$offered->EXAM_YEAR}}</a></td>

                                                                        <td align="right"><button type="submit" class="btn btn-danger" name="submit"> Delete</button></td>
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

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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



</script>
<!-- /Datatables -->
</body>
</html>





<?php
    session()->forget('SetSettings');
?>

