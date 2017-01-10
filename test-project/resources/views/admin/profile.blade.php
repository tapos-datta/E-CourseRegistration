

<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/16/2016
 * Time: 4:46 PM
 */
  $image_path= URL::to('images/default_image.png')
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
                            <li><a href="{{route('user_home')}}"><i class="fa fa-home"></i> Home </a>

                            </li>
                            <li><a href="{{route('user_profile')}}"><i class="fa fa-user"></i> Profile </a>

                            </li>
                            <li><a><i class="fa fa-inbox"></i> Notification </a>

                            </li>
                            <li><a><i class="fa fa-wrench"></i> Setting </a>

                            </li>
                            <li><a><i class="fa fa-sign-out"></i> Log Out </a>

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

                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                        <h3>User Profile</h3>
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
                                    <h3>Samuel Doe</h3>

                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                                        </li>

                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                        </li>


                                    </ul>

                                    <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                    <br />



                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                <!-- start recent activity -->
                                               {{-- <ul class="messages">
                                                    <li>
                                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                        <div class="message_date">
                                                            <h3 class="date text-info">24</h3>
                                                            <p class="month">May</p>
                                                        </div>
                                                        <div class="message_wrapper">
                                                            <h4 class="heading">Desmond Davison</h4>
                                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                            <br />
                                                            <p class="url">
                                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                        <div class="message_date">
                                                            <h3 class="date text-error">21</h3>
                                                            <p class="month">May</p>
                                                        </div>
                                                        <div class="message_wrapper">
                                                            <h4 class="heading">Brian Michaels</h4>
                                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                            <br />
                                                            <p class="url">
                                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                                <a href="#" data-original-title="">Download</a>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                        <div class="message_date">
                                                            <h3 class="date text-info">24</h3>
                                                            <p class="month">May</p>
                                                        </div>
                                                        <div class="message_wrapper">
                                                            <h4 class="heading">Desmond Davison</h4>
                                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                            <br />
                                                            <p class="url">
                                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                        <div class="message_date">
                                                            <h3 class="date text-error">21</h3>
                                                            <p class="month">May</p>
                                                        </div>
                                                        <div class="message_wrapper">
                                                            <h4 class="heading">Brian Michaels</h4>
                                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                            <br />
                                                            <p class="url">
                                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                                <a href="#" data-original-title="">Download</a>
                                                            </p>
                                                        </div>
                                                    </li>

                                                </ul>--}}
                                                <!-- end recent activity -->

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
