<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCntroller extends Controller
{
    // productform
    public function productform() {
        if(Session::has(('username'))) {
            return view('product');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // showproall
    public function showproall() {
        if(Session::has(('username'))) {
            return view('showproall');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }
}
