<?php

use Illuminate\Support\Facades\Route;

/* All Web Routes */

/* ==================
    Frontend route
=====================*/

// home page
Route::get('/home', 'HomeController@home')->name('home');

// about page
Route::get('/about', function () {
    if(Session::has(('username'))) {
        return view('about');
    }
    else {
        Session::flash('message','Please login');
        return redirect()->route('login');
    }
});

/* ===================
    admin route
===================== */

// login route
Route::get('/login','UserController@loginform')->name('login');
Route::post('/checklogin','UserController@checklogin')->name('checklogin');

// registration route
Route::get('/registration','UserController@registrationform')->name('registration');
Route::post('/registrationsave','UserController@registrationsave')->name('registrationsave');

// logout route
Route::get('/logout','UserController@logout')->name('logout');

// dashboard page
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

// role
Route::get('/roleform','UserController@roleform')->name('roleform');
Route::get('/showrollall','UserController@showrollall')->name('showrollall');

// category
Route::get('/categoryform','CategoryController@categoryform')->name('categoryform');
Route::post('/catsave','CategoryController@catsave')->name('catsave');
Route::get('/showcatall','CategoryController@showcatall')->name('showcatall');
Route::get('/catdelete/{id}','CategoryController@catdelete')->name('catdelete');

Route::get('/catedit/{id}','CategoryController@catedit')->name('catedit');
Route::post('/catupdate/{id}','CategoryController@catupdate')->name('catupdate');

// product
Route::get('/productform','ProductCntroller@productform')->name('productform');
Route::post('/saveproduct','ProductCntroller@saveproduct')->name('saveproduct');
Route::get('/showproall','ProductCntroller@showproall')->name('showproall');
Route::get('/prodelete/{id}','ProductCntroller@prodelete')->name('prodelete');

Route::get('/proedit/{id}','ProductCntroller@proedit')->name('proedit');
Route::post('/proupdate/{id}', 'ProductCntroller@proupdate')->name('proupdate');

// gallary product
Route::get('/showgallaryall','GallaryProductController@showgallaryall')->name('showgallaryall');
Route::get('/gallarydelete/{id}','GallaryProductController@gallarydelete')->name('gallarydelete');

// cart
Route::get('/cart', 'ProductCntroller@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'ProductCntroller@addToCart');
