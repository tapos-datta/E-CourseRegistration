<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 3/10/2017
 * Time: 12:43 PM
 */

$userdata1= Session::get('specificUserData');
$profileData1=Session::get('SpecificUserProfile');
$date=date('m/d/Y',strtotime($profileData1->DOB));
$departmentCodeLists =Session::get('departmentCodeList');

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit user</title>

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
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
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
        .image_position{
            width:5%;
            height:5%;
            border-radius: 40%;
            margin-left: 45%;
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
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin_profile')}}">Users</a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Update User Info</h3>
                                <img src="{{URL::to('images/user_icon_1.jpg')}}" class="image_position">

                                <div class="clearfix"></div>
                            </div>
                            {!! Form::open(array('url'=>'/update_user_info','method'=>'post','class' => 'form-horizontal','files'=>true))!!}
                            <div class="x_content  form-design col-md-4 col-md-offset-2">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">FIRST NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="firstName" value="{{$profileData1->FIRST_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">LAST NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="lastName" value="{{$profileData1->LAST_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">FATHER NAME <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="fatherName" value="{{$profileData1->FATHER_NAME}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">MOTHER NAME<span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="motherName" value="{{$profileData1->MOTHER_NAME}}" class="form-control">
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
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input placeholder="{{$date}}" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="birthday"  min="2000-01-01" max="2099-01-01" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">PHONE NO <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="phoneNo" value="{{$profileData1->PHONE_NUM}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">ROLE <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="role" value="{{$userdata1->ROLE}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">EMAIL <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <input type="text" name="email" value="{{$userdata1->EMAIL}}" class="form-control">
                                        {{--{{ Form::text('departmentName',$info->DEPT_NAME,array('class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'')) }}--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">DEPARTMENT CODE</label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <select name="departmentCode" class="form-control col-md-7 col-xs-12">
                                            @foreach($departmentCodeLists as $code)
                                                @if($profileData1->DEPT_CODE==$code->DEPT_CODE)
                                                    <option value="{{  $code->DEPT_CODE }}" selected="selected" >{{$code->DEPT_NAME_SHORT."-".$code->DEPT_CODE}}</option>
                                                @else
                                                    <option value="{{  $code->DEPT_CODE }}">{{$code->DEPT_NAME_SHORT."-".$code->DEPT_CODE}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Profile Image <span class="required"></span>
                                    </label>
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        {!! Form::file('image') !!}
                                    </div>
                                </div>


                            </div>
                            <input type="hidden" value="{{$userdata1->USER_ID}}" name="editUserId">
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4">

                                    {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                    {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success col-md-12')) }}
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Change User Password</h3>
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

                                </div>
                                <input type="hidden" value="{{$userdata1->USER_ID}}" name="editUserId">
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
  <!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

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
                { orderable: false, targets: [0,4,5] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });

    function myfunction() {

        X= document.forms["changePassword"]["newPassword"].value;
        Y=document.forms["changePassword"]["confirmPassword"].value;

        if(X.length==0 || Y.length==0){
            alert('Must fill the new and confirm password fill');
            return false;
        }
        else if(X!=Y){
            alert('new and confirm password field is not same');
            return false;
        }

        else if( X.length>0  && X==Y){
            return true;
        }

    }



</script>
<!-- /Datatables -->
</body>
</html>

<?php
session()->forget('deptDetails');
?>

