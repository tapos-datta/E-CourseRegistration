<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/7/2016
 * Time: 1:48 AM
 */

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Product as Product;

use PDF;

class ProductController extends Controller
{
    public function htmltopdfview(Request $request)
    {
       // $products = Products::all();
       // view()->share('products',$products);
        if($request->has('download')){
            $pdf = PDF::loadView('user.show');
            return $pdf->download('htmltopdfview');
        }
        return view('htmltopdfview');
    }
}