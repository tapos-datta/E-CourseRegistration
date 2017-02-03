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

    <title>Gentellela Alela! | </title>

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
                            <li><a href="{{route('user_home')}}" ><i class="fa fa-home"></i> Home </a>

                            </li>
                            <li><a href="{{route('user_profile')}}" ><i class="fa fa-user"></i> Profile </a>

                            </li>
                            <li><a ><i class="fa fa-inbox"></i> Notification </a>

                            </li>
                            <li><a href="{{route('user_settings')}}"><i class="fa fa-wrench"></i> Setting </a>

                            </li>
                            <li><a href="{{route('user_logout')}}"><i class="fa fa-sign-out"></i> Log Out </a>

                            </li>


                        </ul>
                    </div>


                </div>
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
                                            <li role="presentation" class="@if($checkStatus==0 || $checkStatus==1){{'active'}} <?php $checkStatus=0;?> @endif w3-light-green"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Syllabus</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==2){{'active'}}@endif  w3-light-green"><a href="#tab_content2" role="tab" id="profile-tab"  data-toggle="tab" aria-expanded="false">Add Syllabus</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==3){{'active'}}@endif w3-light-green"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Edit Syllabus</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==4){{'active'}}@endif w3-light-green"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Offered Course</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==5){{'active'}}@endif w3-light-green"><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Add Department</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-light-green"><a href="#tab_content6" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Add Course</a>
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
                                                        <td>+</td>
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
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==3){{'active in'}}@endif " id="tab_content3 " aria-labelledby="profile-tab">
                                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==5){{'active in'}}@endif" id="tab_content5" aria-labelledby="profile-tab">
                                               <!-- add department name -->
                                                <div class="row">
                                                    {!!  Form::open(array('url'=>'/add_department', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Department <small>Add to Database</small></h2>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <br />


                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Code <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('departmentCode','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Department Name <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('departmentName','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Department Name(short form) <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('departmentNameShortForm','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">School </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <select name="departmentSchool" class="form-control col-md-7 col-xs-12">
                                                                                <option value="Agriculture & mineral Sciences" selected="selected" >Agriculture & mineral Sciences</option>
                                                                                <option value="Applied Sciences & Technology" >Applied Sciences & Technology</option>
                                                                                <option value="Life Sciences" >Life Sciences</option>
                                                                                <option value="Management & Buisness Administration" >Management & Buisness Administration</option>
                                                                                <option value="Physical Sciences" >Physical Sciences</option>
                                                                                <option value="Social Sciences" >Social Sciences</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                                                            {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                                                            {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                                                        </div>
                                                                    </div>

                                                                   {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content6" aria-labelledby="profile-tab">
                                                <!-- add course to database-->
                                                <div class="row">
                                                    {!!  Form::open(array('url'=>'/add_course','method'=>'post', 'class' => 'form-horizontal ')) !!}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Course <small>Add to Database</small></h2>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <br />


                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Code <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('courseCode','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Name <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('courseName','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Credit <span class="required"></span>
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
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Level <span class="required"></span>
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
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Semester Name <span class="required"></span>
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
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Department Code</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <select name="departmentCode" class="form-control col-md-7 col-xs-12">
                                                                                @foreach($departmentCodeLists as $code)
                                                                                <option value="{{  $code->DEPT_CODE }}">{{$code->DEPT_NAME_SHORT."-".$code->DEPT_CODE}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            </div>
                                                                    </div>



                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                                                            {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                                                            {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                                                        </div>
                                                                    </div>

                                                                  {!! Form::close() !!}
                                                            </div>
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

