<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

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

    // catsave
    public function catsave(Request $request){
        $name = $request->input('name');
        $code = $request->input('code');

        DB::insert('insert into categories (name,code,userid) values (?,?,?)', [$name,$code,1]);
        Session::flash('message','Successfully category Addedd');
        return redirect()->route('showcatall');

    }
}
