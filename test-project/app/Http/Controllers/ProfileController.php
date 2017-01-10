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



class ProfileController extends Controller
{
    public function showInfo(){
        $check=session()->get('success');
        if($check){
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