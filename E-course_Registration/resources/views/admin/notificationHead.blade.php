<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/13/2017
 * Time: 9:09 AM
 */
if(Session::get('SetSettings')!=null){
    $checkStatus=session()->get('SetSettings');
}
else{
    $checkStatus=0;
}
$registrationLists=Session::get('ListOfRegisteredStudent');
$syllabusInfo=Session::get('informationOfSyllabus');
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

    <title>Notification</title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::to('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{URL::to('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>


    <!--Datatables -->
    <link href="{{URL::to('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{URL::to('vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <!-- Breadcrumb -->
    <link rel="stylesheet" href="{{ URL::to('CSS/Breadcrumb.css') }}">

    <style>
        table.jambo_table thead {
            background-color: #1b809e;
        }
        .alignment{
            text-align: center;
        }
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

        .delete_button {
            border: none;

            padding: 5px 5px;

            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;

            cursor: pointer;
            border-radius: 8px;
        }
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

                        <h3>Notifications</h3>
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Registration <small>List of students</small></h3>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-xs-12">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="@if($checkStatus==0 || $checkStatus==1){{'active'}} <?php $checkStatus=0;?> @endif w3-custom-blue"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">1/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==2){{'active'}}@endif  w3-custom-blue"><a href="#tab_content2" role="tab" id="profile-tab"  data-toggle="tab" aria-expanded="false">1/2</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==3){{'active'}}@endif w3-custom-blue"><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">2/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==5){{'active'}}@endif w3-custom-blue"><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">2/2</a>
                                            </li>

                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">3/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content6" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">3/2</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content7" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">4/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content8" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">4/2</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade  @if($checkStatus==0 || $checkStatus==1){{'active in'}}@endif" id="tab_content1" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>1st Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">

                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="1" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==1)
                                                                            @foreach($syllabusInfo as $syl)
                                                                            @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                            <tr>
                                                                                <td class="a-center">
                                                                                    <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                </td>
                                                                                <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                <td class="alignment">{{$reg->NAME}}</td>
                                                                                <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                            </tr>

                                                                            @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==2){{'active in'}}@endif" id="tab_content2" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>1st Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox1" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>


                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="2" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==2)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==4){{'active in'}}@endif" id="tab_content3" aria-labelledby="profile-tab">

                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>2nd Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox2" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="3" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==3)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==5){{'active in'}}@endif" id="tab_content4" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>2nd Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox3" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="4" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==4)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content5" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>3rd Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox4" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="5" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==5)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content6" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>3rd Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox5" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="6" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==6)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content7" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>4th Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox6" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="7" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==7)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && $reg->TOTAL_CREDIT <= $syl->MAX_CREDIT  && $reg->TOTAL_CREDIT >=$syl->MIN_CREDIT && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content8" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>4th Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox7" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="8" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==8)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR &&  $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
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
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Special <small>Requests for Registration</small></h3>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-xs-12">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="@if($checkStatus==0 || $checkStatus==1){{'active'}} <?php $checkStatus=0;?> @endif w3-custom-blue"><a href="#tab_content11" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">1/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==2){{'active'}}@endif  w3-custom-blue"><a href="#tab_content12" role="tab" id="profile-tab"  data-toggle="tab" aria-expanded="false">1/2</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==3){{'active'}}@endif w3-custom-blue"><a href="#tab_content13" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">2/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==5){{'active'}}@endif w3-custom-blue"><a href="#tab_content14" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">2/2</a>
                                            </li>

                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content15" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">3/1</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content16" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">3/2</a>
                                            </li>
                                            <li role="presentation" class="@if($checkStatus==6){{'active'}}@endif w3-custom-blue"><a href="#tab_content17" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">4/1</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade  @if($checkStatus==0 || $checkStatus==1){{'active in'}}@endif" id="tab_content11" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>1st Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox11" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="1" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==1)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                          {{--<td class="alignment"><a href="" class="delete_button"> View Details</a></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==2){{'active in'}}@endif" id="tab_content12" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>1st Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox12" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="2" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==2)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value="">View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==4){{'active in'}}@endif" id="tab_content13" aria-labelledby="profile-tab">

                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>2nd Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox13" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="3" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==3)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==5){{'active in'}}@endif" id="tab_content14" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>2nd Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox14" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="4" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==4)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content15" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>3rd Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox15" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="5" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==5)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content16" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>3rd Year 2nd Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox16" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="6" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==6)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade @if($checkStatus==6){{'active in'}}@endif " id="tab_content17" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h4>4th Year 1st Semester</h4>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div id="div21" class="x_content toggle">
                                                                {!! Form::open(array('route'=>'approve_request','method'=>'post', 'class' => 'form-horizontal'))!!}
                                                                <table id="datatable-checkbox17" class="data table jambo_table table-striped no-margin">
                                                                    <thead>
                                                                    <tr class="headings">
                                                                        <th class="column-title alignment">Select</th>
                                                                        <th class="column-title alignment">Registration No</th>
                                                                        <th class="column-title alignment">Name</th>
                                                                        <th class="column-title alignment">Registered Credit</th>
                                                                        {{--<th class="column-title alignment">#</th>--}}

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <input type="hidden" value="7" name="semesterName">
                                                                    @foreach($registrationLists as $reg)
                                                                        @if($reg->SEMESTER_NAME==7)
                                                                            @foreach($syllabusInfo as $syl)
                                                                                @if($syl->SYLLABUS_YEAR == $reg->SYLLABUS_YEAR && ($reg->TOTAL_CREDIT > $syl->MAX_CREDIT  || $reg->TOTAL_CREDIT <$syl->MIN_CREDIT) && $reg->REQUEST==0)
                                                                                    <tr>
                                                                                        <td class="a-center">
                                                                                            <input type="checkbox" class="flat alignment" name="check_list[]" checked value="{{$reg->REG_NO}}">
                                                                                        </td>
                                                                                        <td class="alignment">{{$reg->REG_NO}}</td>
                                                                                        <td class="alignment">{{$reg->NAME}}</td>
                                                                                        <td class="alignment ">{{$reg->TOTAL_CREDIT}}</td>
                                                                                        {{--<td class="alignment"><button class="btn btn-info delete_button" name="course_id" value=""> View Details</button></td>--}}
                                                                                    </tr>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div align="right">
                                                                    <br/>
                                                                    <button type="submit"  class="btn btn-success submit_button" name="course_id" value="submit"> Approve</button>
                                                                </div>
                                                                {!! Form::close() !!}
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
                {{--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>--}}
            </div>
            {{--<div class="clearfix"></div>--}}
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

  <!-- jQuery custom content scroller -->
<script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>



<!-- Datatables information -->
    <script src="{{URL::to('js/customizedSemesterviewTable.js')}}"></script>
<!-- /Datatables -->
</body>
</html>





<?php
session()->forget('SetSettings');
?>

