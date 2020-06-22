<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
