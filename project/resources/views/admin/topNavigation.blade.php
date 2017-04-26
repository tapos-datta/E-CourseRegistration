<?php
$profileData=Session::get('userInformation');

$name=$profileData->FIRST_NAME;
$image=$profileData->IMAGE_NAME;

if($image==null || $image=='default_image.png'){
    $image_path= URL::to('images/default_image.png');
}
else if($image!=null){
    $image_path= URL::to('images/users/'.$image);
}
?>
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{$image_path}}" alt="">{{$name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('user_profile')}}"> Profile</a></li>

                        <li><a href="{{route('user_logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>