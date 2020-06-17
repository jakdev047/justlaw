<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // welcome page
    public function index() {
        return view('welcome');
    }

    // form data capture
    public function saveConsultation(Request $request){
        echo $request->input('name');
        echo $request->input('email');
        echo $request->input('select');
        echo $request->input('subject');
        echo $request->input('message');
    }
}
