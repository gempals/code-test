<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    function register(){
    	return view('front.register');
    }

    function register_store(Request $request){
    	//dd($request->all());
    	 $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

    	//$request->merge(['password' => bcrypt($request->get('password'))]); 
    	$data     				 = $request->all();
    	$data['password'] 		 = bcrypt($request->get('password'));
    	$data['remember_token']  = $request->get('_token'); 	

    	//dd($request->all());
    	if($user = User::create($data)){
    		$user->assignRole('User');
    		return redirect()->route('front');
    	}

    }
}
