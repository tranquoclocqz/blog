<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\admin;
class authController extends Controller
{
   	public function login(){
		return view('admin.auth.login');
   	}
   	public function forgot(){
   		return view('admin.auth.email');
   	}
   	public function reset(){
   		return view('admin.auth.reset');
   	}
   	public function postLogin(Request $request){
   		$login = [
   			'email'=>$request->txt_email,
   			'password'=>($request->txt_password),
   		];
   		if (Auth::guard('admins')->attempt($login)) {
   			return redirect()->route('dashboard');
   		} else{
			return view('admin.auth.login');
   		}
   	}
   	public function getLogout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('login');
    }
}
