<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/6/2017
 * Time: 1:10 PM
 */
?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <br>
        <br>

        <ul class="nav side-menu">
            <li><a href="{{route('user_home')}}"><i class="fa fa-home"></i> Home </a>

            </li>
            <li><a href="{{route('user_profile')}}"> <i class="fa fa-user"></i> Profile </a>

            </li>
            <li><a href="{{route('admin_profile')}}"> <i class="fa fa-users"></i> Users </a>

            </li>
            <li><a href="{{route('user_notification')}}"><i class="fa fa-bell"></i> Notification </a>

            </li>
            <li><a href="{{route('user_settings')}}"><i class="fa fa-wrench"></i> Setting </a>

            </li>
            <li><a href="{{route('user_logout')}}"><i class="fa fa-sign-out"></i> Log Out </a>

            </li>


        </ul>
    </div>
</div>
