<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class GallaryProductController extends Controller
{
    // showgallaryall
    public function showgallaryall() {
        if(Session::has(('username'))) {
            $product_image = DB::select('select * from product_image');
            return view('showgallaryall',['product_image'=>$product_image]);
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }
}
