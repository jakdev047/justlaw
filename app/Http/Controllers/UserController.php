<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // loginform
    public function loginform(){
        return view('login');
    }
}
