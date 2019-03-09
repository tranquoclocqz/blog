<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ajaxController extends Controller
{
    public function createTags(Request $request){
    	echo $request->$q;
    }
}
