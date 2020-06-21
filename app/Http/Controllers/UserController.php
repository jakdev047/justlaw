<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class UserController extends Controller
{
    // loginform
    public function loginform(){
        return view('login');
    }

    // checklogin
    public function checklogin(Request $request){
        // form data capture
        $username = $request->input('username');
        $password = $request->input('password');

        if($username == 'admin' && $password == '00012'){
            return redirect()->route('home');
        }
        else{
            Session::flash('message','Invalid Username or Password');
            return view('login');
        }
    }

    // registrationform
    public function registrationform(){
        return view('registration');
    }

    // registrationsave
    public function registrationsave(Request $request){
        // form data capture
        $username = $request->input('username');
        $password = $request->input('password');

        DB::insert('insert into user (username, password) values (?, ?)', [$username, $password]);
        Session::flash('message','Registration Complete');
        return redirect()->route('registration');
    }
}
