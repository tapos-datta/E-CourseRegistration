

<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/16/2016
 * Time: 4:46 PM
 */
        $profileData=Session::get('ProfileInformation');
        $name=$profileData->FIRST_NAME.' '.$profileData->LAST_NAME;
        $image=$profileData->IMAGE_NAME;
        if($image==null || $image=='default_image.png'){
            $image_path= asset('images/default_image.png');
        }
        else if($image!=null){
            $image_path= asset('images/users/'.$image);
        }

        $userLog=Session::get('UserLog');
        $check=Session::get('success');

        $role=Session::get('role');
        $deptname=$batch=null;

        if($role=='student'){
            $deptname=Session::get('departmentNameInfo');
            $batch=Session::get('batchInformation');
        }

        $message=Session::get('message');

?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile </title>

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
    <style>
        .avatar-view{
            height: 70%;
            width:70%;
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
                <!--side menu -->

            </div>
        </div>

        <!-- top navigation -->
       @include('admin.topNavigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @if($message!=null)
                    <div>
                        <h5>{{$message}}.</h5>
                    </div>
                @endif
                <div class="page-title">
                    <div class="title_left">
                        <h3>Profile</h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" src={{$image_path}} alt="Avatar" title="Change the avatar">
                                        </div>
                                    </div>
                                    <h3>{{$name}}</h3>

                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-birthday-cake user-profile-icon"></i>  {{$profileData->DOB}}
                                        </li>
                                        <li><i class="fa fa-map-marker user-profile-icon"></i>  {{$profileData->ADDRESS}}
                                        </li>

                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i> {{strtoupper($role)}}
                                            @if($role=='student')
                                                <div>
                                                    <h5>Registration No: {{$profileData->REGISTRATION_NO}}</h5>
                                                    <h5>Current Semester: {{$batch->SEMESTER_NAME}}</h5>
                                                    <h5>Session: {{$batch->ADMIT_SESSION}} - {{$batch->ADMIT_SESSION+1}}</h5>
                                                    <h5>Department Name: {{$deptname->DEPT_NAME_SHORT}}</h5>
                                                </div>
                                            @endif
                                        </li>

                                    </ul>

                                    <a href="{{route('edit.user.profile',array('userId'=>$check))}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                    <br />



                                </div>
                                @if($role=='student')
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <h2>Registration Records</h2>
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                <!-- start user projects -->

                                                <table class="data table table-striped no-margin">
                                                    <thead>
                                                    <tr>
                                                        <th class="alignment ">REGISTERED SEMESTER</th>
                                                        <th class="alignment ">CREDIT</th>
                                                        <th class="alignment ">STATUS</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($userLog as $log)
                                                        <tr>

                                                            <td class="alignment ">{{$log->SEMESTER_NAME}}</td>
                                                            <td class="alignment ">{{$log->TOTAL_CREDIT}}</td>
                                                            @if($log->REQUEST==0)
                                                                <td class="alignment ">pending..</td>
                                                            @elseif($log->REQUEST==1)
                                                                <td class="alignment ">Accepted</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                <!-- end user projects -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          {{-- --}}{{-- <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div c--}}{{--lass="clearfix"></div>--}}
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
<!-- jQuery custom content scroller -->
<script src="{{asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('vendors/build/js/custom.min.js')}}"></script>
</body>
</html>
