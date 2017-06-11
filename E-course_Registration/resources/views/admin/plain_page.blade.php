<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/16/2016
 * Time: 4:46 PM
 */
$role=Session::get('role');
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
          .colorAdd{
              background-color: /*#BD8B2E*/#0288D1;
          }
          .overlay {
              position: absolute;
              bottom: 100%;
              left: 0;
              right: 0;
              background-color: rgba(2,136,209,.1);
              overflow: hidden;
              width: 100%;
              height:0;
              transition: .5s ease;
          }

          .image:hover .overlay {
              bottom: 0;
              height: 100%;
          }

          .text {
              white-space: nowrap;
              color: black;
              font-size: 20px;
              position: absolute;
              overflow: hidden;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
          }

      </style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container ">
        <div class="col-md-3 left_col menu_fixed colorAdd">
          <div class="left_col scroll-view colorAdd">
            <div class="navbar nav_title colorAdd " style="border: 0;">

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
                          <h3>Welcome to E-course registration</h3>
                      </div>


                  </div>

                  <div class="clearfix"></div>

                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">

                              <div class="x_content">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="col-md-4 col-sm-4 col-xs-4 image ">
                                          <div align="right"  >
                                              <img title="Profile" src="{{asset('images/profile-icon.png')}}" style="width: 50%;height: 50%; margin-top: 5%; margin-right: 25%;" >
                                              <a href="{{route('user_profile')}}">
                                                  <div class="overlay">

                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                      @if($role!='admin')
                                      <div class="col-md-4 col-sm-4 col-xs-4 image">
                                          <div align="left">
                                              <img src="{{asset('images/bell-icon.png')}}" title="Notification" style="width: 50%;height: 50%; margin-top: 5%; margin-left: 25%" >
                                              <a href="{{route('user_notification')}}">
                                                  <div class="overlay">

                                                 </div>
                                              </a>
                                          </div>
                                      </div>
                                      @endif
                                      @if($role!='student')
                                      <div class="col-md-4 col-sm-4 col-xs-4 image">
                                          <div align="left">
                                              <img src="{{asset('images/settings-icon.png')}}" title="Settings" style="width: 35%;height: 35%; margin-top: 12%; margin-left: 25%;margin-bottom: 5%;" >
                                              <a href="{{route('user_settings')}}">
                                                  <div class="overlay">

                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                      @endif
                                      @if($role=='student')
                                          <div class="col-md-4 col-sm-4 col-xs-4 image">
                                              <div align="left">
                                                  <img src="{{asset('images/book.png')}}" title="Academics" style="width: 35%;height: 35%; margin-top: 12%; margin-left: 25%;margin-bottom: 5%;" >
                                                  <a href="{{route('user_settings')}}">
                                                      <div class="overlay">

                                                      </div>
                                                  </a>
                                              </div>
                                          </div>
                                      @endif


                                  </div>

                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      @if($role=='admin')
                                      <div class="col-md-4 col-sm-4 col-xs-4 image">
                                          <div align="right">
                                              <img src="{{asset('images/users-icon.png')}}" title="Users" style="width: 40%;height: 40%; margin-top: 10%; margin-right: 29%; margin-bottom: 3%;" >
                                              <a href="{{route('admin_profile')}}">
                                                  <div class="overlay">

                                                  </div>
                                              </a>
                                          </div>
                                      </div>
                                      @endif
                                      <div class="col-md-4 col-sm-4 col-xs-4 image">
                                          <div align="left">
                                              <img src="{{asset('images/logout-icon.png')}}" title="Logout" style="width: 35%;height: 35%; margin-top: 10%; margin-left: 32%; margin-bottom: 5%" >
                                              <a href="{{route('user_logout')}}">
                                                  <div class="overlay">

                                                  </div>
                                              </a>
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

    <!-- jQuery custom content scroller -->
    <script src="{{asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('vendors/build/js/custom.min.js')}}"></script>
  </body>
</html>
