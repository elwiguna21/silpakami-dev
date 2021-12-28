<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminInsidenController extends Controller
{
    public function index () {
    	return view ('admin.insiden'); 
    }
}
