<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/7/2017
 * Time: 3:24 PM
 */
$studentOfBatch=Session::get('studentOfBatch');
$studentOfDepartment=Session::get('studentOfDepartment');
$studentOfCurrentSemester=Session::get('studentOfCurrentSemester');
$registrationGoingOn=Session::get('registrationGoingOn');
        $message=Session::get('message');
        $isRegisteredUser=Session::get('isRegisteredUser');

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Notification</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!--Datatables -->
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/w3.css') }}">
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ asset('CSS/Breadcrumb.css') }}">

    <style>
        table.jambo_table thead{
            background-color: #1b809e;
        }
        .fontSize{
            font-size: medium;
        }

        #link_:visited {
            color: green;
        }
        #link_:hover {
            color: hotpink;
        }
        .deadline{
            color: orangered;
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
                    <div class="title_left">
                        @if($message=='true')
                        <h5>successfully registered</h5>
                        <?php Session::forget('message');?>
                        @endif
                        <h3>Notification</h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                @if($registrationGoingOn==null)
                                      <h3>No notification has arrived at this moment</h3>
                                @else
                                    <h3>A notification has arrived at this moment</h3>
                                @endif
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                @if($registrationGoingOn!=null)
                                    <h4>Course registration is going on. Apply for course registration if you want<?php $i=1?></h4>
                                    @foreach($registrationGoingOn as $reg)
                                       <p class="fontSize">{{$i}}. {{$reg->SESSION_MONTH}} session of year {{$reg->EXAM_YEAR}} (Deadline: <span class="deadline"> {{date('d-m-Y',strtotime($reg->DEAD_LINE))}}</span>)<br \></p>
                                    <?php $i++;?>
                                    @endforeach
                                    <div align="right">
                                        <a href="{{route('registration.process')}}"><button class="btn btn-primary">Register</button></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                @if($registrationGoingOn!=null and $isRegisteredUser=='true')
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">

                                    <h3>You have already registered courses for up-coming examination.</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                    <h4><a id="link_" href="{{route('registration.print.file')}}"> Register form</a> to view and save it as a PDF.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
<!-- iCheck -->
<script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('vendors/build/js/custom.min.js')}}"></script>
<!-- jQuery custom content scroller -->
<script src="{{asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

</body>
</html>


