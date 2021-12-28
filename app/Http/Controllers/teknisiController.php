<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Incident;
use Sentinel;

class teknisiController extends Controller
{
    public function index(){
        $slug = Sentinel::getUser()->roles()->first()->slug; // mencari role user
        if ($slug == 'teknisi_aplikasi') {
           $teknisi = 'TEKNISI APLIKASI';
        } else {
            $teknisi = 'TEKNISI JARINGAN';
        }

        $month = $now = Carbon::now()->month;

        $date = Carbon::today()->toDateString();
        $insidenDay = Incident::select(DB::raw('COUNT(id) as jumlah'))
        ->where(DB::raw('date (created_at)'), $date)
        ->first();
        $insidenMonth = Incident::select(DB::raw('COUNT(id) as jumlah'))
        ->whereMonth('created_at', $month)
        ->first();
        $insidenAll = Incident::select(DB::raw('COUNT(id) as jumlah'))
            ->first();

        return view ('teknisi.home', compact(['teknisi','insidenDay','insidenAll','insidenMonth'])); 
    }

}
