<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\User;
use Session;

class UserController extends Controller
{   
	//home page
    public function index()
    {   
        if(Session::get('user'))
        {
        	return Redirect::to('/main');
        }
    	return view('home');
    }
    
    //providing a login form
    public function loginForm()
    {   
    	$html = view('user.login_form')->render();
    	return response()->json(['html'=>$html]);
    }

    //providing sign up form
    public function signupForm()
    {   
    	$html = view('user.signup_form')->render();
    	return response()->json(['html'=>$html]);
    }

    // creatin a user
    public function storeUser(Request $request)
    {   
    	$user = new User;

    	$exists = DB::table('users')->where('email',$request->email)->first();

    	if($exists)
    	{
    		return response()->json(['msg'=>'have']);
    	}
    	else if($request->password != $request->repeat_password)
    	{
    		return response()->json(['msg'=>'mismatch']);
    	}
    	else
    	{
    		$user::create(

    			[
    				'name' => $request->name,
    				'email' => $request->email,
    				'password' => $request->password

    			]
    		);

    		return response()->json(['msg'=>'created']);
    	}
    	
    }
    // checking whether a user valid or not
    public function checkUser(Request $request)
    {   
    	$user = DB::table('users')->where(['email'=>$request->email,'password'=>$request->password])->first();

    	if($user)
    	{
    		Session::put('user','logged in');

    		$href = '/main';

    		return response()->json(['href'=>$href]);
    	}
    	else
    	{
    		return response()->json(['msg'=>'incorrect']);
    	}
    	
    }
    public function mainPage()
    {   
    	if(Session::get('user'))
    	    return view('inventory');
    	
    	return Redirect::to('/');
    }

    public function logOut()
    {
    	Session::put('user',null);
    	return Redirect::to('/');
    }
}
