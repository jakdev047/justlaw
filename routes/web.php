<?php

use Illuminate\Support\Facades\Route;

/* All Web Routes */

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

// login route
Route::get('/login','UserController@loginform')->name('login');
Route::post('/checklogin','UserController@checklogin')->name('checklogin');

// registration route
Route::get('/registration','UserController@registrationform')->name('registration');
Route::post('/registrationsave','UserController@registrationsave')->name('registrationsave');

// logout route
Route::get('/logout','UserController@logout')->name('logout');


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
Route::get('/showproall','ProductCntroller@showproall')->name('showproall');
