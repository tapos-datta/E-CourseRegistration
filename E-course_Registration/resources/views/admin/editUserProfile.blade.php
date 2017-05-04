<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/24/2017
 * Time: 8:49 PM
 */

$userInformation=Session::get('userInformation');

$date=date('m/d/Y',strtotime($userInformation->DOB));
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

    <title>Edit Profile</title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{URL::to('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <style>
        .image_position{
            width:5%;
            height:5%;
            border-radius: 40%;
            margin-left: 45%;
        }
        .form-design{

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
                @if($message!=null)
                <div>
                    <h5>{{$message}}.</h5>
                </div>
                @endif
                <div class="page-title">
                    <div class="title_left">
                        <h3>Edit profile</h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <img src="{{URL::to('images/user_icon_1.jpg')}}" class="image_position">

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content  form-design col-md-4 col-md-offset-2">

                                {!! Form::open(array('url'=>'/update_user_info','method'=>'post','class' => 'form-horizontal','files'=>true))!!}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">FIRST NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="firstName" value="{{$userInformation->FIRST_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">LAST NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="lastName" value="{{$userInformation->LAST_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">FATHER NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="fatherName" value="{{$userInformation->FATHER_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">MOTHER NAME<span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="motherName" value="{{$userInformation->MOTHER_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >BLOOD GROUP</label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <select name="bloodGroup"   class="form-control col-md-2">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Date Of Birth</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input placeholder="{{$date}}" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="birthday"  min="2000-01-01" max="2099-01-01" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PHONE NO <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="phoneNo" value="{{$userInformation->PHONE_NUM}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                               {{-- <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">FIRST NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="firstName" readonly class="form-control">
                                        --}}{{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}{{--
                                    </div>
                                </div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Profile Image <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        {!! Form::file('image') !!}
                                    </div>
                                </div>


                            </div>
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4">

                                    {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                    {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success col-md-12')) }}
                                </div>
                            </div>
                            {!! Form::close()  !!}
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Change Password</h3>
                                <div class="clearfix"></div>
                            </div>
                            <form name="changePassword" action="/update_user_settings" method="POST" class="form-horizontal" onsubmit="return myfunction()">
                                {{ csrf_field() }}
                            <div class="x_content  form-design col-md-4 col-md-offset-2">

                                {{--{!! Form::open(array('url'=>'/update_user_settings','method'=>'post','class' => 'form-horizontal', 'name'=>'changePassword', 'onclick'=>'return myfunction();'))!!}--}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="password" name="newPassword"  class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="password" name="confirmPassword"  class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Current Password <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="password" name="currentPassword" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4">

                                    {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                    {{ Form::submit('Change',array('id'=>'submitButton', 'class'=>'btn btn-success col-md-12')) }}
                                </div>
                            </div>
                            </form>

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

<!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>

<script>
    function myfunction() {

        X= document.forms["changePassword"]["newPassword"].value;
        Y=document.forms["changePassword"]["confirmPassword"].value;
        z=document.forms["changePassword"]["currentPassword"].value;

        if(z.length==0){
            alert('Must fill the current password field');
            return false;
        }
        else if(X.length==0 || Y.length==0){
            alert('Must fill the new and confirm password fill');
            return false;
        }
        else if(X!=Y){
            alert('new and confirm password field is not same');
            return false;
        }

       else if(z.length>0 && X.length>0  && X==Y){
            return true;
        }




    }
</script>
</body>
</html>
