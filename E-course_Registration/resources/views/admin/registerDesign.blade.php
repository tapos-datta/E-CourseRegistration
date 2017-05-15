<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/7/2017
 * Time: 8:28 PM
 */
$userInfo=Session::get('userInformation');
$user_session=Session::get('studentOfAdmitSession');
$user_current_session=Session::get('studentOfCurrentSession');
$current_semester=Session::get('studentOfCurrentSemester');
$majorCourses=Session::get('MajorCourseList');
$minorCourses=Session::get('MinorCourseList');
$dropOrAdvanceCourses=Session::get('DropAdvancedCourseList');
$offeredCourse=Session::get('listOfOfferedCourses');
$registrationGoingOn=Session::get('registrationGoingOn');
$majorTheory=0;
$minorTheory=0;
$majorLab=0;
$minorLab=0;
$dropAdTheory=0;
$dropAdLab=0;
$majorList=array();
$minorList=array();
$dropAdList=array();
        $y=$s=0;

        if($current_semester<=2)
        {
                $y=1;
        }
        else if($current_semester>2 && $current_semester<=4){
            $y=2;
        }
        else if($current_semester>4 && $current_semester<=6){
            $y=3;
        }
        else if($current_semester>6 && $current_semester<=8){
            $y=4;
        }


        if($current_semester%2==0)
        {
                $s=2;
        }
        else if($current_semester%2!=0)
        {
                $s=1;
        }

                $examYear=0;
        foreach ($registrationGoingOn as $reg){
            $examYear=$reg->EXAM_YEAR;
            break;
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

    <title>Registration Form</title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{URL::to('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{URL::to('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ URL::to('CSS/Breadcrumb.css') }}">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>

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
                            <h3>Course registration form</h3>
                        </div>
                        <!-- End Breadcrumb -->
                    </div>


                </div>

                <div class="clearfix"></div>
                <br/>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li><a href="javascript:toggleDiv('div11');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            <div class="x_title">
                                <h4>MAJOR COURSES</h4>

                                <div class="clearfix"></div>

                            </div>
                            <div  class="x_content toggle">
                                <div align="right">
                                    <a href="{{route('add.current.MajorCourse')}}" id="addButton">+ Add course</a>
                                </div>

                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">

                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type</th>
                                        <th class="column-title alignment">#</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                       @if($majorCourses!=null)
                                             @foreach($majorCourses as $major)
                                                   @foreach($offeredCourse as $offered)
                                                      @if($major==$offered->OFFERED_COURSE_LIST_ID)
                                                       <tr>
                                                           <?php array_push($majorList,$offered->OFFERED_COURSE_LIST_ID);?>
                                                           <td class="alignment ">{{$offered->COURSE_CODE}}</td>
                                                           <td class=" alignment">{{$offered->COURSE_CREDIT}}</td>
                                                           <td class=" alignment">{{$offered->TYPE}}</td>
                                                           @if($offered->TYPE=='THEORY')
                                                               <?php $majorTheory=$majorTheory+$offered->COURSE_CREDIT;?>
                                                           @elseif($offered->TYPE=='LAB')
                                                               <?php $majorLab=$majorLab+ $offered->COURSE_CREDIT;?>
                                                           @endif

                                                           {{Form::open(array('route'=>'_modified_registration_form', 'method' => 'POST', 'class' => 'form-horizontal'))}}
                                                               <input type="hidden" name="offerdCourseId" value="{{$offered->OFFERED_COURSE_LIST_ID}}">
                                                               <input type="hidden" name="status" value="major">
                                                               <td class=" alignment">{{ Form::submit('Delete',array('id'=>'submitButton', 'class'=>'btn btn-danger right-right')) }}</td>
                                                           {{Form::close()}}
                                                       </tr>
                                                       @endif
                                                   @endforeach
                                             @endforeach
                                        @endif
                                    </tbody>

                                </table>
                                <div align="right">
                                   <h4>Total Credits = {{$majorTheory+$majorLab}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                            {{--<li><a href="javascript:toggleDiv('div11');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            <div class="x_title">
                                <h4>NON-MAJOR COURSES</h4>

                                <div class="clearfix"></div>

                            </div>
                            <div  class="x_content toggle">
                                <div align="right">
                                    <a href="{{route('add.current.minorCourse')}}" id="addButton">+ Add course</a>
                                </div>
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type</th>
                                        <th class="column-title alignment">#</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($minorCourses!=null)
                                        @foreach($minorCourses as $minor)
                                            @foreach($offeredCourse as $offered)
                                                @if($minor==$offered->OFFERED_COURSE_LIST_ID)
                                                    <tr>
                                                        <?php array_push($minorList,$offered->OFFERED_COURSE_LIST_ID);?>
                                                        <td class="alignment ">{{$offered->COURSE_CODE}}</td>
                                                        <td class=" alignment">{{$offered->COURSE_CREDIT}}</td>
                                                        <td class=" alignment">{{$offered->TYPE}}</td>
                                                        @if($offered->TYPE=='THEORY')
                                                            <?php $minorTheory=$minorTheory+$offered->COURSE_CREDIT;?>
                                                        @elseif($offered->TYPE=='LAB')
                                                            <?php $minorLab=$minorLab+ $offered->COURSE_CREDIT;?>
                                                        @endif
                                                        {{Form::open(array('route'=>'_modified_registration_form', 'method' => 'POST', 'class' => 'form-horizontal'))}}
                                                            <input type="hidden" name="offerdCourseId" value="{{$offered->OFFERED_COURSE_LIST_ID}}">
                                                            <input type="hidden" name="status" value="minor">
                                                            <td class=" alignment">{{ Form::submit('Delete',array('id'=>'submitButton', 'class'=>'btn btn-danger right-right')) }}</td>
                                                        {{Form::close()}}
                                                    </tr>
                                                @endif

                                            @endforeach

                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                                <div align="right">
                                    <h4>Total Credits = {{$minorTheory+$minorLab}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                            {{--<li><a href="javascript:toggleDiv('div11');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            <div class="x_title">
                                <h4>DROP/ADVANCE COURSES</h4>

                                <div class="clearfix"></div>

                            </div>
                            <div  class="x_content toggle">
                                <div align="right">
                                    <a href="{{route('add.current.dropAdvanceCourse')}}" id="addButton">+ Add course</a>
                                </div>
                                <table class="data table jambo_table table-striped no-margin">

                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title alignment">Course Code</th>
                                        <th class="column-title alignment">Course Credit</th>
                                        <th class="column-title alignment">Course Type</th>
                                        <th class="column-title alignment">#</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($dropOrAdvanceCourses!=null)
                                        @foreach($dropOrAdvanceCourses as $dropAd)
                                            @foreach($offeredCourse as $offered)

                                                @if($dropAd==$offered->OFFERED_COURSE_LIST_ID)
                                                    <tr>

                                                        <?php array_push($dropAdList,$offered->OFFERED_COURSE_LIST_ID); ?>
                                                        <td class="alignment ">{{$offered->COURSE_CODE}}</td>
                                                        <td class=" alignment">{{$offered->COURSE_CREDIT}}</td>
                                                        <td class=" alignment">{{$offered->TYPE}}</td>
                                                            @if($offered->TYPE=='THEORY')
                                                                <?php $dropAdTheory=$dropAdTheory + $offered->COURSE_CREDIT;?>
                                                            @elseif($offered->TYPE=='LAB')
                                                                <?php $dropAdLab=$dropAdLab+ $offered->COURSE_CREDIT;?>
                                                            @endif
                                                            {{Form::open(array('route'=>'_modified_registration_form', 'method' => 'POST', 'class' => 'form-horizontal'))}}
                                                            <input type="hidden" name="offerdCourseId" value="{{$offered->OFFERED_COURSE_LIST_ID}}">
                                                            <input type="hidden" name="status" value="dropAd">
                                                        <td class=" alignment">{{ Form::submit('Delete',array('id'=>'submitButton', 'class'=>'btn btn-danger right-right')) }}</td>
                                                            {{Form::close()}}
                                                    </tr>
                                                @endif

                                            @endforeach

                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                                <div align="right">
                                    <h4>Total Credits = {{$dropAdTheory+$dropAdLab}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                            {{--<li><a href="javascript:toggleDiv('div11');"><i onclick="toggleClass(this)" class="glyphicon glyphicon-plus"></i></a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            <div class="x_title">
                                <h3>Basic Information</h3>

                                <div class="clearfix"></div>
                            </div>
                            {!!  Form::open(array('route'=>'_submit_registration_form', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
                            <input type="hidden" name="majorCourseListNumber" value="{{sizeof($majorList)}}">
                            <input type="hidden" name="minorCourseListNumber" value="{{sizeof($minorList)}}">
                            <input type="hidden" name="dropAdCourseListNumber" value="{{sizeof($dropAdList)}}">
                            <?php $i=1;?>
                            @foreach($majorList as  $major)
                            <input type="hidden" name="majorCourseList<?php echo $i++;?>" value="{{$major}}">
                            @endforeach
                            <?php $i=1;?>
                            @foreach($minorList as  $minor)
                            <input type="hidden" name="minorCourseList{{$i}}" value="{{$minor}}">
                                <?php $i++;?>
                            @endforeach
                            <?php $i=1;?>
                            @foreach($dropAdList as  $dropAd)
                            <input type="hidden" name="dropAdCourseList{{$i}}" value="{{$dropAd}}">
                                <?php $i++;?>
                            @endforeach

                            <input type="hidden" name="majorCredit" value="{{$majorTheory+$majorLab}}">
                            <input type="hidden" name="minorCredit" value="{{$minorTheory+$minorLab}}">
                            <input type="hidden" name="dropAdCredit" value="{{$dropAdTheory+$dropAdLab}}">
                            <input type="hidden" name="examYear" value="{{$examYear}}">
                            <input type="hidden" name="semesterNo" value="{{$current_semester}}">

                            <div  align="center" class="x_content toggle">
                                <div class="form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >Applicant's Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <input type="text" readonly name="studentName" value="{{$userInfo->FIRST_NAME}} {{$userInfo->LAST_NAME}}" class="form-control col-md-5 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >Father's Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <input type="text" readonly name="fatherName" value="{{$userInfo->FATHER_NAME}}" class="form-control col-md-5 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Mother's name <span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <input type="text" readonly name="motherName" value="{{$userInfo->MOTHER_NAME}}" class="form-control col-md-5 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >Session<span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">

                                            <input type="text" readonly name="c_session" value="{{$user_session}}-{{$user_session+1}}" class="form-control col-md-5 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-5 col-sm-5 col-xs-12">Year<span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">

                                        <input type="text" readonly name="year" value="{{$y}}" class="form-control col-md-5 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12">Semester</label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">

                                        <input type="text" readonly name="semesterName" value="{{$s}}" class="form-control col-md-5 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12">Registration No</label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <input type="text" readonly name="reg_no" value="{{$userInfo->REGISTRATION_NO}}" class="form-control col-md-5 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12">Exam</label>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="flat" checked readonly name="iCheck" value="0"> Bachelor
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="flat" name="iCheck" value="1"> Masters'
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12">Present Address</label>--}}
                                    {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                                        {{--<input type="text"  name="address" class="form-control col-md-5 col-xs-12">--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" >

                                        {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success right-right')) }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
        <!-- /page content -->


        {{--<!-- footer content -->--}}
        {{--<footer>--}}
          {{--<div class="pull-right">--}}
{{--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>--}}
          {{--</div>--}}
          {{--<div class="clearfix"></div>--}}
        {{--</footer>--}}
        {{--<!-- /footer content -->--}}
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
<!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>

<script src="{{URL::to('js/custom.js')}}"></script>

<!-- iCheck -->
<script src="{{URL::to('vendors/iCheck/icheck.min.js')}}"></script>

<script>

</script>


</body>
</html>
