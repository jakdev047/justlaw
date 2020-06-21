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

Route::get('/about', function () {
    return view('about');
});

// login route
Route::get('/login','UserController@loginform');
Route::post('/checklogin','UserController@checklogin')->name('checklogin');

// registration route
Route::get('/registration','UserController@registrationform')->name('registration');
Route::post('/registrationsave','UserController@registrationsave')->name('registrationsave');
