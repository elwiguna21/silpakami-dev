<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminLayananListController extends Controller
{
    public function index () {
    	return view ('admin.layananlist'); 
    }
}
