<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	return view('layout.main');
    }
    public function loginForm()
    {   
    	$html = view('user.login_form')->render();
    	return response()->json(['html'=>$html]);
    }

    public function signupForm()
    {   
    	$html = view('user.signup_form')->render();
    	return response()->json(['html'=>$html]);
    }
}
