<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class ProductCntroller extends Controller
{
    // productform
    public function productform() {
        if(Session::has(('username'))) {
            $categories = DB::select('select * from categories');
            return view('product',['categories'=>$categories]);
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // saveproduct
    public function saveproduct(Request $request) {
        if(Session::has(('username'))) {
            // data capture
            $title =  $request->input('title');
            $buy_price =  $request->input('buy_price');
            $regular_price =  $request->input('regular_price');
            $flate_price =  $request->input('flate_price');
            $shortdes =  $request->input('shortdes');
            $cat_id =  $request->input('cat_id');
            $tag =  $request->input('tag');
            $quantity =  $request->input('quantity');
            $feature_image =  $request->input('feature_image');
            $rating =  $request->input('rating');
            $product_info =  $request->input('product_info');

            // database insert
            DB::insert('insert into product(title,buy_price,regular_price,flate_price,rating,shortdes,cat_id,tag,quantity,product_info)value(?,?,?,?,?,?,?,?,?,?)',[$title,$buy_price,$regular_price,$flate_price,$rating,$shortdes,$cat_id,$tag,$quantity,$product_info]);

            // gallary image insert
            $count =  count($request->images);
            $product_last_id = DB::getPdo()->lastInsertId();
            for ($i = 0; $i < count($request->images); $i++) {
                $images = $request->images;
                $image = $images[$i];
                $name = time() . $i . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('product-image');
                $image->move($destinationPath, $name);
                $image_url = 'product-image/' . $name;
                DB::insert('insert into product_image(product_id,image_url)value(?,?)',[$product_last_id,$image_url]);
            }

            // feature image insert
            DB::table('product')->where('id', $product_last_id)->update(['feature_image' => $image_url]);

            // successfully message
		    Session::flash('message',' added successfully!');
            return redirect()->route('showproall');
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // showproall
    public function showproall() {
        if(Session::has(('username'))) {
            $product = DB::select('select * from product');
            return view('showproall',['product'=>$product]);
        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // prodelete
    public function prodelete($id){
      DB::select('delete from product where id =?', [$id]);
      Session::flash('message','Successfully product Deleted');
      return redirect()->route('showproall');
    }
}
