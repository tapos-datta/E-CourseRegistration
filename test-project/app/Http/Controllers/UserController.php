<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;



class UserController extends Controller
{
    public function editProfile($userId){
        $check=Session::get('success');
        if($check!=null and $check==$userId){

            $securityIssues=DB::table('user')->select('EMAIL','PASSWORD')->where('USER_ID','=',$userId)->first();

            Session::put('securityIssue',$securityIssues);

            return view('admin.editUserProfile');
        }
        else{
            return view('admin.404Error');
        }
    }

}
