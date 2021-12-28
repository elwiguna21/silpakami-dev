<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminSertifikatDaftarController extends Controller
{
    public function index () {
    	return view ('admin.daftarsertifikat'); 
    }
}
