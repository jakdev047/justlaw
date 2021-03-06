<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            $data = array();
            $data['title'] = $request->title;
            $data['buy_price'] = $request->buy_price;
            $data['regular_price'] = $request->regular_price;
            $data['flate_price'] = $request->flate_price;
            $data['shortdes'] = $request->shortdes;
            $data['tag'] = $request->tag;
            $data['quantity'] = $request->quantity;
            $data['rating'] = $request->rating;
            $data['product_info'] = $request->product_info;
            $data['cat_id'] = $request->cat_id;
            $data['product_position'] = $request->product_position;

            // feature image insert
            $feature_image = $request->file('feature_image');

            // for feature image
            if($feature_image){
                $image_name = Str::random(20); // image name
                $ext = strtolower($feature_image->getClientOriginalExtension()); // image original mname
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'image/products/'; //upload path
                $image_url = $upload_path.$image_full_name;
                $success = $feature_image->move($upload_path,$image_full_name);
                if($success) {
                    $data['feature_image'] = $image_url;
                    DB::table('product')->insert($data);
                }
            }

            // gallary image insert
            $count =  count($request->images);
            $product_last_id = DB::getPdo()->lastInsertId();
            for ($i = 0; $i < count($request->images); $i++) {
                $images = $request->images;
                $image = $images[$i];
                $name = time() . $i . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('image/gallary-product');
                $image->move($destinationPath, $name);
                $image_url = 'image/gallary-product/' . $name;
                DB::insert('insert into product_image(product_id,image_url)value(?,?)',[$product_last_id,$image_url]);
            }

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
        // single item collect
        $delete = DB::table('product')->where('id',$id)->first();

        // photo  delete
        $feature_image = $delete->feature_image;
        $done = unlink($feature_image);

        DB::select('delete from product where id =?', [$id]);


        Session::flash('message','Successfully product Deleted');
        return redirect()->route('showproall');
    }

    // proedit
    public function proedit($id) {
        $product = DB::table('product')->where('id',$id)->first();
        return view('editpro',compact('product'));
    }

    // proupdate
    public function proupdate(Request $request,$id){
        if(Session::has(('username'))) {
            // data capture
            $data = array();
            $data['title'] = $request->title;
            $data['buy_price'] = $request->buy_price;
            $data['regular_price'] = $request->regular_price;
            $data['flate_price'] = $request->flate_price;
            $data['shortdes'] = $request->shortdes;
            $data['tag'] = $request->tag;
            $data['quantity'] = $request->quantity;
            $data['rating'] = $request->rating;
            $data['product_info'] = $request->product_info;
            $data['cat_id'] = $request->cat_id;
            $data['product_position'] = $request->product_position;

            // var_dump($data);
            // exit();

            // feature image insert
            $feature_image=$request->feature_image;

            // for feature image
            if($feature_image){
                $image_name = Str::random(20); // image name
                $ext = strtolower($feature_image->getClientOriginalExtension()); // image original mname
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'image/products/'; //upload path
                $image_url = $upload_path.$image_full_name;
                $success = $feature_image->move($upload_path,$image_full_name);
                if($success) {
                    $data['feature_image']=$image_url;
                    $img=DB::table('product')->where('id',$id)->first();
                    $image_path = $img->feature_image;
                    $done=unlink($image_path);
                    DB::table('product')->where('id',$id)->update($data);
                }
            }

            DB::table('product')->where('id',$id)->update($data);

            // successfully message
		    Session::flash('message',' Updated successfully!');
            return redirect()->route('showproall');

        }
        else {
            Session::flash('message','Please login');
            return redirect()->route('login');
        }
    }

    // cart page ui
    public function cart() {
        return view('frontend.cart');
    }

    // add to cart
    public function addToCart($id) {
        $product = DB::table('product')->where('id', $id)->first();

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "id" =>$product->id,
                    "title" => $product->title,
                    "quantity" => 1,
                    "buy_price" => $product->buy_price,
                    "feature_image" => $product->feature_image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" =>$product->id,
            "title" => $product->title,
            "quantity" => 1,
            "buy_price" => $product->buy_price,
            "feature_image" => $product->feature_image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // cart update
    public function update(Request $request) {
        if($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    // cart delete
    public function remove(Request $request) {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
