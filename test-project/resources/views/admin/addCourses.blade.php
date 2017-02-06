<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/2/2017
 * Time: 4:48 PM
 */
$year=Session::get('showCurriculumYear');
$departmentList=Session::get('departmentList');
$viewSemester=Session::get('viewSemester');
$deptCode=Session::get('viewDeptCode');
$courseListInSemester=Session::get('courseListOfSemester');

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home </title>

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
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ URL::to('CSS/Breadcrumb.css') }}">

    <style>
        table.jambo_table thead{
            background-color: #1b809e;
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
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <br>
                        <br>

                        <ul class="nav side-menu">
                            <li><a href="{{route('user_home')}}"><i class="fa fa-home"></i> Home </a>

                            </li>
                            <li><a href="{{route('user_profile')}}"> <i class="fa fa-user"></i> Profile </a>

                            </li>
                            <li><a><i class="fa fa-inbox"></i> Notification </a>

                            </li>
                            <li><a href="{{route('user_settings')}}"><i class="fa fa-wrench"></i> Setting </a>

                            </li>
                            <li><a href="{{route('user_logout')}}"><i class="fa fa-sign-out"></i> Log Out </a>

                            </li>


                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>

                                <li><a href="{{route('user_logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{route('user_settings')}}">Curriculum({{$year}})</a></li>
                                <li><a href="{!! route('show.curriculum', array('year'=> $year)) !!}"> Department({{$deptCode}})</a></li>
                                <li><a href="{!! route('show.curriculum.dept',array('year'=>$year,'code' => $deptCode)) !!}">
                                        Semester(@if($viewSemester==1){{1}}@else{{round($viewSemester/2)}}@endif/@if($viewSemester%2==0){{2}})@else{{1}})
                                        @endif </a></li>

                                <li><a></a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Courses<small>In {{$viewSemester}} Semester of Curriculum {{$year}}</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            {!! Form::open(array('url'=>'\add_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}
                            <input type="hidden" name="curriculumYear" value="{{$year}}" />
                            <input type="hidden" name="departmentCode" value="{{$deptCode}}" />
                            <input type="hidden" name="semesterNo" value="{{$viewSemester}}" />
                            <div class="x_content">
                                <div class="form-group">
                                    <label style="text-align: left" class="control-label col-md-12 col-sm-12 col-xs-12">Select Courses :
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
                                                <th class="column-title">Department Code </th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($courseListInSemester as $courses)
                                                <tr class="odd pointer">
                                                    <td class="a-center">
                                                        <input type="checkbox" class="flat" name="check_list[]" value="{{$courses->COURSE_ID}}">
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

                                    <div class="form-group">
                                        <div align="right" class="col-md-2 col-sm-2 col-xs-12 col-md-offset-10 col-sm-offset-10">
                                            <br>

                                            {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                        </div>
                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>{{--
          <div class="pull-right">
Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>--}}
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
