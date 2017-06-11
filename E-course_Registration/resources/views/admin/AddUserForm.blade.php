<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/21/2017
 * Time: 10:00 PM
 */
$departmentInfo=Session::get('DepartmentInfo');

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add New User</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!--Datatables -->
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/w3.css') }}">
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ asset('CSS/Breadcrumb.css') }}">
    <!-- Date-picker -->
    <link rel="stylesheet" href="{{ asset('CSS/date-picker.css') }}">

    <style>
        table.jambo_table thead{
            background-color: #1b809e;
        }
        .alignment{
            text-align: center;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 18px;
        }
        input[type=password],select{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 18px;
        }
        #focus1{
            width: 100%;
            padding: 5px ;
            margin:  0;
            text-align: left;

            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;

        }
        .date{
            margin-left:0;
            padding: 0;
        }
        input[type=text],input[type=password]{
            margin: 0;
        }
        .blood{
            margin-left:0;
            padding: 0;
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
                                <li><a></a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="clearfix"></div>
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add New User</h3>
                    </div>


                </div>

                <div class="clearfix"></div>
                <form name="userForm" class="form-horizontal" action="{{route('add.new_person.data')}}" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{--{!! Form::open(array('url'=>'','method'=>'post' ,'class' => 'form-horizontal ','name'=>'userForm','onsubmit'=>'return validateForm(this)')) !!}--}}
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Basic Information</h3>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="form-group">

                                    <div class="col-md-4 col-md-offset-1  col-sm-12 col-xs-12 ">
                                        <input type="text" id="focus" name="firstName" placeholder="FIRST NAME" class="form-control" required>
                                    </div>

                                    <div class="col-md-4 col-md-offset-2 col-sm-12 col-xs-12 ">
                                        <input type="text" id="focus" name="lastName" placeholder="LAST NAME" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12 ">
                                        <input type="text" id="focus" name="email" placeholder="EMAIL" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-md-offset-2 col-sm-12 col-xs-12 ">
                                        <input type="text" id="focus" name="phoneNO" placeholder="PHONE NUMBER" class="form-control" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12 ">
                                        <input type="password" id="focus" name="pass" placeholder="NEW PASSWORD" class="form-control" required>
                                    </div>

                                    <div class="col-md-4 col-md-offset-2 col-sm-12 col-xs-12 ">
                                        <input type="password" id="focus" name="confirmPass" placeholder="CONFIRM PASSWORD" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12 ">
                                        <input type="text" id="focus" name="fatherName" placeholder="FATHER NAME" class="form-control" >
                                    </div>
                                    <div class="col-md-4 col-md-offset-2 col-sm-12 col-xs-12 ">
                                        <input type="text" id="focus" name="motherName" placeholder="MOTHER NAME" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12 ">
                                        <div class="col-md-5 col-sm-12 col-xs-12 ">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" id="focus1">BLOOD GROUP</label>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12 blood">
                                            <select name="bloodGroup"  id="focus1" class="form-control col-md-2">
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
                                    <div class="col-md-4 col-md-offset-2 col-sm-12 col-xs-12 ">
                                        <div class="col-md-5 col-sm-5 col-xs-5 " >
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12" id="focus1" >Date Of Birth</label>
                                        </div>
                                        <div class="col-md-7  col-sm-7 col-xs-7 date" >
                                            <input class="form-control" id="date" name="birthday" placeholder="MM/DD/YYYY" type="text"/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>Authorization Role</h3>

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <div class="form-group">
                                                <div class="col-md-12  col-sm-12 col-xs-12 ">
                                                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                                                        <label class="control-label col-md-12 col-sm-12 col-xs-12" id="focus1" >User Role</label>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="radio" >
                                                            <label>
                                                                <input type="radio" class="flat" checked name="iCheck" value="student"> STUDENT
                                                            </label>

                                                            <label>
                                                                <input type="radio" class="flat" name="iCheck" value="head"> HEAD TEACHER
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12  col-sm-12 col-xs-12 ">
                                                    <div class="col-md-4 col-sm-12 col-xs-12 ">
                                                        <label class="control-label col-md-12 col-sm-12 col-xs-12" id="focus1" >Department Code</label>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                                        <select name="deptCode"  id="focus1" class="form-control col-md-2">
                                                            @foreach($departmentInfo as $dept)
                                                            <option value="{{$dept->DEPT_CODE}}">{{$dept->DEPT_CODE}} - {{$dept->DEPT_NAME_SHORT}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>Additional Info of Student Role</h3>

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <br />

                                            <div class="form-group">
                                                <div class="col-md-4  col-sm-12 col-xs-12 ">
                                                    <label id="focus1">Registration Number</label>
                                                </div>

                                                <div class="col-md-4 col-sm-12 col-xs-12 ">
                                                    <input type="text" name="registrationNo" id="focus1" class="form-control" >
                                                </div>
                                                <div style=" margin-bottom: 8.5%;"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right">

                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <div id="print"></div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                {{--{!! Form::close() !!}--}}
                </form>
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
<!--Datatable -->
<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>
<!-- jQuery custom content scroller -->
<script src="{{asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('vendors/build/js/custom.min.js')}}"></script>
<!--Date picker -->
<script src="{{asset('js/date-picker.js')}}"></script>

<!-- Datatables -->
<script>

    function validateForm()
    {
        var student=document.forms["userForm"]["iCheck"].value;
        var regNo=document.forms["userForm"]["registrationNo"].value;
        var pass=document.forms["userForm"]["pass"].value;
        var confirmPass=document.forms["userForm"]["confirmPass"].value;

        if(pass!=confirmPass){
            alert('Password must be same');
            return false;
        }

        if(student=='student' && regNo==""){
            alert('Registration field must be filled');
            return false;
        }

    }
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

    $(document).ready(function(){
        var date_input=$('input[name="birthday"]'); //our date input has the name "date"
        var container=$('form[name="UserForm"]').length>0 ? $('form[name="UserForm"]').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })



</script>
<!-- /Datatables -->
</body>
</html>

<?php
session()->forget('deptDetails');
?>

