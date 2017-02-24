<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/21/2017
 * Time: 7:58 PM
 */

$userData=Session::get('AllUserInformation');
$userProfiles=Session::get('AllProfileInformation');

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
            margin-right: 0.5%;
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

                <br />
                <br />
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


                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>List of Users</h2>
                                <div class="clearfix"></div>
                                <div align="right">
                                    <a href="{{route('add.new.user')}}" id="addButton">+ Add User</a>
                                </div>
                            </div>
                            <div class="x_content">

                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <div class="x_content">

                                        <table  id='datatable-checkbox' class="table table-striped jambo_table table-bordered">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title alignment">User ID</th>
                                                <th class="column-title alignment">Name</th>
                                                <th class="column-title alignment">Email</th>
                                                <th class="column-title alignment">Role</th>
                                                <th class="column-title alignment">Department Code</th>
                                                <th class="column-title alignment">#</th>
                                                <th class="column-title alignment">#</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($userProfiles as $user)
                                                @foreach($userData as $data)
                                                    @if($user->USER_ID==$data->USER_ID)
                                                   <tr>
                                                        <td class=" alignment">{{$user->USER_ID}}</td>
                                                        <td class="alignment ">{{$user->FIRST_NAME}} {{$user->LAST_NAME}}</td>
                                                        <td class="alignment ">{{$data->EMAIL}}</td>
                                                        <td class=" alignment">{{$data->ROLE}}</td>
                                                        <td class=" alignment">{{$data->DEPT_CODE}}</td>

                                                        {!! Form::open(array('url'=>'','method'=>'POST', 'class' => 'form-horizontal' ))!!}
                                                        <input type="hidden" value="{{$data->USER_ID}}" name="courseCode">
                                                        <td class=" alignment"><button type="submit" class="btn btn-info" name="submit">Edit</button></td>
                                                        {!! Form::close() !!}

                                                        {!! Form::open(array('url'=>'','method'=>'post','class' => 'form-horizontal'))!!}
                                                        <input type="hidden" value="{{$data->USER_ID}}" name="courseCode">
                                                        <td class=" alignment"><button type="submit" class="btn btn-danger" name="submit"> Delete</button></td>
                                                        {!! Form::close()!!}
                                                   </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>

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
<!-- iCheck -->
<script src="{{URL::to('vendors/iCheck/icheck.min.js')}}"></script>
<!--Datatable -->
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
            'order': [[ 0, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0,1,2,3,4,5,6]}
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
