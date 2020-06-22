<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home page
    public function home () {
        if(Session::has(('username'))) {
            return view('home');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }
}
