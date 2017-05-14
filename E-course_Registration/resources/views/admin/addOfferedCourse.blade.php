<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/7/2017
 * Time: 1:57 AM
 */

$curriculumYearList=Session::get('curriculumYearList');

$userInfo = Session::get('userInformation');
$deptCode=$userInfo->DEPT_CODE;
$nameOfdept = Session::get('nameOfDepartment');
$studentSession=Session::get('studentSession');
$offeredData=Session::get('offeredDataForExam');
$year=Session::get('offeredExamYear');
$session=Session::get('offeredSessionMonth');
$sessionMonth=Session::get('offeredSessoinMonth');

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add exam session</title>

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


                <!-- sidebar menu -->
            @include('admin.sidebar')
            <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
    @include('admin.topNavigation')
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{route('user_settings')}}">Settings</a></li>
                                <li><a href="{{route('exam.session_data',array('session_month'=>$sessionMonth,'year'=>$year))}}">Offered list of {{$nameOfdept->DEPT_NAME_SHORT}}({{$year}})</a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    {!!  Form::open(array('url'=>'/exam_session_add','method'=>'post', 'class' => 'form-horizontal ')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add <small>A Semester to offered list</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <input type="hidden" name="sessionMonth" value="{{$sessionMonth}}">
                                <input type="hidden" name="examYear" value="{{$year}}">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Department Code</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" readonly name="departmentCode" value="{{$deptCode}}" class="form-control col-md-7 col-xs-12">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Session<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="studentSession" class="form-control col-md-7 col-xs-12">
                                            @foreach($studentSession as $session_)
                                                <option value="{{$session_->ADMIT_SESSION}}">{{$session_->ADMIT_SESSION}}-{{$session_->ADMIT_SESSION+1}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Curriculum Year<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="curriculumYear" class="form-control col-md-7 col-xs-12">
                                            @foreach($curriculumYearList as $CyearList)
                                                <option value="{{$CyearList->SYLLABUS_YEAR }}">{{$CyearList->SYLLABUS_YEAR}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Semester<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="semesterName" class="form-control col-md-7 col-xs-12">
                                            <option value="1">1st Year / 1st Semester</option>
                                            <option value="2">1st Year / 2nd Semester</option>
                                            <option value="3">2nd Year / 1st Semester</option>
                                            <option value="4">2nd Year / 2nd Semester</option>
                                            <option value="5">3rd Year / 1st Semester</option>
                                            <option value="6">3rd Year / 2nd Semester</option>
                                            <option value="7">4th Year / 1st Semester</option>
                                            <option value="8">4th Year / 2nd Semester</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                        {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                        {{ Form::submit('Submit',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                    </div>
                                </div>

                                {!! Form::close() !!}
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

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>

</body>
</html>


