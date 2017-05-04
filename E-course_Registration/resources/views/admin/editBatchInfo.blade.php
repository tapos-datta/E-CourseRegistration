<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/24/2017
 * Time: 12:07 PM
 */

$a_batch_info=Session::get('aBatchInfo');
$a_batchInfo;
//   foreach ($a_batch_info as $batch){
//       $a_batchInfo=$batch;
//       }
//print_r($a_batch_info);

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add new Batch</title>

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
                                <li><a href="{{route('user_settings')}}">Settings</a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row">

                    {!!  Form::open(array('url'=>'/add_batch_info', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit <small>Batch Info</small></h2>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">
                                <br />


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admission Session<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="{{$a_batch_info->ADMIT_SESSION}}" class="form-control col-md-7 col-xs-12" readonly >
                                        <input type="hidden" name="admissionSession" value="{{$a_batch_info->ADMIT_SESSION}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Current Session <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="currentSession" class="form-control col-md-7 col-xs-12">
                                            @for($i=2011;$i<=2099;$i++)
                                                @if($i==$a_batch_info->CURRENT_SESSION)
                                                    <option value="{{$i}}" selected="selected">{{$i}}</option>
                                                @else
                                                    <option value="{{$i}}" >{{$i}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Semester Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="semesterName" class="form-control col-md-7 col-xs-12">
                                            <option value="1" selected="selected" >1/1</option>
                                            <option value="2" >1/2</option>
                                            <option value="3" >2/1</option>
                                            <option value="4" >2/2</option>
                                            <option value="4" >3/1</option>
                                            <option value="4" >3/2</option>
                                            <option value="4" >4/1</option>
                                            <option value="4" >4/2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="batchLevel" class="form-control col-md-7 col-xs-12">
                                            <option value="1" selected="selected" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            <option value="4" >4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-3 col-sm-3 col-xs-12 col-md-offset-6">

                                        {{--<button type="submit" class="btn btn-success">Submit</button>--}}
                                        {{ Form::submit('SUBMIT',array('id'=>'submitButton', 'class'=>'btn btn-success')) }}
                                    </div>
                                </div>

                                {!! Form::close() !!}
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
<!-- iCheck -->
<script src="{{URL::to('vendors/iCheck/icheck.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>
<!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>


</body>
</html>


