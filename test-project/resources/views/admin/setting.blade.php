<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/16/2016
 * Time: 4:46 PM
 */
$image_path= URL::to('images/default_image.png');
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
                        <h3>User Settings</h3>
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
                                            <li role="presentation" class="active w3-light-green"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Add Syllabus</a>
                                            </li>
                                            <li role="presentation" class="w3-light-green"><a href="#tab_content2" role="tab" id="profile-tab"  data-toggle="tab" aria-expanded="false">View Syllabus</a>
                                            </li>
                                            <li role="presentation" class="w3-light-green"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Edit Syllabus</a>
                                            </li>
                                            <li role="presentation" class="w3-light-green"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Offered Course</a>
                                            </li>
                                            <li role="presentation" class="w3-light-green"><a href="#tab_content5" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Add Department</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                <!-- start add syllabus -->

                                                <div class="col-md-6 col-xs-12">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Import <small>from previous syllabuses</small></h2>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                </li>

                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <br />
                                                            {!!  Form::open(array('url'=>'','method' => 'post', 'class' => 'form-horizontal ')) !!}
                                                            {{ csrf_field() }}


                                                                <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">FROM <span class="required"></span>
                                                                  </label>
                                                                  <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 2%;">
                                                                      {{Form::selectRange('number', 2010, 2099,array('class'=>'date-picker form-control col-md-7 col-xs-12','id'=>'birthday'))}}
                                                                    {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                                                  </div>
                                                                </div>

                                                                <div class="form-group">
                                                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">TO<span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12" >
                                                                    {{Form::selectRange('number', 2010, 2099,array('class'=>'date-picker form-control col-md-7 col-xs-12','id'=>'birthday'))}}
                                                                    {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                                                     </div>
                                                                 </div>
                                                                <div class="ln_solid"></div>


                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                       {{-- <button type="submit" class="btn btn-primary">Cancel</button>
                                                                        <button type="submit" class="btn btn-success">Submit</button>--}}
                                                                        {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}

                                                                    </div>
                                                                </div>

                                                            {{ Form:: close() }}

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Constraint <small>Add to syllabus</small></h2>
                                                           {{-- <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                </li>

                                                            </ul>--}}
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <br />
                                                            {!!  Form::open(array('url'=>'','method' => 'post', 'class' => 'form-horizontal ')) !!}
                                                            {{ csrf_field() }}


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Year <span class="required"></span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 1.2%;">
                                                                    <select name="session_year" id="select">
                                                                        @for($type=2010;$type<=2099; $type++)
                                                                            <option value="{!! $type !!}">{!! $type !!}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum Credit<span class="required"></span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                                                    {{ Form::text('email','',array('class'=>'col-md-3')) }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Credit<span class="required"></span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                                                    {{ Form::text('email','',array('class'=>'col-md-3')) }}
                                                                </div>
                                                            </div>
                                                            <div class="ln_solid"></div>

                                                            <div class="form-group">
                                                                <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-3">
                                                                    {{-- <button type="submit" class="btn btn-primary">Cancel</button>
                                                                     <button type="submit" class="btn btn-success">Submit</button>--}}
                                                                    {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}

                                                                </div>
                                                            </div>

                                                            {{ Form:: close() }}

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="row">
                                                    {!!  Form::open(array('url'=>'','method' => 'post', 'class' => 'form-horizontal ')) !!}
                                                    {{ csrf_field() }}
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Course <small>Add to syllabus</small></h2>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <br />
                                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Session <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('session_year','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Department <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('department','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Code</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('course_code','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Title</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('course_title','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Credit</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('course_credit','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">--}}
                                                                        </div>
                                                                    </div>


                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                                                            {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                                                            {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            <!-- end add sylabus -->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                                <!-- start user projects -->
                                                <table class="data table table-striped no-margin">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Name</th>
                                                        <th>Client Company</th>
                                                        <th class="hidden-phone">Hours Spent</th>
                                                        <th>Contribution</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>New Company Takeover Review</td>
                                                        <td>Deveint Inc</td>
                                                        <td class="hidden-phone">18</td>
                                                        <td class="vertical-align-mid">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>New Partner Contracts Consultanci</td>
                                                        <td>Deveint Inc</td>
                                                        <td class="hidden-phone">13</td>
                                                        <td class="vertical-align-mid">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Partners and Inverstors report</td>
                                                        <td>Deveint Inc</td>
                                                        <td class="hidden-phone">30</td>
                                                        <td class="vertical-align-mid">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>New Company Takeover Review</td>
                                                        <td>Deveint Inc</td>
                                                        <td class="hidden-phone">28</td>
                                                        <td class="vertical-align-mid">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end user projects -->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                               <!-- add department name -->
                                                <div class="row">
                                                    {!!  Form::open(array('url'=>'','method' => 'post', 'class' => 'form-horizontal ')) !!}
                                                    {{ csrf_field() }}
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Course <small>Add to syllabus</small></h2>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <br />
                                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Session <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('session_year','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Department <span class="required"></span>
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('department','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Code</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('course_code','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Title</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('course_title','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">--}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Credit</label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            {{ Form::text('course_credit','',array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}
                                                                            {{--<input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">--}}
                                                                        </div>
                                                                    </div>


                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                                                            {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                                                            {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                                                        </div>
                                                                    </div>

                                                                </form>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
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
</body>
</html>

