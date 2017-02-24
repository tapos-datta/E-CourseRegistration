<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 11/18/2016
 * Time: 12:59 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <link rel="stylesheet" href="{{ URL::to('CSS/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('CSS/family=Raleway.css') }}">
    <link rel="stylesheet" href="{{ URL::to('CSS/font-awesome.main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('CSS/login.css') }}">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
        body, html {
            background-position: right;
            background-size: cover;
            background-image:URL("{{ URL::to('images/books.png') }}");
            background-size: 100% 200%;
            background-repeat: no-repeat;

        }

        .w3-navbar li a {
            padding: 16px;
            float: left;
        }
    </style>





</head>

<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <ul class="w3-navbar w3-white w3-card-2" id="myNavbar">
        <li>
            <a href="{{route('home')}}" class="w3-wide">E-REG.</a>
        </li>
        <!-- Right-sided navbar links -->
        <li class="w3-right w3-hide-small">
            {{--<a href="#about">ABOUT</a>--}}
            <a href="{{route('loginform')}}"><i class="fa fa-user"></i> LOG IN</a>
            {{--<a href="#work"><i class="fa fa-th"></i> WORK</a>--}}
            {{--<a href="#pricing"><i class="fa fa-usd"></i> PRICING</a>--}}
            <a href="#contact"><i class="fa fa-envelope"></i> CONTACT</a>
        </li>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->
        {{--<li>--}}
            {{--<a href="javascript:void(0)" class="w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">--}}
                {{--<i class="fa fa-bars w3-padding-right w3-padding-left"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</div>

<div class="login-page">
        <br>
        <br>
        <div class="form w3-white">


            {!!  Form::open(array('url'=>'login','method' => 'post', 'class' => 'login-form')) !!}
            {{ csrf_field() }}

            {{ Form::text('email','',array('id'=>'','placeholder' => 'Email')) }}
                {{Form::password('password',array('placeholder'=>'password'))}}
               {{-- <input type="password" placeholder="password"/> --}}
                 {{Form::submit('Login',array('id'=>'submitButton'))}}
               {{ Form:: close() }}
        </div>
    <br>
    <br>
    <br>
</div>


<!-- Custom Theme Scripts -->
<script src="{{URL::to('vendors/build/js/custom.min.js')}}"></script>


</body>
</html>
