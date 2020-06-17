<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // welcome page
    public function index() {
        return view('welcome');
    }
}
