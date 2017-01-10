<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PDF;


class SessionCheckController extends Controller
{
    public function invoke($id){
        $check=session()->get('success');

     if($check==$id){
         return view('admin.plain_page');
     }
     else{
         return view('admin.404Error');
     }

    }



}
