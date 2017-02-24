<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 10/25/2016
 * Time: 11:43 AM
 */
?>

<!DOCTYPE html>
<html>
<title>E-Registration</title>
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
        height: 100%;
        line-height: 1.8;
        background-position: center;
        background-size: cover;
        background-image:URL("{{ URL::to('images/books.png') }}");
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
    /* Full height image header */
    .bgimg-1 {

      /*background-color:#44cc00;*/
         min-height: 100%;
    }
    .w3-navbar li a {
        padding: 16px;
        float: left;
        /*background-color: #99cb84;*/
    }


</style>
<body>



<!-- Navbar (sit on top) -->
<div class="w3-top">
    <ul class="w3-navbar w3-white w3-card-2" id="myNavbar">
        <li>
            <a href="{{route('home')}}" class="w3-wide">E-Reg.</a>
        </li>
        <!-- Right-sided navbar links -->
        <li class="w3-right w3-hide-small">
            {{--<a href="#about">ABOUT</a>--}}
            <a href="{{route('loginform')}}"><i class="fa fa-user"></i> LOG IN</a>
            <a href="{{route('registration')}}"><i class="fa fa-th"></i> REG. FORM</a>
            <a href="{{route('print')}}"><i class="fa fa-usd"></i> print</a>
            <a href="{{route('pdfview')}}"><i class="fa fa-envelope"></i> CONTACT</a>
        </li>
        <!-- Hide right-floated links on small screens and replace them with a menu icon -->
        <li>
            <a href="javascript:void(0)" class="w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars w3-padding-right w3-padding-left"></i>
            </a>
        </li>
    </ul>
</div>

<!-- Sidenav on small screens when clicking the menu icon -->
<nav class="w3-sidenav w3-black w3-card-2 w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidenav">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-large w3-padding-16">Close ×</a>
    <a href="#about" onclick="w3_close()">ABOUT</a>
    <a href="#team" onclick="w3_close()">TEAM</a>
    <a href="#work" onclick="w3_close()">WORK</a>
    <a href="#pricing" onclick="w3_close()">PRICING</a>
    <a href="#contact" onclick="w3_close()">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div align="right" class="w3-display-right w3-padding-xxlarge w3-text-white">



        <span class="w3-jumbo w3-hide-small">E - COURSE REGISTRATION</span><br>

        <span class="w3-large" >Smart and unerring course registration process</span>
        {{--<p><a href="#about" class="w3-btn w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Learn more and start today</a></p>--}}
    </div>

</header>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-32">

    <p>Powered by : SUST-CSE</p>
    <p>{{ Html::mailto('abc@abc.com', 'Email : ') }}</p>
</footer>




</body>
</html>






