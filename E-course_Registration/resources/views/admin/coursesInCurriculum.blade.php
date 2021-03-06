<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/2/2017
 * Time: 4:48 PM
 */
$year=Session::get('showCurriculumYear');
$viewDeptCode=Session::get('viewDeptCode');
$viewCourseList=Session::get('courseList');
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

    <title>Courses in curriculum </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/w3.css') }}">
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ asset('CSS/Breadcrumb.css') }}">

    <style>
        #addButton {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }

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
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!--Breadcrumb -->
                        <div class="title_left">
                            <ul class="breadcrumb">
                                <li><a href="{{route('user_settings')}}">Curriculum({{$year}})</a></li>
                                <li><a href="{!! route('show.curriculum', array('year'=> $year)) !!}"> Department({{$viewDeptCode}})</a></li>
                                <li></li>
                            </ul>
                        </div>
                        <!-- End Breadcrumb -->
                    </div>


                </div>

                <div class="clearfix"></div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div11');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>
                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>1st Year 1st Semester</h4>

                                <div class="clearfix"></div>

                            </div>
                            <div id="div11" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'1'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==1)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <input type="hidden" name="course_id" value="{{$courses->COURSE_ID}}">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>
                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" class="btn btn-danger" onclick="return confirmChange();" name="submit"> Delete</button></td>
                                                @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div12');" ><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>1st Year 2nd Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div12" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'2'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif

                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==2)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>

                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" class="btn btn-danger" onclick="return confirmChange();" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                                @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div21');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>2nd Year 1st Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div21" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'3'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==3)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>
                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" onclick="return confirmChange();" class="btn btn-danger" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                                @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div22');" ><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>2nd Year 2nd Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div22" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'4'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                            @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==4)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>

                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" onclick="return confirmChange();" class="btn btn-danger" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                           @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div31');" ><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>3rd Year 1st Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div31" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'5'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==5)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>
                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" onclick="return confirmChange();" class="btn btn-danger" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                            @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div32');" ><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>3rd Year 2nd Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div32" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'6'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                            @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==6)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>
                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" onclick="return confirmChange();" class="btn btn-danger" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                            @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div41');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>4th Year 1st Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div41" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'7'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                            @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==7)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>
                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" onclick="return confirmChange();" class="btn btn-danger" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                            @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="javascript:toggleDiv('div42');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>

                                </li>
                            </ul>
                            <div class="x_title">
                                <h4>4th Year 2nd Semester</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div id="div42" class="x_content toggle">
                                @if($role=='admin')
                                <div align="right">
                                    <a href="{{route('addCourseToCurriculum',array('year'=>$year,'code'=>$viewDeptCode,'semester'=>'8'))}}" id="addButton">+ Add course</a>
                                </div>
                                @endif
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Name</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type </th>
                                        <th class="column-title alignment">Department Code </th>
                                        @if($role=='admin')
                                        <th class="column-title alignment">#</th>
                                            @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewCourseList as $courses)
                                        @if($courses->SEMESTER_NAME==8)
                                            {!! Form::open(array('route'=>'delete_course_curriculum','method'=>'post', 'class' => 'form-horizontal'))!!}

                                            <input type="hidden" value="{{$year}}" name="curriculumYear">
                                            <input type="hidden" value="{{$viewDeptCode}}" name="deptCode">
                                            <tr>
                                                <td class=" alignment">{{$courses->COURSE_CODE}}</td>
                                                <td class=" alignment">{{$courses->COURSE_NAME}}</td>
                                                <td class="alignment ">{{$courses->COURSE_CREDIT}}</td>
                                                <td class="alignment ">{{$courses->TYPE}}</td>
                                                <td class="a-right a-right  alignment ">{{$courses->DEPT_CODE}}</td>
                                                @if($role=='admin')
                                                <td class="alignment"><button type="submit" onclick="return confirmChange();" class="btn btn-danger" name="course_id" value="{{$courses->COURSE_ID}}"> Delete</button></td>
                                                @endif
                                            </tr>
                                            {!! Form::close() !!}
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
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
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('vendors/build/js/custom.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<!-- jQuery custom content scroller -->
<script src="{{asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script>
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


</body>
</html>

