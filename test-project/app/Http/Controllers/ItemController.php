<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/6/2017
 * Time: 11:48 AM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class ItemController extends Controller
{
    public function pdfview(Request $request)
    {
        view()->share('items');


            $pdf = PDF::loadView('user.printregister');
            return $pdf->download('printregister.pdf');


        return view('user.printregister');
    }

}