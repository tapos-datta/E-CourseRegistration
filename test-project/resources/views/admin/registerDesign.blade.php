<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/7/2017
 * Time: 8:28 PM
 */
$majorCourses=Session::get('MajorCourseList');
$minorCourses=Session::get('MinorCourseList');
$dropOrAdvanceCourses=Session::get('DropAdvancedCourseList');
$offeredCourse=Session::get('listOfOfferedCourses');
$majorTheory=0;
$minorTheory=0;
$majorLab=0;
$minorLab=0;
        $majorList=array();
        $minorList=array();
        $dropAdList=array();

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

    <!-- Custom Theme Style -->
    <link href="{{URL::to('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ URL::to('CSS/Breadcrumb.css') }}">

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
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">

                </div>

                <div class="clearfix"></div>


                <!-- /menu profile quick info -->

                <br />

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
                            <h3>Course registratoin form</h3>
                        </div>
                        <!-- End Breadcrumb -->
                    </div>


                </div>

                <div class="clearfix"></div>
                <br/>
                {!!  Form::open(array('url'=>'', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
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
                                              @if($major==$offered->COURSE_ID)
                                               <tr>
                                                   <?php $majorList->push($offered->COURSE_ID);?>

                                                   <td class="alignment ">{{$offered->COURSE_CODE}}</td>
                                                   <td class=" alignment">{{$offered->COURSE_CREDIT}}</td>
                                                   <td class=" alignment">{{$offered->TYPE}}</td>
                                                   @if($offered->TYPE=='THEORY')
                                                       <?php $majorTheory=$majorTheory+$offered->COURSE_CREDIT;?>
                                                   @elseif($offered->TYPE=='LAB')
                                                       <?php $majorLab=$majorLab+ $offered->COURSE_CREDIT;?>
                                                   @endif
                                                   <td class=" alignment"><button class="btn btn-danger">Delete</button></td>
                                               </tr>
                                               @endif
                                           @endforeach
                                         @endforeach
                                        @endif
                                    </tbody>

                                </table>
                                <div align="right">
                                   <h4>Total Credit = {{$majorTheory+$majorLab}}</h4>
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
                                                @if($minor==$offered->COURSE_ID)
                                                    <tr>
                                                        <?php $minorList->push($offered->COURSE_ID);?>
                                                        <td class="alignment ">{{$offered->COURSE_CODE}}</td>
                                                        <td class=" alignment">{{$offered->COURSE_CREDIT}}</td>
                                                        <td class=" alignment">{{$offered->TYPE}}</td>
                                                        @if($offered->TYPE=='THEORY')
                                                            <?php $minorTheory=$minorTheory+$offered->COURSE_CREDIT;?>
                                                        @elseif($offered->TYPE=='LAB')
                                                            <?php $minorLab=$minorLab+ $offered->COURSE_CREDIT;?>
                                                        @endif
                                                        <td class=" alignment"><button class="btn btn-danger">Delete</button></td>
                                                    </tr>
                                                @endif

                                            @endforeach

                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                                <div align="right">
                                    <h4>Total Credit = {{$minorTheory+$minorLab}}</h4>
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
                                                @if($dropAd==$offered->COURSE_ID)
                                                    <tr>
                                                        <?php $dropAdList->push($offered->COURSE_ID);?>
                                                        <td class="alignment ">{{$offered->COURSE_CODE}}</td>
                                                        <td class=" alignment">{{$offered->COURSE_CREDIT}}</td>
                                                        <td class=" alignment">{{$offered->TYPE}}</td>
                                                        <td class=" alignment"><button class="btn btn-danger">Delete</button></td>
                                                    </tr>
                                                @endif

                                            @endforeach

                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
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
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Code <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Name <span class="required"></span>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Credit <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Level <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Semester Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Department Code</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">



                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Exam</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="flat"  name="iCheck"> Checked
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="flat" name="iCheck"> Unchecked
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">


                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                        {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                        {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
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

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>

<script src="{{URL::to('js/custom.js')}}"></script>

<!-- iCheck -->
<script src="{{URL::to('vendors/iCheck/icheck.min.js')}}"></script>

<script>

</script>


</body>
</html>

