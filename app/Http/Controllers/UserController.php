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

        $users = DB::select('select * from user where username = ? and password = ?', [$username,$password]);

        if( count($users) > 0 ) {
            foreach($users as $user){
                $request->session()->put('username',$user->username);
                if($username == $user->username && $password == $user->password){
                    return redirect()->route('home');
                }
            }
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

    // logout
    public function logout(Request $request){
        $request->session()->forget('username');
        Session::flash('message','Successfully logout');
        return redirect()->route('login');
    }
}
// http://localhost/demo/justlaw/public/home
