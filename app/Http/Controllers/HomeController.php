<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // dashboard page
    public function dashboard () {
        if(Session::has(('username'))) {
            return view('dashboard');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // home page
    public function home () {
        return view('frontend.home');
    }
}
