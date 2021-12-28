<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamming;
use Sentinel;
use Carbon\Carbon;
use DB;
use Yajra\Datatables\Datatables;

class adminLaporanJammingController extends Controller
{
    public function print(Request $request){
        // return $request->all();
        if ($request->instansi == "semua") {
            $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
            $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
            $jams = Jamming::select('users.nama', 'instansis.nama_ins', 'jammings.created_at', 'lokasi_ruangan', 'kegiatan')
            ->join('users', 'users.id', '=', 'jammings.user_id')
            ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
            ->whereDate('jammings.created_at','>=', $tglmul)
            ->whereDate('jammings.created_at','<=', $tglakh)
            ->orderBy('jammings.created_at', 'desc')
            ->get();

            $jam_count = $jams->count();
            //return $incidents;
            return view ('admin.laporanjamming_print', compact(['jams', 'tglmul', 'tglakh', 'jam_count']));
        } else {
            $tglmul = $now = Carbon::parse($request->startdate)->format('Y-m-d H:i:s');
                $tglakh = $now = Carbon::parse($request->enddate)->format('Y-m-d H:i:s');
                $jams = Jamming::select('users.nama', 'instansis.nama_ins', 'jammings.created_at', 'lokasi_ruangan', 'kegiatan')
                ->join('users', 'users.id', '=', 'jammings.user_id')
                ->join('instansis', 'users.instansi_id', '=', 'instansis.id')
                ->whereDate('jammings.created_at','>=', $tglmul)
                ->whereDate('jammings.created_at','<=', $tglakh)
                ->where('instansis.id', $request->instansi)
                ->orderBy('jammings.created_at', 'desc')
                ->get();
        
                $jam_count = $jams->count();
                //return $incidents;
                return view ('admin.laporanjamming_print', compact(['jams', 'tglmul', 'tglakh', 'jam_count']));
        }
    }
}
