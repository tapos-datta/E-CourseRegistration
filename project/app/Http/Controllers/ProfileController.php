<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 1/10/2017
 * Time: 3:53 PM
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PDF;
use DB;



class ProfileController extends Controller
{
    public function showInfo(){
        $check=session()->get('success');
        $role=Session::get('role');
        if($check){

            $userData=DB::table('user')->where('USER_ID',$check)->first();
            $profileData=DB::table('profile')->where('USER_ID',$check)->first();
            if($role=='student')
            {
                $userLog=DB::table('registration_process')->where('REG_NO','=',$profileData->REGISTRATION_NO)->orderBy('REQUEST', 'asc')->get();
                Session::put('UserLog',$userLog);
            }
            Session::put('UserInformation',$userData);
            Session::put('ProfileInformation',$profileData);


            return view('admin.profile');
        }
        else{
            return view('admin.404Error');
        }
    }

    public function  homeInfo(){
        $check=session()->get('success');
        if($check){
            return view('admin.plain_page');
        }
        else{
            return view('admin.404Error');
        }
    }

}