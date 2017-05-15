<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/6/2017
 * Time: 9:49 PM
 */
$departmentCodeLists=session()->get('departmentCodeList');
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Course Info</title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{URL::to('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
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
        .alignment{
            text-align: center;
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
            <!-- /sidebar menu -->


            </div>
        </div>

        <!-- top navigation -->
    @include('admin.topNavigation')
    <!-- /top navigation -->

        <!-- page content -->



        <!-- tasdfhskj -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{route('user_settings')}}">Settings</a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    {!!  Form::open(array('route'=>'_add_course','method'=>'post', 'class' => 'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Course <small>Add to Database</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <div class="col-md-offset-3 col-md-4">

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12">Offered Department</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="offeredDepartmentCode" class="form-control col-md-6 col-xs-12">
                                            @foreach($departmentCodeLists as $code)
                                                <option value="{{  $code->DEPT_CODE }}">{{$code->DEPT_NAME_SHORT."-".$code->DEPT_CODE}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12">Accepted Department Code</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="departmentCode" class="form-control col-md-7 col-xs-12">
                                            @foreach($departmentCodeLists as $code)
                                                <option value="{{  $code->DEPT_CODE }}">{{$code->DEPT_NAME_SHORT."-".$code->DEPT_CODE}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Course Code <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{ Form::text('courseCode','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                        {{--<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Course Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{--{{ Form::text('courseName','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                        <input type="text" name="courseName" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Course Credit <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="courseCredit" class="form-control col-md-7 col-xs-12">
                                            @for($k=0.5;$k<=4.0;$k=$k+0.5)
                                                <option value="{{ $k }}">{{$k}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Course Level <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="courseLevel" class="form-control col-md-7 col-xs-12">
                                            @for($k=1;$k<=4;$k++)
                                                <option value="{{ $k }}">{{$k}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="last-name">Semester Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="semesterName" class="form-control col-md-7 col-xs-12">
                                            @for($k=1;$k<=8;$k++)
                                                <option value="{{ $k }}">{{$k}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="last-name">Course Category <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="category" class="form-control col-md-7 col-xs-12">

                                                <option value="MAJOR" selected="selected" >MAJOR</option>
                                              <option value="NON-MAJOR">NON-MAJOR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" for="last-name">Course Type <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="type" class="form-control col-md-7 col-xs-12">
                                            <option value="THEORY" selected="selected" >THEORY</option>
                                            <option value="LAB">LAB</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">


                                        {{ Form::submit('Submit',array('class'=>'btn btn-success')) }}
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

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>
<!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

</body>
</html>


