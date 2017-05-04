<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 10/25/2016
 * Time: 11:43 AM
 */
$notSuccess=Session::get('status');
?>

<!DOCTYPE html>
<html>
    <title>E-Course Registration</title>
    <link rel="stylesheet" href="{{ URL::to('CSS/w3.css') }}">
    <link rel="stylesheet" href="{{ URL::to('CSS/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('CSS/family=Raleway.css') }}">
    <link rel="stylesheet" href="{{ URL::to('CSS/font-awesome.main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('CSS/login.css') }}">
    <style>
        /*body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}*/
        {{--body,html {--}}
            {{--height: 100%;--}}
            {{--line-height: 1.8;--}}
            {{--background-position: center;--}}
            {{--background-size: cover;--}}
            {{--background-image:URL("{{ URL::to('images/books.png') }}");--}}
            {{--background-size: 100% 100%;--}}
            {{--background-repeat: no-repeat;--}}
        {{--}--}}
        /* Full height image header */
        /*.bgimg-1 {*/

          /*!*background-color:#44cc00;*!*/
             /*!*min-height: 90%;*!*/
        /*}*/

        body,html{
            min-height: 100%;
        }
        #wrapper {
            display: block;
            position: fixed;
            text-align: center;
            min-height: 100%;
            width: 100%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }


        footer {
            position: fixed;
            margin-top: 2%;
            height: 50px;
            width: 100%;
            text-align: center;
            font-size: 0.8em;
            bottom: 0;
        }
        .positionFix{
            margin-top: 15%;
        }

        form {
            position: relative;
            width: 250px;
            margin: 0 auto;
            background: rgba(130,130,130,.3);
            padding: 20px 22px;
            border: 1px solid;
            border-top-color: rgba(255,255,255,.4);
            border-left-color: rgba(255,255,255,.4);
            border-bottom-color: rgba(60,60,60,.4);
            border-right-color: rgba(60,60,60,.4);
        }
        #footerInfo{
            font-size: 13px;
        }
        .text{
            white-space: nowrap;
            color: red;
            font-size: 14px;
            position: absolute;
        }

        form input, form button {
            width: 212px;
            border: 1px solid;
            border-bottom-color: rgba(255,255,255,.5);
            border-right-color: rgba(60,60,60,.35);
            border-top-color: rgba(60,60,60,.35);
            border-left-color: rgba(80,80,80,.45);
            background-color: /*rgba(0,0,0,.2)*/ lemonchiffon;
            background-repeat: no-repeat;
            padding: 8px 24px 8px 10px;
            font: bold .875em/1.25em "Open Sans Condensed", sans-serif;
            letter-spacing: .075em;
            color:purple;
            text-shadow: 0 1px 0 rgba(0,0,0,.1);
            margin-bottom: 19px;
        }

        form input:focus { background-color: /*rgba(0,0,0,.4)*/ whitesmoke; }


        #background{
            background-image: URL("{{ URL::to('images/background-image.png') }}");
            /*background-position: center;*/
            background-size: cover;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }




    </style>
    <body id="background">

        <div class="col-sm-12 col-md-12 positionFix">
            <div class="col-sm-8 col-md-8">
                <br/>
                <br/>
                <br/>
                <span class="w3-jumbo w3-hide-small">E - COURSE REGISTRATION</span><br>
                <span class="w3-large" >Smart and unerring course registration process</span>
            </div>
            <div class="col-sm-1 col-md-1">

            </div>
            <div class="col-sm-3 col-md-3">
                <div align="center" class="col-sm-12 col-md-12">
                    <form action="/login" method="POST">
                        {{ csrf_field() }}
                        @if($notSuccess=='notSuccess')<p class="text">Email or password not valid</p>@endif

                        <label for="email"></label>
                        <input type="text" name="email" id="" placeholder="Email" class="email">

                        <label for="password"></label>
                        <input type="password" name="password" id="" placeholder="Password" class="pass">

                        <button type="submit">login</button>

                    </form>

                </div>

            </div>

        </div>


        <footer>
            <div class="col-md-offset-1">
                <p id="footerInfo">© 2017 Department of Computer Science and Engineering,<br>SUST. All rights reserved.</p>
            </div>

        </footer>


    </body>

</html>






