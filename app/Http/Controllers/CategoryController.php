<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {
    // categoryform
    public function categoryform() {
        if(Session::has(('username'))) {
            return view('category');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // showcatall
    public function showcatall() {
        if(Session::has(('username'))) {
            return view('showcatall');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }
}
