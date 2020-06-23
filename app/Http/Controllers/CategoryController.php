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
            $categories = DB::select('select * from categories');
            return view('showcatall',['categories'=>$categories]);
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

    // catdelete
    public function catdelete($id){
      DB::select('delete from categories where id =?', [$id]);
      Session::flash('message','Successfully category Deleted');
      return redirect()->route('showcatall');
    }

    // catedit
    public function catedit($id) {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('editcat',compact('category'));
    }
}
