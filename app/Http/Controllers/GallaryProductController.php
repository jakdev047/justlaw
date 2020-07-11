<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class GallaryProductController extends Controller {
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

    // gallarydelete
    public function gallarydelete($id){
        // single item collect
        $delete = DB::table('product_image')->where('id',$id)->first();

        // photo  delete
        $image_url = $delete->image_url;
        $done = unlink($image_url);

        DB::select('delete from product_image where id =?', [$id]);


        Session::flash('message','Successfully product Deleted');
        return redirect()->route('showgallaryall');
    }
}
