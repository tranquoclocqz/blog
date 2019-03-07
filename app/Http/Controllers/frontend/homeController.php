<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
class homeController extends Controller
{
   	public function home(){
   		
   		return view('home.index');
   	}
}
